<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * عرض جميع العملاء.
     */
    public function index()
    {
        // جلب جميع العملاء
        $clients = Client::all();
        $employees = Employee::all();

        // تمرير المتغير إلى العرض
        return view('layouts.nav-slider-route', [
            'page' => 'customer-management',
            'clients' => $clients,
            'employees' => $employees // تأكد من تمرير المتغير هنا
        ]);
    }
    /**
     * عرض نموذج إضافة عميل جديد.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * حفظ بيانات العميل الجديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trade_name' => 'required|string|max:255',
            'account_code' => 'required|string|max:50',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'street_address_1' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',

            'country' => 'nullable|string|max:255',
            'credit_limit' => 'nullable|numeric',
            'credit_period' => 'nullable|integer',
            'notes' => 'nullable|string',
            'attachments' => 'nullable|file',
        ]);

        $client = Client::create($validatedData);

        if ($request->hasFile('attachments')) {
            $path = $request->file('attachments')->store('attachments', 'public');
            $client->update(['attachments' => $path]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'تم إضافة العميل بنجاح.',
                'client' => $client
            ]);
        }

        return redirect()->route('clients.index')->with('success', 'تم إضافة العميل بنجاح.');
    }

    /**
     * عرض تفاصيل عميل معين.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $employees = Employee::all();
        return view('clients.show', compact('client', 'employees'));
    }

    /**
     * عرض نموذج تعديل بيانات العميل.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * تحديث بيانات العميل.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'trade_name' => 'required|string|max:255',
            'account_code' => 'required|string|max:50',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'street_address_1' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'credit_limit' => 'nullable|numeric',
            'credit_period' => 'nullable|integer',
            'notes' => 'nullable|string',
            'attachments' => 'nullable|file',
        ]);

        $client->update($validatedData);

        if ($request->hasFile('attachments')) {
            if ($client->attachments) {
                Storage::disk('public')->delete($client->attachments);
            }

            $path = $request->file('attachments')->store('attachments', 'public');
            $client->update(['attachments' => $path]);
        }

        return redirect()->route('clients.index')->with('success', 'تم تحديث بيانات العميل بنجاح.');
    }

    /**
     * حذف العميل.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->attachments) {
            Storage::disk('public')->delete($client->attachments);
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'تم حذف العميل بنجاح.');
    }

    /**
     * البحث عن العملاء.
     */
    public function search(Request $request)
    {
        $query = Client::query();

        if ($request->filled('trade_name')) {
            $query->where('trade_name', 'LIKE', '%' . $request->trade_name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->filled('city')) {
            $query->where('city', 'LIKE', '%' . $request->city . '%');
        }

        $clients = $query->get();

        return view('clients.search-results', compact('clients'));
    }

    /**
     * تصدير قائمة العملاء إلى ملف Excel.
     */
    public function exportToExcel()
    {
        $clients = Client::all();

        // تصدير باستخدام مكتبة Excel
        return Excel::download(new ClientsExport($clients), 'clients.xlsx');
    }

    /**
     * استيراد قائمة العملاء من ملف Excel.
     */
    public function importFromExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new ClientsImport, $request->file('file'));

        return redirect()->route('clients.index')->with('success', 'تم استيراد العملاء بنجاح.');
    }

    /**
     * عرض تقرير شامل عن العملاء.
     */
    public function generateReport()
    {
        $clients = Client::select('trade_name', 'email', 'city', 'credit_limit')
            ->orderBy('trade_name', 'asc')
            ->get();

        return view('clients.report', compact('clients'));
    }

    /**
     * عرض العملاء الذين تجاوزوا حد الائتمان.
     */
    public function creditLimitExceeded()
    {
        $clients = Client::whereColumn('credit_limit', '<', 'outstanding_balance')->get();

        return view('clients.credit-limit-exceeded', compact('clients'));
    }
}
