@extends('layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('purchase_admin.invoice_management') }}
@endsection
@section('page-header')
@endsection
@section('content')

<!-- عرض الرسائل -->
@if(session('error'))
    <div class="notification-popup error" id="errorAlert" dir="rtl">
        <div class="notification-content">
            <div class="icon-box">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-text">
                <h3>تنبيه!</h3>
                <p>{{ __('purchase_admin.'.session('error')) }}</p>
            </div>
        </div>
        <button class="close-notification" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
        <div class="notification-progress"></div>
    </div>
@endif

<div class="main-container">
    <div class="content-box">
        <div class="top-bar">
            <h5 class="mb-0">{{ trans('purchase_admin.invoice_management') }}</h5>
        </div>
        
        <div class="container my-4">
            <!-- Header Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-success" onclick="location.href='{{ route('sales_invoice') }}?page=create'">
                    <i class="fas fa-plus-circle"></i> {{ trans('purchase_admin.new_invoice') }}
                </button>

                <!-- أزرار البحث الأساسية -->
                <div class="search-buttons-container">
                    <button type="button" class="search-btn primary" id="basicSearchBtn">
                        <i class="fas fa-search"></i>
                        بحث
                    </button>
                    <button type="button" class="search-btn outline" id="toggleAdvancedSearch">
                        <i class="fas fa-search-plus"></i>
                        بحث متقدم
                    </button>
                    <button type="button" class="search-btn secondary" id="cancelSearchBtn">
                        <i class="fas fa-times"></i>
                        إلغاء
                    </button>
                </div>

                <!-- Settings and Actions Buttons -->
                <div class="d-flex align-items-center">
                    <button class="btn btn-secondary mr-2" onclick="location.href='{{route('appointments')}}'">
                        {{ trans('purchase_admin.appointments') }}
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('purchase_admin.actions') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="actionsDropdown" dir="rtl">
                            <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ trans('purchase_admin.delete') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ trans('purchase_admin.send_to_client') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-check-circle text-success"></i> {{ trans('purchase_admin.mark_as_paid') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ trans('purchase_admin.print_pdf') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-file-export text-secondary"></i> {{ trans('purchase_admin.export') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- نموذج البحث المتقدم -->
        <div id="advancedSearchForm" style="display: none;" class="advanced-search-section">
            <h5 class="advanced-search-title">{{ trans('purchase_admin.advanced_search') }}</h5>
            <form>
                <!-- محتوى نموذج البحث المتقدم -->
                <div class="search-row">
                    <div class="search-col">
                        <div class="search-form-group">
                            <label class="field-label">تحتوي على البند</label>
                            <input type="text" class="search-form-control" placeholder="البحث عن بند...">
                        </div>
                    </div>
                    <div class="search-col">
                        <div class="search-form-group">
                            <label class="field-label">العملة</label>
                            <select class="search-form-control">
                                <option value="">أي</option>
                            </select>
                        </div>
                    </div>
                    <div class="search-col">
                        <div class="search-form-group">
                            <div class="total-fields">
                                <div style="flex: 1;">
                                    <label class="field-label">الإجمالي أقل من</label>
                                    <input type="number" class="search-form-control" placeholder="0.00">
                                </div>
                                <div style="flex: 1;">
                                    <label class="field-label">الإجمالي أكبر من</label>
                                    <input type="number" class="search-form-control" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- أزرار البحث المتقدم -->
                <div class="search-buttons">
                    <button type="submit" class="search-btn primary">
                        <i class="fas fa-search"></i>
                        بحث متقدم
                    </button>
                    <button type="button" class="search-btn secondary" id="resetFiltersBtn">
                        <i class="fas fa-undo"></i>
                        إعادة تعيين
                    </button>
                    <button type="button" class="search-btn outline" id="hideAdvancedSearch">
                        <i class="fas fa-search-minus"></i>
                        إخفاء البحث المتقدم
                    </button>
                </div>
            </form>
        </div>

        <!-- عرض الفواتير -->
        <div class="row">
            @foreach($invoices as $invoice)
                <div class="col-md-4 mb-4">
                    <div class="invoice-card">
                        <!-- محتوى بطاقة الفاتورة -->
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination pagination-custom">
                <li class="page-item"><a class="page-link" href="#">{{ trans('purchase_admin.previous') }}</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ trans('purchase_admin.next') }}</a></li>
            </ul>
        </nav>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // عناصر DOM
    const toggleAdvancedSearchBtn = document.getElementById('toggleAdvancedSearch');
    const hideAdvancedSearchBtn = document.getElementById('hideAdvancedSearch');
    const advancedSearchForm = document.getElementById('advancedSearchForm');
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    const cancelSearchBtn = document.getElementById('cancelSearchBtn');

    // تبديل عرض نموذج البحث المتقدم
    toggleAdvancedSearchBtn.addEventListener('click', function() {
        advancedSearchForm.style.display = 'block';
        toggleAdvancedSearchBtn.style.display = 'none';
    });

    // إخفاء نموذج البحث المتقدم
    hideAdvancedSearchBtn.addEventListener('click', function() {
        advancedSearchForm.style.display = 'none';
        toggleAdvancedSearchBtn.style.display = 'inline-flex';
    });

    // إعادة تعيين الفلاتر
    resetFiltersBtn.addEventListener('click', function() {
        const form = advancedSearchForm.querySelector('form');
        if (form) {
            form.reset();
        }
    });

    // إلغاء البحث
    cancelSearchBtn.addEventListener('click', function() {
        const form = advancedSearchForm.querySelector('form');
        if (form) {
            form.reset();
        }
        advancedSearchForm.style.display = 'none';
        toggleAdvancedSearchBtn.style.display = 'inline-flex';
    });
});
</script>

@endsection
@section('js')
@endsection
