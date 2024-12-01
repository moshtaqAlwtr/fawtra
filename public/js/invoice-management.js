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

    // إضافة console.log للتأكد من تحميل الملف
    console.log('تم تحميل ملف invoice-management.js');
});
