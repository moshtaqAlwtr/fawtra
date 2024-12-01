<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\InvoiceItem;
use App\Models\Employee;  // Make sure to include the Employee model
use PDF;
use Mail;

class InvoiceController extends Controller
{
    /**
     * عرض جميع الفواتير
     */
    public function index(Request $request)
    {
        $page = $request->query('page');
        
        // جلب العملاء والموظفين
        $clients = Client::all();
        $employees = Employee::all();
    
        if ($page == 'create') {
            return view('layouts.nav-slider-route', [
                'page' => 'sales_invoice',
                'clients' => $clients,
                'employees' => $employees
            ]);
        } elseif ($page == 'manage') {
            // جلب الفواتير لعرضها
            $invoices = Invoice::with(['client', 'employee'])->get();
    
            return view('layouts.nav-slider-route', [
                'page' => 'invoice-management',
                'invoices' => $invoices,
                'clients' => $clients,
                'employees' => $employees
            ]);
        }
    
        // عرض صفحة إدارة الفواتير كحالة افتراضية
        $invoices = Invoice::with(['client', 'employee'])->get();
        return view('layouts.nav-slider-route', [
            'page' => 'invoice-management',
            'invoices' => $invoices,
            'clients' => $clients,
            'employees' => $employees
        ]);
    }
    


    /**
     * Display the form to create a new invoice.
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all(); // Fetch all employees

        return view('layouts.nav-slider-route', [
            'page' => 'salas_invoice',
            'invoices' => $invoices
        ]);
    }

    /**
     * تخزين فاتورة جديدة
     */
    public function store(Request $request)
{
    // التحقق من صحة البيانات
    $validated = $request->validate([
        'payment_status' => 'required|string',
        'client_id' => 'required|exists:clients,id',
        'invoice_date' => 'required|date',
        'employee_id' => 'required|exists:employees,employee_id',
        'items.*.item' => 'required|string',
        'items.*.unit_price' => 'required|numeric|min:0',
        'items.*.quantity' => 'required|numeric|min:1',
        'items.*.total' => 'nullable|numeric',
    ]);

    // إنشاء الفاتورة
    $invoice = new Invoice();
    $invoice->client_id = $request->client_id;
    $invoice->invoice_date = $request->invoice_date;
    $invoice->payment_status = $request->payment_status;
    $invoice->employee_id = $request->employee_id;
    $invoice->sales_manager = $request->sales_manager ?? null;
    $invoice->issue_date = $request->issue_date;
    $invoice->payment_terms = $request->payment_terms;
    $invoice->grand_total = array_sum(array_column($request->items, 'total'));
    $invoice->save();

    // إضافة عناصر الفاتورة
    foreach ($request->items as $item) {
        $invoiceItem = new InvoiceItem();
        $invoiceItem->invoice_id = $invoice->id;
        $invoiceItem->item = $item['item'];
        $invoiceItem->description = $item['description'];
        $invoiceItem->unit_price = $item['unit_price'];
        $invoiceItem->quantity = $item['quantity'];
        $invoiceItem->discount = $item['discount'];
        $invoiceItem->discount_type = $item['discount_type'];
        $invoiceItem->tax_1 = $item['tax1'];
        $invoiceItem->tax_2 = $item['tax2'];
        $invoiceItem->total = $item['total'];
        $invoiceItem->save();
    }

    // إعادة التوجيه إلى صفحة عرض الفاتورة بعد الحفظ
    return redirect()->route('invoice-management')
                 ->with('success', __('sales_invoice.invoice_saved'));
}


    /**
     * عرض تفاصيل فاتورة معينة
     */
    public function show(Invoice $invoice)
    {
        // جلب جميع الفواتير
        $invoices = Invoice::all(); // جلب جميع الفواتير

        return view('layouts.nav-slider-route', [
            'page' => 'invoice-management',
            'invoice' => $invoice,
            'invoices' => $invoices // تأكد من تمرير $invoices هنا
        ]);
    }




    /**
     * تعديل الفاتورة
     */
    public function edit($id)
    {
        return redirect()->back()
            ->with('error', __('purchase_admin.unauthorized_edit'));
    }

    /**
     * تحديث فاتورة
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'employee_id' => 'required|exists:employees,employee_id', // Employee validation
            'items' => 'required|array',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'client_id' => $validatedData['client_id'],
            'invoice_date' => $validatedData['invoice_date'],
            'employee_id' => $validatedData['employee_id'], // Update the employee
        ]);

        // Delete old invoice items
        $invoice->invoice_items()->delete();
        $total = 0;

        // Add new items
        foreach ($validatedData['items'] as $item) {
            if (!isset($item['price'])) {
                return back()->withErrors(['items.*.price' => 'Price is required for each item'])->withInput();
            }

            $invoice->invoice_items()->create($item);
            $total += $item['quantity'] * $item['price'];
        }

        $invoice->update(['total' => $total]);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }



    /**
     * Delete a specific invoice.
     */
    public function destroy($id)
    {
        return redirect()->back()
            ->with('error', __('purchase_admin.unauthorized_delete'));
    }

