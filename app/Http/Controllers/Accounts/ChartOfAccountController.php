<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;


class ChartOfAccountController extends Controller
{
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display a listing of the resource.
     *
     * جلب جميع الحسابات وبناء الشجرة لكل قسم
     * جلب الأقسام المختلفة
     * تمرير البيانات إلى العرض
     *

     */
    public function index()
    {
        // جلب جميع الحسابات
        $accounts = ChartOfAccount::all();
        $assets = ChartOfAccount::where('type', 'asset')->get();
        $liabilities = ChartOfAccount::where('type', 'liability')->get();
        $expenses = ChartOfAccount::where('type', 'expense')->get();
        $revenues = ChartOfAccount::where('type', 'revenue')->get();
        // بناء الشجرة لكل قسم
        $assetsTree = $this->buildTree($accounts, 'asset');
        $liabilitiesTree = $this->buildTree($accounts, 'liability');
        $expensesTree = $this->buildTree($accounts, 'expense');
        $revenuesTree = $this->buildTree($accounts, 'revenue');

        // تمرير البيانات إلى العرض
        return view('layouts.nav-slider-route', [
            'page' => 'chart_of_accounts',
            'accounts' => $accounts,
            'assetsTree' => $assetsTree,
            'liabilitiesTree' => $liabilitiesTree,
            'expensesTree' => $expensesTree,
            'revenuesTree' => $revenuesTree,
            'assets'=>$assets,
            'expenses'=>$expenses,
            'liabilities'=>$liabilities,
           'revenues'=>$revenues,
        ]);
    }

private function buildTree($accounts, $type, $parentId = null)
{
    // تصفية الحسابات بناءً على النوع ومعرف الأب
    $filteredAccounts = $accounts->filter(function ($account) use ($type, $parentId) {
        return $account->type === $type && $account->parent_account_id == $parentId;
    });

    // التحقق من الحسابات المفلترة
    if ($filteredAccounts->isEmpty()) {
        return '<ul><li>لا توجد حسابات مطابقة</li></ul>';
    }

    // بناء الشجرة
    $html = '<ul>';
    foreach ($filteredAccounts as $account) {
        $html .= '<li>';
        $html .= '<i class="fa-solid fa-folder"></i> ' . $account->name;
        // عرض الحسابات الفرعية
        $html .= $this->buildTree($accounts, $type, $account->id);
        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}

        // نموذج إنشاء حساب جديد
    public function create()
    {
        $accounts = ChartOfAccount::all();
        return view('accounts.create', compact('accounts'));
    }

    public function parentAccount()
{
    return $this->belongsTo(ChartOfAccount::class, 'parent_account_id');
}

public function childAccounts()
{
    return $this->hasMany(ChartOfAccount::class, 'parent_account_id');
}


    // حفظ حساب جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:asset,liability,equity,revenue,expense',
            'code' => 'required|unique:chart_of_accounts,code|max:10',
            'name' => 'required|string|max:255',
            'normal_balance' => 'required|in:debit,credit',
        ]);

        ChartOfAccount::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'code' => $request->input('code'),
            'normal_balance' => $request->input('normal_balance'),
            'parent_account_id' => $request->input('parent_account_id', null),
        ]);


        return redirect()->route('accounts.index')->with('success', 'تم إضافة الحساب بنجاح.');
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
