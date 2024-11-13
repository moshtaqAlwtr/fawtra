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
