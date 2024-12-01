
    function initializeFlatpickr(selector) {
        flatpickr(selector, {
            locale: "ar",
            dateFormat: "d/m/Y",
            onOpen: function(selectedDates, dateStr, instance) {
                const calendarContainer = instance.calendarContainer;
                
                if (!calendarContainer.querySelector(".flatpickr-footer")) {
                    const footer = document.createElement("div");
                    footer.classList.add("flatpickr-footer");

                    const btnToday = document.createElement("button");
                    btnToday.classList.add("btn-today");
                    btnToday.textContent = "اليوم";
                    btnToday.onclick = function() {
                        instance.setDate(new Date());
                    };

                    const btnClear = document.createElement("button");
                    btnClear.classList.add("btn-clear");
                    btnClear.textContent = "مسح";
                    btnClear.onclick = function() {
                        instance.clear();
                        instance.close();
                    };

                    footer.appendChild(btnClear);
                    footer.appendChild(btnToday);
                    calendarContainer.appendChild(footer);
                }
            }
        });
    }

    // Initialize flatpickr on the test field
    initializeFlatpickr("#testDate");
    // Initialize flatpickr on additional date fields if needed
    initializeFlatpickr("#deliveryStartDate");
    initializeFlatpickr("#deliveryEndDate");