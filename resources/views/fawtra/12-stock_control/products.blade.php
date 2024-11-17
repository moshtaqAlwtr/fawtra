<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('products.product_details') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #f0f4f7, #c9d6df);
            direction: rtl;
            text-align: right;
        }
    </style>
</head>

<body>

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
        <div class="controls">
            <button class="btn btn-danger">{{ __('products.cancel') }}</button>
            <button class="btn btn-success">{{ __('products.save') }}</button>
        </div>

        <div class="container form-container">

            <!-- تفاصيل البند -->
            <div class="form-section">
                <h3>{{ __('products.product_details') }}</h3>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="product_name">{{ __('products.product_name') }} <span class="text-danger">*</span></label>
                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="{{ __('products.product_name') }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="serial_number">{{ __('products.serial_number') }}</label>
                        <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="{{ __('products.serial_number') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="description">{{ __('products.description') }}</label>
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="{{ __('products.description') }}"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="category">{{ __('products.category') }}</label>
                        <select id="category" name="category" class="form-control">
                            <option value="category1">{{ __('products.category') }} 1</option>
                            <option value="category2">{{ __('products.category') }} 2</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="brand">{{ __('products.brand') }}</label>
                        <select id="brand" name="brand" class="form-control">
                            <option value="brand1">{{ __('products.brand') }} 1</option>
                            <option value="brand2">{{ __('products.brand') }} 2</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="supplier">{{ __('products.supplier') }}</label>
                        <select id="supplier" name="supplier" class="form-control">
                            <option value="supplier1">{{ __('products.supplier') }} 1</option>
                            <option value="supplier2">{{ __('products.supplier') }} 2</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="barcode">{{ __('products.barcode') }}</label>
                        <input type="text" id="barcode" name="barcode" class="form-control" placeholder="{{ __('products.barcode') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="checkbox" id="available_online" name="available_online" class="form-check-input">
                        <label for="available_online" class="form-check-label">{{ __('products.available_online') }}</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="checkbox" id="featured_product" name="featured_product" class="form-check-input">
                        <label for="featured_product" class="form-check-label">{{ __('products.featured_product') }}</label>
                    </div>
                </div>
            </div>

            <!-- تفاصيل التسعير -->
            <div class="form-section">
                <h3>{{ __('products.pricing_details') }}</h3>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="purchase_price">{{ __('products.purchase_price') }}</label>
                        <input type="number" id="purchase_price" name="purchase_price" class="form-control" placeholder="{{ __('products.purchase_price') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="sale_price">{{ __('products.sale_price') }}</label>
                        <input type="number" id="sale_price" name="sale_price" class="form-control" placeholder="{{ __('products.sale_price') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="tax1">{{ __('products.tax1') }}</label>
                        <input type="number" id="tax1" name="tax1" class="form-control" placeholder="{{ __('products.tax1') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="tax2">{{ __('products.tax2') }}</label>
                        <input type="number" id="tax2" name="tax2" class="form-control" placeholder="{{ __('products.tax2') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="min_sale_price">{{ __('products.min_sale_price') }}</label>
                        <input type="number" id="min_sale_price" name="min_sale_price" class="form-control" placeholder="{{ __('products.min_sale_price') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="discount">{{ __('products.discount') }}</label>
                        <input type="number" id="discount" name="discount" class="form-control" placeholder="{{ __('products.discount') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="discount_type">{{ __('products.discount_type') }}</label>
                        <select id="discount_type" name="discount_type" class="form-control">
                            <option value="percentage">{{ __('products.percentage') }}</option>
                            <option value="currency">{{ __('products.currency') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="profit_margin">{{ __('products.profit_margin') }}</label>
                        <input type="number" id="profit_margin" name="profit_margin" class="form-control" placeholder="{{ __('products.profit_margin') }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- إدارة المخزون -->
        <div class="container bottom-section">
            <h3>{{ __('products.inventory_management') }}</h3>

            <div class="form-group">
                <input type="checkbox" id="track_inventory" name="track_inventory" class="form-check-input">
                <label for="track_inventory" class="form-check-label">{{ __('products.track_inventory') }}</label>
            </div>
            <div class="form-group">
                <input type="number" id="low_stock_alert" name="low_stock_alert" class="form-control" placeholder="{{ __('products.low_stock_alert') }}">
            </div>
        </div>

        <!-- خيارات إضافية -->
        <div class="container bottom-section">
            <h3>{{ __('products.additional_options') }}</h3>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="notes">{{ __('products.notes') }}</label>
                    <textarea id="notes" name="notes" rows="3" class="form-control" placeholder="{{ __('products.notes') }}"></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label for="tags">{{ __('products.tags') }}</label>
                    <input type="text" id="tags" name="tags" class="form-control" placeholder="{{ __('products.tags') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="status">{{ __('products.status') }}</label>
                <select id="status" name="status" class="form-control">
                    <option value="active">{{ __('products.active') }}</option>
                    <option value="inactive">{{ __('products.inactive') }}</option>
                    <option value="suspended">{{ __('products.suspended') }}</option>
                </select>
            </div>
        </div>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
