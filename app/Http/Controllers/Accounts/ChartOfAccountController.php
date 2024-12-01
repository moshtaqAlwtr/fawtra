<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;

class ChartOfAccountController extends Controller
{
    /*************  ✨ Codeium Command ⭐  *************/

    /**
     * عرض جميع الحسابات مع إمكانية البحث.
     *
     * هذه الدالة تعرض جميع الحسابات مع إمكانية البحث بناءً على اسم الحساب أو كود الحساب.
     * وتعرض النتائج في صفحة مقسمة.
     */
    public function index(Request $request)
{
    $query = ChartOfAccount::query();

    // البحث باسم الحساب أو الكود
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->input('search');
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('code', 'like', "%{$search}%");
    }

    // جلب جميع الحسابات بعد البحث إذا كان هناك، مع تقسيمها لصفحات
    $accounts = $query->paginate(10);

    // جلب الحسابات حسب النوع
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
        'assets' => $assets,
        'expenses' => $expenses,
        'liabilities' => $liabilities,
        'revenues' => $revenues,
    ]);
}


    /**
     * عرض الحسابات الفرعية لحساب رئيسي معين.
     *
     * تقوم هذه الدالة بجلب الحسابات التي تابعة لحساب رئيسي معين باستخدام الـ parent_account_id.
     * ويتم عرضها في صفحة منفصلة.
     */
    public function getSubAccounts($parentId)
    {
        // جلب الحسابات التي تابعة لحساب رئيسي معين
        $subAccounts = ChartOfAccount::where('parent_account_id', $parentId)->get();

        return view('accounts.subaccounts', compact('subAccounts'));
    }

    /**
     * إلغاء حساب معين (تغيير حالته إلى ملغى).
     *
     * هذه الدالة تقوم بتغيير حالة الحساب إلى ملغى.
     */
    public function cancelAccount($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $account->status = 'cancelled';  // أو يمكن إضافة عمود status في جدول الحسابات
        $account->save();

        return redirect()->route('accounts.index')->with('success', 'تم إلغاء الحساب بنجاح.');
    }

    /**
     * إحصائيات الحسابات: عدد الحسابات لكل نوع.
     *
     * تقوم هذه الدالة بعرض عدد الحسابات بناءً على النوع (أصول، خصوم، مصروفات، إيرادات).
     * هذه الدالة تعطي إحصائية عددية لكل نوع من الحسابات.
     */
    public function statistics()
    {
        $statistics = [
            'asset' => ChartOfAccount::where('type', 'asset')->count(),
            'liability' => ChartOfAccount::where('type', 'liability')->count(),
            'expense' => ChartOfAccount::where('type', 'expense')->count(),
            'revenue' => ChartOfAccount::where('type', 'revenue')->count(),
        ];

        return view('accounts.statistics', compact('statistics'));
    }

    /**
     * عرض حسابات من نوع معين بناءً على المعايير.
     *
     * تقوم هذه الدالة بجلب الحسابات من نوع معين مثل (أصول، خصوم، إلخ).
     * هذه الدالة تتيح تصفية الحسابات وفقاً لنوع الحساب.
     */
    public function filterByType($type)
    {
        // جلب الحسابات من نوع معين (مثل الأصول، الخصوم، إلخ)
        $accounts = ChartOfAccount::where('type', $type)->get();

        return view('accounts.filter', compact('accounts', 'type'));
    }

    /**
     * جلب جميع الحسابات.
     * جلب الأقسام المختلفة: أصول، خصوم، مصروفات، إيرادات.
     * بناء الشجرة لكل قسم.
     *
     * هذه الدالة تقوم بجلب جميع الحسابات بناءً على الأقسام المختلفة
     * وتعرضها في شكل شجرة.
     */
    public function indexWithSections()
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
            'assets' => $assets,
            'expenses' => $expenses,
            'liabilities' => $liabilities,
            'revenues' => $revenues,
        ]);
    }

    /**
     * جلب البيانات الخاصة بالقسم (الأصول، الخصوم، المصروفات، الإيرادات).
     *
     * تقوم هذه الدالة بجلب البيانات الخاصة بكل قسم بناءً على النوع.
     */
    public function getSectionData($type)
    {
        // التحقق من نوع القسم وجلب البيانات
        switch ($type) {
            case 'asset':
                $data = ChartOfAccount::where('type', 'asset')->get();
                $title = 'الأصول';
                break;
            case 'liability':
                $data = ChartOfAccount::where('type', 'liability')->get();
                $title = 'الخصوم';
                break;
            case 'expense':
                $data = ChartOfAccount::where('type', 'expense')->get();
                $title = 'المصروفات';
                break;
            case 'revenue':
                $data = ChartOfAccount::where('type', 'revenue')->get();
                $title = 'الإيرادات';
                break;
            default:
                return response()->json(['error' => 'نوع القسم غير صالح.'], 400);
        }

        return response()->json([
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * بناء شجرة الحسابات لكل قسم.
     *
     * تقوم هذه الدالة ببناء شجرة الحسابات بناءً على الأقسام.
     */
    private function buildTree($accounts, $type, $parentId = null)
    {
        $filteredAccounts = $accounts->filter(function ($account) use ($type, $parentId) {
            return $account->type === $type && $account->parent_account_id == $parentId;
        });

        if ($filteredAccounts->isEmpty()) {
            return '';
        }

        $html = '<ul>';
        foreach ($filteredAccounts as $account) {
            $html .= '<li>';
            $html .= '<i class="fa-solid fa-folder"></i> ' . $account->name;
            $html .= $this->buildTree($accounts, $type, $account->id);
            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    /**
     * عرض نموذج إضافة حساب جديد.
     */
    public function create()
    {
        $accounts = ChartOfAccount::all();
        return view('accounts.create', compact('accounts'));
    }

    /**
     * حفظ حساب جديد.
     *
     * هذه الدالة تقوم بحفظ الحساب الجديد في قاعدة البيانات.
     */
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

    /**
     * عرض نموذج تعديل حساب.
     *
     * تعرض هذه الدالة نموذج تعديل الحساب.
     */
    public function edit($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $accounts = ChartOfAccount::where('id', '!=', $id)->get(); // استبعاد الحساب الحالي من القائمة
        return view('accounts.edit', compact('account', 'accounts'));
    }

    /**
     * تحديث الحساب.
     *
     * هذه الدالة تقوم بتحديث الحساب الموجود في قاعدة البيانات.
     */
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

    /**
     * حذف الحساب.
     *
     * هذه الدالة تقوم بحذف الحساب من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'تم حذف الحساب بنجاح.');
    }

}
