document.addEventListener('DOMContentLoaded', function() {
    // عناصر DOM
    const toggleAdvancedSearchBtn = document.getElementById('toggleAdvancedSearch');
    const advancedSearchForm = document.getElementById('advancedSearchForm');
    const advancedSearchFormElement = document.getElementById('advancedSearchFormElement');
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    const cancelSearchBtn = document.getElementById('cancelSearchBtn');
    const basicSearchBtn = document.getElementById('basicSearchBtn');
    const searchBtn = document.getElementById('searchBtn');

    // التأكد من وجود العناصر
    if (!advancedSearchForm || !toggleAdvancedSearchBtn) {
        console.error('لم يتم العثور على عناصر البحث المتقدم');
        return;
    }

    // تبديل عرض نموذج البحث المتقدم
    toggleAdvancedSearchBtn.addEventListener('click', function() {
        console.log('تم النقر على زر البحث المتقدم');
        const isVisible = advancedSearchForm.style.display === 'block';
        advancedSearchForm.style.display = isVisible ? 'none' : 'block';
        
        // تحديث نص وأيقونة الزر
        toggleAdvancedSearchBtn.innerHTML = isVisible ? 
            '<i class="fas fa-search-plus"></i> بحث متقدم' :
            '<i class="fas fa-search-minus"></i> إخفاء البحث المتقدم';
    });

    // إعادة تعيين الفلاتر
    if (resetFiltersBtn && advancedSearchFormElement) {
        resetFiltersBtn.addEventListener('click', function() {
            console.log('تم النقر على زر إعادة التعيين');
            advancedSearchFormElement.reset();
        });
    }

    // إلغاء البحث
    if (cancelSearchBtn && advancedSearchFormElement) {
        cancelSearchBtn.addEventListener('click', function() {
            console.log('تم النقر على زر الإلغاء');
            if (advancedSearchFormElement) {
                advancedSearchFormElement.reset();
            }
            advancedSearchForm.style.display = 'none';
            toggleAdvancedSearchBtn.innerHTML = '<i class="fas fa-search-plus"></i> بحث متقدم';
        });
    }

    // البحث الأساسي
    if (basicSearchBtn) {
        basicSearchBtn.addEventListener('click', function() {
            console.log('تنفيذ البحث الأساسي');
            // أضف هنا منطق البحث الأساسي
        });
    }

    // البحث المتقدم
    if (searchBtn && advancedSearchFormElement) {
        advancedSearchFormElement.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('تنفيذ البحث المتقدم');
            // أضف هنا منطق البحث المتقدم
        });
    }

    // وظائف إدارة الفواتير
    function showAdvanced() {
        var x = document.getElementById("advanced-search");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    // تحديث حقول التاريخ عند اختيار فترة زمنية
    const dateCustomization = document.querySelector('select[name="date_customization"]');
    if (dateCustomization) {
        dateCustomization.addEventListener('change', function() {
            const value = this.value;
            const today = new Date();
            let startDate = new Date();
            let endDate = new Date();

            switch(value) {
                case 'today':
                    // لا تغيير في التواريخ
                    break;
                case 'yesterday':
                    startDate.setDate(today.getDate() - 1);
                    endDate.setDate(today.getDate() - 1);
                    break;
                case 'last_week':
                    startDate.setDate(today.getDate() - 7);
                    break;
                case 'last_month':
                    startDate.setMonth(today.getMonth() - 1);
                    break;
                case 'last_3months':
                    startDate.setMonth(today.getMonth() - 3);
                    break;
                case 'last_6months':
                    startDate.setMonth(today.getMonth() - 6);
                    break;
                case 'last_year':
                    startDate.setFullYear(today.getFullYear() - 1);
                    break;
                case 'custom':
                    // إعادة تعيين الحقول
                    document.querySelector('input[name="due_date_start"]').value = '';
                    document.querySelector('input[name="due_date_end"]').value = '';
                    document.querySelector('input[name="created_date_start"]').value = '';
                    document.querySelector('input[name="created_date_end"]').value = '';
                    return;
            }

            // تنسيق التواريخ
            const formatDate = (date) => {
                return date.toISOString().split('T')[0];
            };

            // تحديث حقول التاريخ
            document.querySelector('input[name="due_date_start"]').value = formatDate(startDate);
            document.querySelector('input[name="due_date_end"]').value = formatDate(endDate);
            document.querySelector('input[name="created_date_start"]').value = formatDate(startDate);
            document.querySelector('input[name="created_date_end"]').value = formatDate(endDate);
        });
    }

    // إضافة مؤشر التحميل عند البحث
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function() {
            document.getElementById('searchSpinner').style.display = 'flex';
        });
    }

    // إضافة console.log للتأكد من تحميل الملف
    console.log('تم تحميل ملف invoice-management.js');
});
