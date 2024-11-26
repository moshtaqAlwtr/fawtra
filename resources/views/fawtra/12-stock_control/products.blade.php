
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container my-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- أزرار التحكم -->
            <div class="d-flex justify-content-between mb-4">
                <button type="button" class="btn btn-danger btn-lg px-5">{{ __('products.cancel') }}</button>
                <button type="submit" class="btn btn-success btn-lg px-5">{{ __('products.save') }}</button>
            </div>

            <!-- تفاصيل البند -->
            <div class="card mb-4 bg-primary bg-gradient text-white rounded-4 shadow">
                <div class="card-header fs-4 text-center">
                    {{ __('products.product_details') }}
                </div>
                <div class="card-body bg-white text-dark rounded-bottom-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="product_name" class="form-label fs-5">{{ __('products.product_name') }} <span class="text-danger">*</span></label>
                            <input type="text" id="product_name" name="product_name" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.product_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="serial_number" class="form-label fs-5">{{ __('products.serial_number') }}</label>
                            <input type="text" id="serial_number" name="serial_number" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.serial_number') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label fs-5">{{ __('products.description') }}</label>
                            <textarea id="description" name="description" class="form-control form-control-lg rounded-3" rows="3" placeholder="{{ __('products.description') }}"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label fs-5">{{ __('products.category') }}</label>
                            <select id="category" name="category" class="form-select form-select-lg rounded-3">
                                <option value="category1">{{ __('products.category') }} 1</option>
                                <option value="category2">{{ __('products.category') }} 2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="brand" class="form-label fs-5">{{ __('products.brand') }}</label>
                            <select id="brand" name="brand" class="form-select form-select-lg rounded-3">
                                <option value="brand1">{{ __('products.brand') }} 1</option>
                                <option value="brand2">{{ __('products.brand') }} 2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="supplier" class="form-label fs-5">{{ __('products.supplier') }}</label>
                            <select id="supplier" name="supplier" class="form-select form-select-lg rounded-3">
                                <option value="supplier1">{{ __('products.supplier') }} 1</option>
                                <option value="supplier2">{{ __('products.supplier') }} 2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="barcode" class="form-label fs-5">{{ __('products.barcode') }}</label>
                            <input type="text" id="barcode" name="barcode" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.barcode') }}">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input rounded-3" type="checkbox" id="available_online" name="available_online">
                                <label class="form-check-label fs-5" for="available_online">{{ __('products.available_online') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input rounded-3" type="checkbox" id="featured_product" name="featured_product">
                                <label class="form-check-label fs-5" for="featured_product">{{ __('products.featured_product') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- تفاصيل التسعير -->
            <div class="card mb-4 bg-primary bg-gradient text-white rounded-4 shadow">
                <div class="card-header fs-4 text-center">
                    {{ __('products.pricing_details') }}
                </div>
                <div class="card-body bg-white text-dark rounded-bottom-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="purchase_price" class="form-label fs-5">{{ __('products.purchase_price') }}</label>
                            <input type="number" id="purchase_price" name="purchase_price" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.purchase_price') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="sale_price" class="form-label fs-5">{{ __('products.sale_price') }}</label>
                            <input type="number" id="sale_price" name="sale_price" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.sale_price') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="tax1" class="form-label fs-5">{{ __('products.tax1') }}</label>
                            <input type="number" id="tax1" name="tax1" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.tax1') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="tax2" class="form-label fs-5">{{ __('products.tax2') }}</label>
                            <input type="number" id="tax2" name="tax2" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.tax2') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="discount" class="form-label fs-5">{{ __('products.discount') }}</label>
                            <input type="number" id="discount" name="discount" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.discount') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="profit_margin" class="form-label fs-5">{{ __('products.profit_margin') }}</label>
                            <input type="number" id="profit_margin" name="profit_margin" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.profit_margin') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- إدارة المخزون -->
            <div class="card mb-4 bg-primary bg-gradient text-white rounded-4 shadow">
                <div class="card-header fs-4 text-center">
                    {{ __('products.inventory_management') }}
                </div>
                <div class="card-body bg-white text-dark rounded-bottom-4">
                    <div class="form-check">
                        <input class="form-check-input rounded-3" type="checkbox" id="track_inventory" name="track_inventory">
                        <label class="form-check-label fs-5" for="track_inventory">{{ __('products.track_inventory') }}</label>
                    </div>
                    <div class="mt-3">
                        <label for="low_stock_alert" class="form-label fs-5">{{ __('products.low_stock_alert') }}</label>
                        <input type="number" id="low_stock_alert" name="low_stock_alert" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.low_stock_alert') }}">
                    </div>
                </div>
            </div>

            <!-- خيارات إضافية -->
            <div class="card bg-primary bg-gradient text-white rounded-4 shadow">
                <div class="card-header fs-4 text-center">
                    {{ __('products.additional_options') }}
                </div>
                <div class="card-body bg-white text-dark rounded-bottom-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="notes" class="form-label fs-5">{{ __('products.notes') }}</label>
                            <textarea id="notes" name="notes" rows="3" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.notes') }}"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="tags" class="form-label fs-5">{{ __('products.tags') }}</label>
                            <input type="text" id="tags" name="tags" class="form-control form-control-lg rounded-3" placeholder="{{ __('products.tags') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label fs-5">{{ __('products.status') }}</label>
                            <select id="status" name="status" class="form-select form-select-lg rounded-3">
                                <option value="active">{{ __('products.active') }}</option>
                                <option value="inactive">{{ __('products.inactive') }}</option>
                                <option value="suspended">{{ __('products.suspended') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

