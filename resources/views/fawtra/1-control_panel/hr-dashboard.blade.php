<div class="container" dir="rtl">

    <div class="box">
        <div class="filter-box">
            <h2>{{ __('hr.contract_summary') }}</h2>
            <select>
                <option>{{ __('hr.last_30_days') }}</option>
            </select>
            <select>
                <option>{{ __('hr.date_range_example') }}</option>
            </select>
        </div>
        <div class="contract-summary">
            <div class="contract-summary-box">
                <p>{{ __('hr.total_contracts') }}</p>
                <p>0</p>
                <button class="btn-add">{{ __('hr.add_new_contract') }}</button>
            </div>
        </div>
    </div>

    <!-- العقود التي ستنتهي صلاحيتها -->
    <div class="box">
        <h2>{{ __('hr.contracts_expiring_soon') }}</h2>
        <div class="contract-summary">
            <div class="contract-summary-box">
                <p>{{ __('hr.no_expiring_contracts') }}</p>
                <button class="btn-add">{{ __('hr.add_contract') }}</button>
            </div>
        </div>
    </div>

    <!-- ملخص الرواتب -->
    <div class="box">
        <div class="filter-box">
            <h2>{{ __('hr.salary_summary') }}</h2>
            <select>
                <option>{{ __('hr.currency_sar') }}</option>
            </select>
            <select>
                <option>{{ __('hr.last_30_days') }}</option>
            </select>
            <select>
                <option>{{ __('hr.date_range_example') }}</option>
            </select>
        </div>
        <div class="salary-summary">
            <div class="salary-summary-box">
                <p>{{ __('hr.total_paid_salary') }}</p>
                <p>0</p>
            </div>
            <div class="salary-summary-box">
                <p>{{ __('hr.total_net_salary') }}</p>
                <p>0</p>
            </div>
            <div class="salary-summary-box">
                <p>{{ __('hr.total_deductions') }}</p>
                <p>0</p>
            </div>
            <div class="salary-summary-box">
                <p>{{ __('hr.salary_sections') }}</p>
                <p>0</p>
                <a href="#" class="link">{{ __('hr.create_new_salary_source') }}</a>
            </div>
        </div>
    </div>

    <!-- ملخص الحضور -->
    <div class="box">
        <div class="filter-box">
            <h2>{{ __('hr.attendance_summary') }}</h2>
            <select>
                <option>{{ __('hr.last_30_days') }}</option>
            </select>
            <select>
                <option>{{ __('hr.date_range_example') }}</option>
            </select>
        </div>
        <div class="attendance-summary">
            <div class="circle circle-1">
                0
                <span>{{ __('hr.present') }}</span>
            </div>
            <div class="circle circle-2">
                0
                <span>{{ __('hr.absent') }}</span>
            </div>
            <div class="circle circle-3">
                0
                <span>{{ __('hr.leave') }}</span>
            </div>
            <div class="circle circle-4">
                0
                <span>{{ __('hr.holiday') }}</span>
            </div>
        </div>
        <p>{{ __('hr.working_hours_summary') }}</p>
    </div>

    <!-- ملخص قواعد الحضور -->
    <div class="box">
        <div class="filter-box">
            <h2>{{ __('hr.attendance_rules_summary') }}</h2>
            <select>
                <option>{{ __('hr.last_30_days') }}</option>
            </select>
            <select>
                <option>{{ __('hr.date_range_example') }}</option>
            </select>
        </div>
        <div class="rules-summary">
            <div>
                <p>{{ __('hr.total_delays') }}</p>
                <p>0 {{ __('hr.minutes') }}</p>
                <p>0 {{ __('hr.days') }}</p>
            </div>
            <div>
                <p>{{ __('hr.total_early_leaves') }}</p>
                <p>0 {{ __('hr.minutes') }}</p>
                <p>0 {{ __('hr.days') }}</p>
            </div>
        </div>
    </div>

    <!-- الطلبات المعلقة -->
    <div class="box">
        <h2>{{ __('hr.pending_requests') }}</h2>
        <div class="pending-requests">
            <p>{{ __('hr.no_pending_requests') }}</p>
        </div>
    </div>
</div>
