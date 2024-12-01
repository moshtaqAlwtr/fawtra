@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">عروض الأسعار</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuoteModal">
                    <i class="fas fa-plus"></i> إنشاء عرض سعر جديد
                </button>
            </div>
        </div>

        <!-- Quotes List -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>رقم العرض</th>
                                    <th>العميل</th>
                                    <th>التاريخ</th>
                                    <th>المبلغ الإجمالي</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quotes as $quote)
                                <tr>
                                    <td>{{ $quote->quote_id }}</td>
                                    <td>{{ $quote->client->name }}</td>
                                    <td>{{ $quote->quote_date }}</td>
                                    <td>{{ number_format($quote->total_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $quote->status == 'مقبول' ? 'success' : ($quote->status == 'مرفوض' ? 'danger' : 'warning') }}">
                                            {{ $quote->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('quotes.show', $quote->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('quotes.edit', $quote->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteQuote({{ $quote->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">لا توجد عروض أسعار</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Quote Modal -->
<div class="modal fade" id="createQuoteModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إنشاء عرض سعر جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('quotes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">العميل</label>
                            <select name="client_id" class="form-select" required>
                                <option value="">اختر العميل</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">التاريخ</label>
                            <input type="date" name="quote_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">الموظف المسؤول</label>
                            <select name="created_by" class="form-select" required>
                                <option value="">اختر الموظف</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">الحالة</label>
                            <select name="status" class="form-select" required>
                                <option value="مبدئي">مبدئي</option>
                                <option value="مقبول">مقبول</option>
                                <option value="مرفوض">مرفوض</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">ملاحظات</label>
                            <textarea name="notes" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function deleteQuote(id) {
    if (confirm('هل أنت متأكد من حذف عرض السعر هذا؟')) {
        fetch(`/quotes/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
    }
}
</script>
@endpush
@endsection
