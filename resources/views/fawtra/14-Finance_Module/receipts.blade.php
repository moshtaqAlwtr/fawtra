

@section('content')
<div class="container-fluid">
    <!-- رأس الصفحة -->
    <div class="bg-gradient-primary text-white rounded-3 shadow-sm p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-2">سندات القبض</h1>
                <p class="mb-0 opacity-75">إدارة وعرض جميع سندات القبض</p>
            </div>
            <a href="{{ route('add_receipt') }}" class="btn btn-light">
                <i class="fas fa-plus-circle ms-1"></i>
                إضافة سند قبض جديد
            </a>
        </div>
    </div>

    <!-- الإشعارات -->
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle ms-2"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger d-flex align-items-center border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-exclamation-circle ms-2"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- جدول السندات -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-transparent py-3 border-bottom">
            <h5 class="card-title text-primary mb-0">قائمة سندات القبض</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="receiptsTable">
                    <thead class="table-light">
                        <tr>
                            <th>رقم السند</th>
                            <th>التاريخ</th>
                            <th>المبلغ</th>
                            <th>الوصف</th>
                            <th style="width: 150px">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($receipts as $receipt)
                            <tr>
                                <td>
                                    <span class="badge bg-light text-primary px-3 py-2 rounded-pill">
                                        {{ $receipt->code }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($receipt->date)->format('Y/m/d') }}</td>
                                <td class="fw-bold text-success">{{ number_format($receipt->amount, 2) }} ر.س</td>
                                <td>{{ Str::limit($receipt->description, 50) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('receipts.show', $receipt->id) }}" 
                                           class="btn btn-sm btn-outline-info" 
                                           title="عرض">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('receipts.edit', $receipt->id) }}" 
                                           class="btn btn-sm btn-outline-primary mx-1" 
                                           title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('receipts.destroy', $receipt->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('هل أنت متأكد من حذف هذا السند؟')" 
                                                    title="حذف">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-folder-open fa-3x mb-3 d-block opacity-50"></i>
                                    <p class="mb-0">لا توجد سندات قبض حالياً</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, var(--primary-color), var(--info-color));
    }
    
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }
    
    .btn-group .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        padding: 0;
    }
    
    .badge {
        font-weight: 500;
        font-size: 0.875rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#receiptsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json"
            },
            "order": [[0, "desc"]],
            "pageLength": 10,
            "responsive": true,
            "columnDefs": [
                { "orderable": false, "targets": 4 }
            ]
        });
    });
</script>
@endpush
