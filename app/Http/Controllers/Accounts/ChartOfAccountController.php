<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;

class ChartOfAccountController extends Controller
{
    // عرض قائمة الحسابات مع إمكانية البحث
    public function index(Request $request)
    {
        $query = ChartOfAccount::query();

        // إذا كان هناك بحث
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('type', 'LIKE', "%{$search}%")
                  ->orWhere('normal_balance', 'LIKE', "%{$search}%");
        }

        $accounts = $query->get();

        return view('accounts.index', compact('accounts'));
    }

    // نموذج إنشاء حساب جديد
    public function create()
    {
        $accounts = ChartOfAccount::all();
        return view('accounts.create', compact('accounts'));
    }

    // حفظ حساب جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:asset,liability,equity,revenue,expense',
            'parent_account_id' => 'nullable|exists:chart_of_accounts,id',
            'normal_balance' => 'required|in:debit,credit',
        ]);

        ChartOfAccount::create($validated);

        return redirect()->route('accounts.index')->with('success', 'تم إنشاء الحساب بنجاح.');
    }

    // نموذج تعديل الحساب
    public function edit($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $accounts = ChartOfAccount::where('id', '!=', $id)->get(); // استبعاد الحساب الحالي من القائمة
        return view('accounts.edit', compact('account', 'accounts'));
    }

    // تحديث الحساب
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:asset,liability,equity,revenue,expense',
            'parent_account_id' => 'nullable|exists:chart_of_accounts,id',
            'normal_balance' => 'required|in:debit,credit',
        ]);

        $account = ChartOfAccount::findOrFail($id);
        $account->update($validated);

        return redirect()->route('accounts.index')->with('success', 'تم تحديث الحساب بنجاح.');
    }

    // حذف الحساب
    public function destroy($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'تم حذف الحساب بنجاح.');
    }
}
