<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * عرض جميع المنتجات.
     */
    public function index()
    {
        $products = Product::all();
        return view('layouts.nav-slider-route', ['page' => 'products', 'products' => $products]);
    }

    /**
     * عرض نموذج إضافة منتج جديد.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * تخزين منتج جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'stock_quantity' => 'nullable|integer|min:0',
            'reorder_level' => 'nullable|integer|min:0',
            'serial_number' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'supplier' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'available_online' => 'nullable|boolean',
            'featured_product' => 'nullable|boolean',
            'track_inventory' => 'nullable|boolean',
            'inventory_type' => 'nullable|string|max:255',
            'low_stock_alert' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive,suspended',
            'purchase_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'tax1' => 'nullable|numeric|min:0',
            'tax2' => 'nullable|numeric|min:0',
            'min_sale_price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:percentage,currency',
            'profit_margin' => 'nullable|numeric|min:0',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'تمت إضافة المنتج بنجاح!');
    }

    /**
     * عرض تفاصيل منتج معين.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * عرض نموذج تعديل منتج موجود.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * تحديث بيانات منتج معين.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'stock_quantity' => 'nullable|integer|min:0',
            'reorder_level' => 'nullable|integer|min:0',
            'serial_number' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'supplier' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'available_online' => 'nullable|boolean',
            'featured_product' => 'nullable|boolean',
            'track_inventory' => 'nullable|boolean',
            'inventory_type' => 'nullable|string|max:255',
            'low_stock_alert' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive,suspended',
            'purchase_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'tax1' => 'nullable|numeric|min:0',
            'tax2' => 'nullable|numeric|min:0',
            'min_sale_price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:percentage,currency',
            'profit_margin' => 'nullable|numeric|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح!');
    }

    /**
     * حذف منتج.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'تم حذف المنتج بنجاح!');
    }

    /**
     * البحث عن المنتجات.
     */
    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->filled('product_name')) {
            $query->where('product_name', 'LIKE', '%' . $request->product_name . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        $products = $query->get();

        return view('products.search-results', compact('products'));
    }

    /**
     * عرض المنتجات منخفضة الكمية.
     */
    public function lowStockAlert()
    {
        $products = Product::whereColumn('stock_quantity', '<=', 'reorder_level')->get();

        return view('products.low-stock', compact('products'));
    }

    /**
     * رفع صورة للمنتج.
     */
    public function uploadImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->update(['image_path' => $path]);
        }

        return redirect()->route('products.index')->with('success', 'تم تحديث صورة المنتج بنجاح!');
    }

    /**
     * عرض المنتجات الأكثر مبيعًا.
     */
    public function bestSellers()
    {
        $products = Product::withCount('sales')
            ->orderBy('sales_count', 'desc')
            ->take(10)
            ->get();

        return view('products.best-sellers', compact('products'));
    }

    /**
     * حساب الأرباح لكل منتج.
     */
    public function calculateProfit($id)
    {
        $product = Product::findOrFail($id);

        $profit = ($product->sale_price - $product->purchase_price) * $product->sales_count;

        return response()->json([
            'product' => $product->product_name,
            'profit' => $profit,
        ]);
    }

    /**
     * تصدير قائمة المنتجات إلى ملف Excel.
     */
    public function exportToExcel()
    {
        $products = Product::all();

        // استخدام مكتبة Excel للتصدير
        return Excel::download(new ProductsExport($products), 'products.xlsx');
    }

    /**
     * استيراد المنتجات من ملف Excel.
     */
    public function importFromExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->route('products.index')->with('success', 'تم استيراد المنتجات بنجاح.');
    }

    /**
     * عرض تقرير المخزون.
     */
    public function stockReport()
    {
        $products = Product::select('product_name', 'stock_quantity', 'reorder_level')
            ->orderBy('stock_quantity', 'asc')
            ->get();

        return view('products.stock-report', compact('products'));
    }
}