    /**
     * إضافة ضريبة وخصم
     */
    public function addTaxAndDiscount(Request $request, $id)
    {
        $validated = $request->validate([
            'tax' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $total = $invoice->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        $total += $validated['tax'] ?? 0;
        $total -= $validated['discount'] ?? 0;

        $invoice->update([
            'tax' => $validated['tax'],
            'discount' => $validated['discount'],
            'total' => $total,
        ]);

        return redirect()->route('invoices.index')->with('success', 'تم تحديث الضريبة والخصومات بنجاح.');
    }

    /**
     * إنشاء تقرير فواتير
     */
    public function generateReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        $query = Invoice::whereBetween('invoice_date', [$validated['start_date'], $validated['end_date']]);

        if ($request->filled('client_id')) {
            $query->where('client_id', $validated['client_id']);
        }

        $invoices = $query->with('client')->get();

        return view('invoices.report', compact('invoices', 'validated'));
    }

    /**
     * إرسال الفاتورة بالبريد الإلكتروني
     */
    public function sendToClient($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

        Mail::send([], [], function ($message) use ($invoice, $pdf) {
            $message->to($invoice->client->email)
                ->subject('Invoice #' . $invoice->id)
                ->attachData($pdf->output(), 'invoice-' . $invoice->id . '.pdf');
        });

        return redirect()->route('invoices.index')->with('success', 'تم إرسال الفاتورة إلى العميل بنجاح.');
    }

    /**
     * طباعة الفاتورة كملف PDF
     */
    public function print($id)
    {
        $invoice = Invoice::with(['client', 'invoice_items'])->findOrFail($id);

         // تحميل الـ Blade لعرض الفاتورة وتحويلها إلى PDF
         $pdf = PDF::loadView('fawtra.2-purchase_admin.invoice.invoice_print', compact('invoice'));

         // تحميل الـ PDF
         return $pdf->download('invoice-' . $invoice->id . '.pdf');
     }

    /**
     * تصفية وبحث الفواتير
     */
    public function filter(Request $request)
    {
        $query = Invoice::query();

        // Basic filters
        if ($request->filled('invoice_number')) {
            $query->where('invoice_number', 'like', '%' . $request->invoice_number . '%');
        }

        if ($request->filled('client')) {
            $query->where('client_id', $request->client);
        }

        // تصفية حسب الموظف
        if ($request->filled('employee')) {
            $query->where('employee_id', $request->employee);
        }

        // تصفية حسب مدير المبيعات
        if ($request->filled('sales_manager')) {
            $query->whereHas('employee', function($q) use ($request) {
                $q->where('role', 'sales_manager')
                  ->where('id', $request->sales_manager);
            });
        }

        // تصفية حسب حالة الدفع
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // تصفية حسب شروط الدفع
        if ($request->filled('payment_terms')) {
            $query->where('payment_terms', $request->payment_terms);
        }

        // تصفية حسب العملة
        if ($request->filled('currency')) {
            $query->where('currency', $request->currency);
        }

        // تصفية حسب حقل مخصص
        if ($request->filled('custom_field')) {
            $query->whereHas('customFields', function($q) use ($request) {
                $q->where('field_value', 'like', '%' . $request->custom_field . '%');
            });
        }

        // تصفية حسب نطاق التاريخ
        if ($request->filled('date_from')) {
            $query->whereDate('invoice_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('invoice_date', '<=', $request->date_to);
        }

        // تصفية حسب تاريخ الاستحقاق
        if ($request->filled('due_date_from')) {
            $query->whereDate('due_date', '>=', $request->due_date_from);
        }
        if ($request->filled('due_date_to')) {
            $query->whereDate('due_date', '<=', $request->due_date_to);
        }

        // تصفية حسب تاريخ الإنشاء
        if ($request->filled('created_at_from')) {
            $query->whereDate('created_at', '>=', $request->created_at_from);
        }
        if ($request->filled('created_at_to')) {
            $query->whereDate('created_at', '<=', $request->created_at_to);
        }

        // تصفية حسب المبلغ الإجمالي
        if ($request->filled('total_amount_from')) {
            $query->where('total_amount', '>=', $request->total_amount_from);
        }
        if ($request->filled('total_amount_to')) {
            $query->where('total_amount', '<=', $request->total_amount_to);
        }

        // تصفية حسب المبلغ المدفوع
        if ($request->filled('paid_amount_from')) {
            $query->where('paid_amount', '>=', $request->paid_amount_from);
        }
        if ($request->filled('paid_amount_to')) {
            $query->where('paid_amount', '<=', $request->paid_amount_to);
        }

        // تصفية حسب المبلغ المتبقي
        if ($request->filled('remaining_amount_from')) {
            $query->where('remaining_amount', '>=', $request->remaining_amount_from);
        }
        if ($request->filled('remaining_amount_to')) {
            $query->where('remaining_amount', '<=', $request->remaining_amount_to);
        }

        // تصفية حسب حالة التسليم
        if ($request->filled('delivery_status')) {
            $query->where('delivery_status', $request->delivery_status);
        }

        // تصفية حسب مصدر الطلب
        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }

        // تصفية حسب خيارات الشحن
        if ($request->filled('shipping_options')) {
            $query->where('shipping_options', $request->shipping_options);
        }

        // تصفية حسب Pos Shift
        if ($request->filled('pos_shift')) {
            $query->where('pos_shift', $request->pos_shift);
        }

        // تصفية حسب محتوى البند
        if ($request->filled('contains_item')) {
            $query->whereHas('items', function($q) use ($request) {
                $q->where('item_name', 'like', '%' . $request->contains_item . '%')
                  ->orWhere('item_description', 'like', '%' . $request->contains_item . '%')
                  ->orWhere('item_code', 'like', '%' . $request->contains_item . '%');
            });
        }

        // Handle custom fields (25 fields)
        for ($i = 1; $i <= 25; $i++) {
            $fieldName = "custom_field_{$i}";
            $fieldType = $request->input("custom_field_type_{$i}");
            $fieldValue = $request->input($fieldName);

            if ($request->filled($fieldName)) {
                switch ($fieldType) {
                    case 'text':
                        $query->whereHas('customFields', function($q) use ($fieldName, $fieldValue) {
                            $q->where('field_name', $fieldName)
                              ->where('field_value', 'like', "%{$fieldValue}%");
                        });
                        break;

                    case 'number':
                        $query->whereHas('customFields', function($q) use ($fieldName, $fieldValue) {
                            $q->where('field_name', $fieldName)
                              ->where('field_value', $fieldValue);
                        });
                        break;

                    case 'date':
                        $query->whereHas('customFields', function($q) use ($fieldName, $fieldValue) {
                            $q->where('field_name', $fieldName)
                              ->whereDate('field_value', $fieldValue);
                        });
                        break;

                    case 'select':
                        $query->whereHas('customFields', function($q) use ($fieldName, $fieldValue) {
                            $q->where('field_name', $fieldName)
                              ->where('field_value', $fieldValue);
                        });
                        break;

                    case 'checkbox':
                        if ($fieldValue === 'on' || $fieldValue === '1') {
                            $query->whereHas('customFields', function($q) use ($fieldName) {
                                $q->where('field_name', $fieldName)
                                  ->where('field_value', true);
                            });
                        }
                        break;
                }
            }
        }

        // الترتيب
        $sortField = $request->input('sort_field', 'created_at');
        $sortDirection = $request->input('sort_direction', 'desc');
        $query->orderBy($sortField, $sortDirection);

        // التصفح
        $perPage = $request->input('per_page', 10);
        $invoices = $query->with(['client', 'employee', 'items', 'customFields'])
                         ->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $invoices,
                'pagination' => [
                    'total' => $invoices->total(),
                    'per_page' => $invoices->perPage(),
                    'current_page' => $invoices->currentPage(),
                    'last_page' => $invoices->lastPage(),
                    'from' => $invoices->firstItem(),
                    'to' => $invoices->lastItem()
                ]
            ]);
        }

        return view('layouts.nav-slider-route', [
            'page' => 'invoice-management',
            'invoices' => $invoices,
            'clients' => Client::all(),
            'employees' => Employee::all(),
            'search_params' => $request->all()
        ]);
    }

    /**
     * حفظ تكوين الحقول المخصصة
     */
    public function saveCustomFieldsConfig(Request $request)
    {
        try {
            $config = $request->input('config');
            
            // حفظ التكوين في قاعدة البيانات
            foreach ($config as $fieldId => $fieldConfig) {
                InvoiceCustomField::updateOrCreate(
                    ['field_name' => "custom_field_{$fieldId}"],
                    [
                        'field_type' => $fieldConfig['type'],
                        'field_label' => $fieldConfig['label']
                    ]
                );
            }
            
            return response()->json([
                'success' => true,
                'message' => 'تم حفظ التكوين بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء حفظ التكوين: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * استرجاع تكوين الحقول المخصصة
     */
    public function getCustomFieldsConfig()
    {
        try {
            $config = InvoiceCustomField::select('field_name', 'field_type', 'field_label')
                                      ->get()
                                      ->keyBy('field_name')
                                      ->toArray();
            
            return response()->json([
                'success' => true,
                'data' => $config
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء استرجاع التكوين: ' . $e->getMessage()
            ], 500);
        }
    }
}
