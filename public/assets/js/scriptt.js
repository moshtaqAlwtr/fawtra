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
