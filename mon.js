// رسم بياني خطي باستخدام Chart.js
const ctx = document.getElementById('salesLineChart').getContext('2d');
const salesLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو'],
        datasets: [{
            label: 'المبيعات',
            data: [15000, 20000, 30000, 25000, 35000],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4 // يجعل الخط منحنيًا قليلاً
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            tooltip: {
                enabled: true
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// التعامل مع القوائم المنسدلة في القائمة الجانبية
const menuItems = document.querySelectorAll('.menu-item'); // تحديد كافة العناصر التي تحتوي على فئة "menu-item"

// إضافة حدث للنقر على كل عنصر لفتح أو إغلاق القائمة الفرعية
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        const nestedMenu = item.querySelector('.nested'); // إيجاد القائمة الفرعية (nested)
        
        // التحقق مما إذا كانت القائمة الفرعية موجودة
        if (nestedMenu) {
            // تبديل فئة "open" لفتح أو إغلاق القائمة
            nestedMenu.classList.toggle('open');
        }
    });
});
