$(document).ready(function() {
    // Toggle advanced search form
    $('#toggleAdvancedSearch').click(function() {
        $('#advancedSearchForm').slideToggle();
    });

    // Handle basic search
    $('#basicSearchBtn').click(function() {
        performSearch();
    });

    // Handle advanced search form submission
    $('#advancedSearchFormElement').submit(function(e) {
        e.preventDefault();
        performSearch(true);
    });

    // Handle search form reset
    $('#advancedSearchFormElement button[type="reset"]').click(function() {
        setTimeout(function() {
            performSearch(true);
        }, 100);
    });

    function performSearch(isAdvanced = false) {
        let searchData = {};
        
        if (isAdvanced) {
            // Get advanced search form data
            searchData = {
                invoice_number: $('#invoice_number').val(),
                client_name: $('#client_name').val(),
                date_from: $('#date_from').val(),
                date_to: $('#date_to').val(),
                payment_status: $('#payment_status').val(),
                grand_total: $('#grand_total').val()
            };
        } else {
            // Get basic search data
            searchData = {
                basic_search: $('#basicSearchInput').val()
            };
        }

        // Show loading spinner
        $('#searchSpinner').show();

        // Make AJAX request to search endpoint
        $.ajax({
            url: '/api/invoices/search',
            method: 'POST',
            data: searchData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Update the invoice cards with search results
                updateInvoiceCards(response.invoices);
            },
            error: function(xhr, status, error) {
                // Show error message
                showNotification('error', 'حدث خطأ أثناء البحث. يرجى المحاولة مرة أخرى.');
            },
            complete: function() {
                // Hide loading spinner
                $('#searchSpinner').hide();
            }
        });
    }

    function updateInvoiceCards(invoices) {
        const container = $('.row'); // Container for invoice cards
        container.empty();

        if (invoices.length === 0) {
            container.append('<div class="col-12 text-center"><p>لا توجد نتائج</p></div>');
            return;
        }

        invoices.forEach(function(invoice) {
            const card = createInvoiceCard(invoice);
            container.append(card);
        });
    }

    function createInvoiceCard(invoice) {
        return `
            <div class="col-md-4 mb-4">
                <div class="invoice-card">
                    <div class="invoice-card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="invoice-number">
                                <div class="number-badge">
                                    ${invoice.invoice_number}
                                </div>
                            </div>
                            <div class="invoice-status ${invoice.payment_status}">
                                ${getPaymentStatusText(invoice.payment_status)}
                            </div>
                        </div>
                    </div>
                    <div class="invoice-card-body">
                        <div class="invoice-info">
                            <div class="info-row">
                                <span class="label">العميل:</span>
                                <span class="value">${invoice.client_name}</span>
                            </div>
                            <div class="info-row">
                                <span class="label">التاريخ:</span>
                                <span class="value">${formatDate(invoice.invoice_date)}</span>
                            </div>
                            <div class="info-row">
                                <span class="label">المبلغ:</span>
                                <span class="value">${formatCurrency(invoice.grand_total)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-card-footer">
                        <div class="action-buttons">
                            <button class="action-btn view-btn" onclick="window.location.href='/invoice/preview/${invoice.invoice_id}'">
                                <i class="fas fa-eye"></i>
                                <span class="tooltip">عرض</span>
                            </button>
                            <button class="action-btn edit-btn" onclick="window.location.href='/invoice/edit/${invoice.invoice_id}'">
                                <i class="fas fa-edit"></i>
                                <span class="tooltip">تعديل</span>
                            </button>
                            <button class="action-btn delete-btn" onclick="deleteInvoice(${invoice.invoice_id})">
                                <i class="fas fa-trash"></i>
                                <span class="tooltip">حذف</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    function getPaymentStatusText(status) {
        const statusMap = {
            'paid': 'مدفوع',
            'unpaid': 'غير مدفوع',
            'partial': 'مدفوع جزئياً'
        };
        return statusMap[status] || status;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('ar-SA');
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('ar-SA', {
            style: 'currency',
            currency: 'SAR'
        }).format(amount);
    }

    function showNotification(type, message) {
        const notificationDiv = $(`.notification-popup.${type}`);
        const messageDiv = notificationDiv.find('.notification-text');
        
        messageDiv.text(message);
        notificationDiv.fadeIn();
        
        setTimeout(function() {
            notificationDiv.fadeOut();
        }, 3000);
    }
});
