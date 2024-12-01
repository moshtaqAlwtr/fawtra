<?php

namespace App\Http\Controllers;

use App\Models\Tax; // استدعاء الموديل الخاص بالضرائب
use Illuminate\Http\Request; // استخدام الـ Request للتعامل مع طلبات HTTP

class TaxController extends Controller
{
    /**
     * عرض جميع الضرائب مع إمكانية البحث.
     */
    public function index(Request $request)
    {
        $query = Tax::query(); // إنشاء استعلام جديد للضرائب

        // البحث بالاسم أو الرقم إذا تم تقديم كلمة مفتاحية
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword'); // الحصول على الكلمة المفتاحية
            $query->where('name', 'like', "%{$keyword}%") // البحث عن اسم يحتوي على الكلمة
                  ->orWhere('id', $keyword); // البحث عن الضرائب بالرقم
        }

        $taxes = $query->paginate(10); // تقسيم النتائج إلى صفحات (10 ضرائب لكل صفحة)
        return view('taxes.index', compact('taxes')); // عرض صفحة الضرائب مع تمرير النتائج إليها
    }

    /**
     * عرض نموذج إضافة ضريبة جديدة.
     */
    public function create()
    {
        return view('taxes.create'); // عرض صفحة إنشاء ضريبة جديدة
    }

    /**
     * تخزين ضريبة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // التحقق من أن الاسم مطلوب ونصي وطوله لا يتجاوز 255
            'rate' => 'required|numeric|min:0|max:100', // التحقق من أن النسبة بين 0 و 100
            'description' => 'nullable|string|max:1000', // الوصف اختياري ونصي
            'account_id' => 'required|exists:chart_of_accounts,id', // التأكد من أن الحساب موجود
        ]);

        Tax::create($validated); // إنشاء الضريبة باستخدام البيانات المُتحقق منها

        return redirect()->route('taxes.index')->with('success', 'تمت إضافة الضريبة بنجاح.'); // إعادة التوجيه مع رسالة نجاح
    }

    /**
     * عرض نموذج تعديل ضريبة.
     */
    public function edit($id)
    {
        $tax = Tax::findOrFail($id); // جلب الضريبة أو عرض خطأ 404 إذا لم يتم العثور عليها
        return view('taxes.edit', compact('tax')); // عرض صفحة تعديل الضريبة وتمرير بياناتها
    }

    /**
     * تحديث بيانات ضريبة معينة.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // التحقق من البيانات بنفس قواعد التخزين
            'rate' => 'required|numeric|min:0|max:100',
            'description' => 'nullable|string|max:1000',
            'account_id' => 'required|exists:chart_of_accounts,id',
        ]);

        $tax = Tax::findOrFail($id); // جلب الضريبة للتحديث
        $tax->update($validated); // تحديث بيانات الضريبة

        return redirect()->route('taxes.index')->with('success', 'تم تحديث الضريبة بنجاح.'); // إعادة التوجيه مع رسالة نجاح
    }

    /**
     * حذف ضريبة معينة.
     */
    public function destroy($id)
    {
        $tax = Tax::findOrFail($id); // جلب الضريبة أو عرض خطأ 404
        $tax->delete(); // حذف الضريبة

        return redirect()->route('taxes.index')->with('success', 'تم حذف الضريبة بنجاح.'); // إعادة التوجيه مع رسالة نجاح
    }

    /**
     * عرض تفاصيل ضريبة معينة.
     */
    public function show($id)
    {
        $tax = Tax::findOrFail($id); // جلب الضريبة
        return view('taxes.show', compact('tax')); // عرض صفحة التفاصيل وتمرير بيانات الضريبة
    }

    /**
     * نسخ ضريبة موجودة.
     */
    public function duplicate($id)
    {
        $tax = Tax::findOrFail($id); // جلب الضريبة الأصلية
        $newTax = $tax->replicate(); // نسخ البيانات الأصلية
        $newTax->name = $tax->name . ' (نسخة)'; // تعديل الاسم للإشارة إلى أنها نسخة
        $newTax->save(); // حفظ النسخة الجديدة

        return redirect()->route('taxes.index')->with('success', 'تم نسخ الضريبة بنجاح.'); // إعادة التوجيه مع رسالة نجاح
    }

    /**
     * تفعيل أو تعطيل الضريبة.
     */
    public function toggleStatus($id)
    {
        $tax = Tax::findOrFail($id); // جلب الضريبة
        $tax->is_active = !$tax->is_active; // تغيير حالة التفعيل إلى العكس
        $tax->save(); // حفظ التغيير

        return redirect()->route('taxes.index')->with('success', 'تم تحديث حالة الضريبة بنجاح.'); // إعادة التوجيه مع رسالة نجاح
    }

    /**
     * تصدير الضرائب إلى ملف CSV.
     */
    public function exportToCSV()
    {
        $taxes = Tax::all(); // جلب جميع الضرائب

        // بناء محتوى ملف CSV
        $csvData = "ID,Name,Rate,Description,Account ID\n";
        foreach ($taxes as $tax) {
            $csvData .= "{$tax->id},{$tax->name},{$tax->rate},{$tax->description},{$tax->account_id}\n";
        }

        $fileName = 'taxes_' . date('Ymd_His') . '.csv'; // إنشاء اسم للملف باستخدام التاريخ والوقت
        $filePath = storage_path($fileName); // مسار تخزين الملف

        file_put_contents($filePath, $csvData); // كتابة البيانات في الملف

        return response()->download($filePath)->deleteFileAfterSend(); // تحميل الملف وحذفه بعد الإرسال
    }

    /**
     * استيراد الضرائب من ملف CSV.
     */
    public function importFromCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt', // التأكد من أن الملف بصيغة CSV أو TXT
        ]);

        $file = $request->file('csv_file'); // الحصول على الملف
        $fileHandle = fopen($file, 'r'); // فتح الملف للقراءة
        $header = fgetcsv($fileHandle); // قراءة أول سطر (العناوين)

        while ($row = fgetcsv($fileHandle)) { // قراءة كل صف في الملف
            Tax::create([
                'name' => $row[1],
                'rate' => $row[2],
                'description' => $row[3],
                'account_id' => $row[4],
            ]);
        }

        fclose($fileHandle); // إغلاق الملف

        return redirect()->route('taxes.index')->with('success', 'تم استيراد الضرائب بنجاح.'); // إعادة التوجيه مع رسالة نجاح
    }
}
