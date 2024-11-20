// عند الضغط على زر فتح القائمة، تظهر القائمة الجانبية مع طبقة تراكب
document.querySelector('.sidebar-toggle').addEventListener('click', function () {
    document.getElementById('leftside-menu-container').classList.toggle('show');
    document.querySelector('.sidebar-overlay').classList.toggle('show');
});

// عند الضغط على التراكب، تختفي القائمة
document.querySelector('.sidebar-overlay').addEventListener('click', function () {
    document.getElementById('leftside-menu-container').classList.remove('show');
    document.querySelector('.sidebar-overlay').classList.remove('show');
});
function initMap() {
    const mapOptions = {
        center: { lat: 24.7136, lng: 46.6753 }, // الموقع الافتراضي (مثل الرياض)
        zoom: 10
    };
    const map = new google.maps.Map(document.querySelector(".map-container"), mapOptions);
}


function addForm() {
    // نسخ النموذج الأساسي
    var originalForm = document.getElementById("contactForm");
    var newForm = originalForm.cloneNode(true);

    // إزالة id من النموذج الجديد لمنع تكرار المعرفات
    newForm.id = '';

    // عرض النموذج الجديد
    newForm.style.display = "block";

    // إضافة النموذج الجديد إلى الوعاء
    document.getElementById("formContainer").appendChild(newForm);
}


function toggleForm() {
    const advancedFields = document.getElementById("advancedFields");
    const toggleButton = document.getElementById("toggleButton");

    advancedFields.classList.toggle("hidden");

    if (advancedFields.classList.contains("hidden")) {
        toggleButton.textContent = "متقدم";
    } else {
        toggleButton.textContent = "بحث بسيط";
    }
}
function toggleVisibility() {
    const fieldSection = document.getElementById("fieldSection");
    const toggleVisibilityButton = document.getElementById("toggleVisibilityButton");

    fieldSection.classList.toggle("hidden");

    if (fieldSection.classList.contains("hidden")) {
        toggleVisibilityButton.innerHTML = '<i class="fas fa-eye"></i> عرض';
    } else {
        toggleVisibilityButton.innerHTML = '<i class="fas fa-eye-slash"></i> إخفاء';
    }
}

