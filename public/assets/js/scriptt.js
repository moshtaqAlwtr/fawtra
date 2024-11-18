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
