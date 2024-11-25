<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-inline-flex gap-2">
        <button type="submit" form="appointmentForm" class="btn btn-success gradient-btn d-flex align-items-center">
            <i class="fas fa-save me-1"></i> {{ __('mohammed.save') }}
        </button>
        <button type="button" class="btn btn-secondary d-flex align-items-center">
            <i class="fas fa-times me-1"></i> {{ __('mohammed.cancel') }}
        </button>
    </div>

    <button class="btn btn-light"><i class="fas fa-times-circle me-1"></i> {{ __('mohammed.delete') }}</button>
</div>

<div class="card p-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="client" class="form-label">{{ __('mohammed.client') }}</label>
                <select id="client" name="client" class="form-select" required>
                    <option value="">{{ __('mohammed.select_client') }}</option>
                    <option value="1">Client 1</option>
                    <option value="2">Client 2</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="date" class="form-label">{{ __('mohammed.date') }}</label>
                <input type="date" id="deliveryStartDate" name="date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="time" class="form-label">{{ __('mohammed.time') }}</label>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="duration" class="form-label">{{ __('mohammed.duration') }}</label>
                <input type="text" id="duration" name="duration" class="form-control" placeholder="00:00" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="actions" class="form-label">{{ __('mohammed.actions') }}</label>
            <select id="actions" name="actions" class="form-select" required>
                <option value="">{{ __('mohammed.select_action') }}</option>
                <option value="action1">Action 1</option>
                <option value="action2">Action 2</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">{{ __('mohammed.notes') }}</label>
            <textarea id="notes" name="notes" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" id="shareWithClient" name="shareWithClient" class="form-check-input">
            <label for="shareWithClient" class="form-check-label">{{ __('mohammed.share_with_client') }}</label>
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" id="recurring" name="recurring" class="form-check-input">
            <label for="recurring" class="form-check-label">{{ __('mohammed.recurring') }}</label>
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" id="assignToEmployees" name="assignToEmployees" class="form-check-input">
            <label for="assignToEmployees" class="form-check-label">{{ __('mohammed.assign_to_employees') }}</label>
        </div>
    </form>
</div>

<div class="fixed-bottom m-3">
    <button class="btn btn-info gradient-btn d-flex align-items-center">
        <i class="fas fa-question-circle me-2"></i> {{ __('mohammed.have_question') }}
    </button>
</div>
