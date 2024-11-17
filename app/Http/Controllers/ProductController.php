<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;



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
        return view('layouts.nav-slider-route', ['page' => 'products']);
    }

    /**
     * تخزين منتج جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->merge([
            'available_online' => $request->has('available_online'),
            'featured_product' => $request->has('featured_product'),
            'track_inventory' => $request->has('track_inventory'),
        ]);
        // التحقق من صحة البيانات المدخلة
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

        // إنشاء المنتج في قاعدة البيانات
        Product::create($validatedData);

        // إعادة التوجيه إلى صفحة المنتجات مع رسالة نجاح
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
            'price' => 'required|numeric|min:0',
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
}