function addItem() {
    const tableBody = document.getElementById('invoice-body');
    const rowCount = tableBody.rows.length;
    const row = tableBody.insertRow(rowCount);

    row.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" class="form-control" placeholder="الوصف"></td>
        <td><input type="number" class="form-control" placeholder="سعر الوحدة" value="0" oninput="calculateTotal(this)"></td>
        <td><input type="number" class="form-control" placeholder="الكمية" value="1" oninput="calculateTotal(this)"></td>
        <td><input type="number" class="form-control" placeholder="الخصم" value="0" oninput="calculateTotal(this)"></td>
        <td><input type="number" class="form-control" placeholder="الضريبة 1" value="0" oninput="calculateTotal(this)"></td>
        <td><input type="number" class="form-control" placeholder="الضريبة 2" value="0" oninput="calculateTotal(this)"></td>
        <td><span class="total">0.00</span></td>
    `;
}

// دالة لحساب المجموع
function calculateTotal(input) {
    const row = input.closest('tr');
    const unitPrice = parseFloat(row.cells[2].querySelector('input').value) || 0;
    const quantity = parseFloat(row.cells[3].querySelector('input').value) || 0;
    const discount = parseFloat(row.cells[4].querySelector('input').value) || 0;
    const tax1 = parseFloat(row.cells[5].querySelector('input').value) || 0;
    const tax2 = parseFloat(row.cells[6].querySelector('input').value) || 0;

    const total = (unitPrice * quantity) - discount;
    const totalWithTax = total + (total * tax1 / 100) + (total * tax2 / 100);

    row.cells[7].querySelector('.total').textContent = totalWithTax.toFixed(2);
    updateGrandTotal();
}

// دالة لحساب الإجمالي الكلي
function updateGrandTotal() {
    let grandTotal = 0;
    document.querySelectorAll('.total').forEach(total => {
        grandTotal += parseFloat(total.textContent) || 0;
    });
    document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
}

function addAdditionalFields() {
    const container = document.getElementById('additional-fields-container');

    // إنشاء الحقول الجديدة
    const newFields = document.createElement('div');
    newFields.classList.add('d-flex', 'align-items-center', 'mt-3');

    newFields.innerHTML = `
        <button class="btn btn-danger me-2" onclick="removeField(this)"><i class="bi bi-x"></i></button>
        <input type="text" class="form-control me-2" placeholder="بيانات إضافية">
        <input type="text" class="form-control" placeholder="عنوان إضافي">
    `;

    // إضافة الحقول الجديدة إلى الحاوية
    container.appendChild(newFields);
}

// دالة لحذف الحقول عند الضغط على زر الحذف
function removeField(button) {
    button.parentElement.remove();
}

$(document).ready(function () {
    $('#advanced-search-toggle').click(function() {
        $('.advanced-search').slideToggle(300);
    });

    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "ar",
        todayHighlight: true,
        autoclose: true
    });
});


document.getElementById('exportBtn').addEventListener('click', function () {
// Create a temporary link element
const link = document.createElement('a');
link.href = 'path/to/your/file.pdf'; // Replace with the path to your file
link.download = 'filtered_results.pdf'; // Specify the download file name
link.click();
});
    // دالة لإضافة بند جديد
    function addItem() {
        const tableBody = document.getElementById('invoice-body');
        const rowCount = tableBody.rows.length;
        const row = tableBody.insertRow(rowCount);

        row.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" class="form-control" placeholder="الوصف"></td>
            <td><input type="number" class="form-control" placeholder="سعر الوحدة" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الكمية" value="1" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الخصم" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الضريبة 1" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الضريبة 2" value="0" oninput="calculateTotal(this)"></td>
            <td><span class="total">0.00</span></td>
        `;
    }

    // دالة لحساب المجموع
    function calculateTotal(input) {
        const row = input.closest('tr');
        const unitPrice = parseFloat(row.cells[2].querySelector('input').value) || 0;
        const quantity = parseFloat(row.cells[3].querySelector('input').value) || 0;
        const discount = parseFloat(row.cells[4].querySelector('input').value) || 0;
        const tax1 = parseFloat(row.cells[5].querySelector('input').value) || 0;
        const tax2 = parseFloat(row.cells[6].querySelector('input').value) || 0;

        const total = (unitPrice * quantity) - discount;
        const totalWithTax = total + (total * tax1 / 100) + (total * tax2 / 100);

        row.cells[7].querySelector('.total').textContent = totalWithTax.toFixed(2);
        updateGrandTotal();
    }


    function updateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('.total').forEach(total => {
            grandTotal += parseFloat(total.textContent) || 0;
        });
        document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
    }


    function addAdditionalFields() {
        const container = document.getElementById('additional-fields-container');

        // إنشاء الحقول الجديدة
        const newFields = document.createElement('div');
        newFields.classList.add('d-flex', 'align-items-center', 'mt-3');

        newFields.innerHTML = `
            <button class="btn btn-danger me-2" onclick="removeField(this)"><i class="bi bi-x"></i></button>
            <input type="text" class="form-control me-2" placeholder="بيانات إضافية">
            <input type="text" class="form-control" placeholder="عنوان إضافي">
        `;

        // إضافة الحقول الجديدة إلى الحاوية
        container.appendChild(newFields);
    }

    // دالة لحذف الحقول عند الضغط على زر الحذف
    function removeField(button) {
        button.parentElement.remove();
    }

    CKEDITOR.replace('notes', {
        language: 'ar',  // تعيين اللغة إلى العربية
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'styles', items: ['Font', 'FontSize', 'TextColor', 'BGColor'] },
            { name: 'insert', items: ['HorizontalRule'] }
        ],
        height: 200  // ارتفاع الصندوق
    });
    function updateTotal(input) {
        const row = input.closest('tr'); // الحصول على الصف الحالي
        const unitPrice = parseFloat(row.querySelector('input[name*="[unit_price]"]').value) || 0;
        const quantity = parseFloat(row.querySelector('input[name*="[quantity]"]').value) || 0;
        const discount = parseFloat(row.querySelector('input[name*="[discount]"]').value) || 0;
        const tax1 = parseFloat(row.querySelector('input[name*="[tax1]"]').value) || 0;
        const tax2 = parseFloat(row.querySelector('input[name*="[tax2]"]').value) || 0;

        // حساب الإجمالي
        const subtotal = unitPrice * quantity;
        const totalDiscount = subtotal * (discount / 100);
        const totalTax = subtotal * (tax1 / 100) + subtotal * (tax2 / 100);
        const total = subtotal - totalDiscount + totalTax;

        // تحديث حقل الإجمالي
        row.querySelector('input[name*="[total]"]').value = total.toFixed(2);

        // تحديث المجموع الكلي
        updateGrandTotal();
    }

    function updateGrandTotal() {
        const rows = document.querySelectorAll('#invoice-body tr');
        let grandTotal = 0;

        rows.forEach(row => {
            const total = parseFloat(row.querySelector('input[name*="[total]"]').value) || 0;
            grandTotal += total;
        });

        document.getElementById('grand-total').value = grandTotal.toFixed(2);
    }

    function addRow() {
        const tableBody = document.getElementById('invoice-body');
        const rowCount = tableBody.rows.length;
        const newRow = tableBody.insertRow();

        newRow.innerHTML = `
            <td><input type="text" name="items[${rowCount}][item]" class="form-control" placeholder="البند"></td>
            <td><input type="text" name="items[${rowCount}][description]" class="form-control" placeholder="الوصف"></td>
            <td><input type="number" name="items[${rowCount}][unit_price]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
            <td><input type="number" name="items[${rowCount}][quantity]" class="form-control" placeholder="1" min="1" value="1" oninput="updateTotal(this)"></td>
            <td><input type="number" name="items[${rowCount}][discount]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
            <td><input type="number" name="items[${rowCount}][tax1]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
            <td><input type="number" name="items[${rowCount}][tax2]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
            <td><input type="number" name="items[${rowCount}][total]" class="form-control" placeholder="0.00" readonly></td>
            <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">حذف</button></td>
        `;
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
        updateGrandTotal();
    }
    function addRow() {
        const tableBody = document.getElementById('entryTable');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select class="form-select">
                    <option>اختر حساب</option>
                    <option>الحساب 1</option>
                    <option>الحساب 2</option>
                </select>
            </td>
            <td><input type="text" class="form-control" placeholder="الوصف"></td>
            <td><select class="form-select"><option>لا شيء</option><option>مركز 1</option></select></td>
            <td><input type="number" class="form-control" value="0"></td>
            <td><input type="number" class="form-control" value="0"></td>
            <td>
                <button class="btn btn-outline-danger btn-sm" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></button>
            </td>
        `;
        tableBody.insertBefore(newRow, tableBody.lastElementChild);
    }

    // دالة لإزالة صف
    function removeRow(button) {
        button.closest('tr').remove();
    }
    flatpickr("#date", {
        locale: "ar", // اللغة العربية
        dateFormat: "Y-m-d",
        wrap: false,
        onReady: (selectedDates, dateStr, instance) => {
            const footerButtons = document.createElement("div");
            footerButtons.className = "d-flex justify-content-center mt-2";
            footerButtons.innerHTML = `
                <button type="button" class="flatpickr-today" onclick="instance.setDate(new Date()); instance.close()">اليوم</button>
                <button type="button" class="flatpickr-clear" onclick="instance.clear(); instance.close()">مسح</button>
            `;
            instance.calendarContainer.appendChild(footerButtons);
        }
    });
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
        document.getElementById(sectionId).style.display = 'block';
    }

    function setAccountType(type) {
        document.getElementById('accountType').value = type;
    }
