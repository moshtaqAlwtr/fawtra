document.addEventListener('DOMContentLoaded', function() {
    // Load invoice data when page loads
    loadInvoiceData();
    
    // Generate QR code
    generateQRCode();
});

function loadInvoiceData() {
    // Get invoice ID from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const invoiceId = urlParams.get('id');
    
    if (!invoiceId) {
        showError('رقم الفاتورة غير موجود');
        return;
    }
    
    // Update invoice number in header
    document.getElementById('invoice-id').textContent = invoiceId;
    
    // Fetch invoice data from server
    fetch(`api/invoice.php?id=${invoiceId}`)
        .then(response => response.json())
        .then(data => {
            populateInvoiceData(data);
        })
        .catch(error => {
            showError('حدث خطأ أثناء تحميل بيانات الفاتورة');
            console.error('Error:', error);
        });
}

function populateInvoiceData(data) {
    // Populate invoice items
    const tbody = document.getElementById('invoice-items');
    tbody.innerHTML = '';
    
    data.items.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td>${item.unit_price}</td>
            <td>${item.quantity}</td>
            <td>${item.total}</td>
        `;
        tbody.appendChild(row);
    });
    
    // Update totals
    document.getElementById('total-amount').textContent = data.total;
    document.getElementById('paid-amount').textContent = data.paid;
    document.getElementById('due-amount').textContent = data.due;
}

function generateQRCode() {
    // Get invoice details for QR code
    const invoiceDetails = {
        company: 'مؤسسة أعمال خاصة للتجارة',
        vat: '300051635200005',
        date: new Date().toISOString(),
        total: document.getElementById('total-amount').textContent
    };
    
    // Generate QR code
    const qrContainer = document.querySelector('.qr-code');
    new QRCode(qrContainer, {
        text: JSON.stringify(invoiceDetails),
        width: 128,
        height: 128
    });
}

function printInvoice() {
    window.print();
}

function addPayment() {
    // Show payment modal or redirect to payment page
    // Implementation depends on your requirements
}

function exportToPDF() {
    const invoiceId = document.getElementById('invoice-id').textContent;
    window.location.href = `api/export_pdf.php?id=${invoiceId}`;
}

function showError(message) {
    // Add your preferred error notification implementation
    alert(message);
}
