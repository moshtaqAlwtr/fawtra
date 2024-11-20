<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;

class ChartOfAccountController extends Controller
{
    // عرض دليل الحسابات
    public function index(Request $request)
    {
        $assets = ChartOfAccount::where('type', 'asset')->get();
        $liabilities = ChartOfAccount::where('type', 'liability')->get();
        $expenses = ChartOfAccount::where('type', 'expense')->get();
        $revenues = ChartOfAccount::where('type', 'revenue')->get();

        // التحقق من البيانات
        if ($assets->isEmpty() && $liabilities->isEmpty() && $expenses->isEmpty() && $revenues->isEmpty()) {
            return view('fawtra.15-General_Accounting.chart_of_accounts')
                ->with('error', 'لا توجد بيانات في دليل الحسابات.');
        }

        return view('fawtra.15-General_Accounting.chart_of_accounts', compact('assets', 'liabilities', 'expenses', 'revenues'));
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
            'type' => 'required|string|max:50', // نوع الحساب
            'code' => 'required|unique:chart_of_accounts,code|max:10', // الكود يجب أن يكون فريدًا
            'name' => 'required|string|max:255', // اسم الحساب
            'normal_balance' => 'required|string|in:debit,credit', // طبيعة الحساب
        ]);

        // حفظ الحساب في قاعدة البيانات
        ChartOfAccount::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'code' => $request->input('code'),
            'normal_balance' => $request->input('normal_balance'),
            'parent_account_id' => $request->input('parent_account_id', null),
        ]);

        return redirect()->back()->with('success', 'تم إضافة الحساب بنجاح.');
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
            'type' => 'required|string|max:50',
            'code' => 'required|unique:chart_of_accounts,code,' . $id, // التحقق من فريدة الكود مع استثناء الحساب الحالي
            'parent_account_id' => 'nullable|exists:chart_of_accounts,id',
            'normal_balance' => 'required|string|in:debit,credit',
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
