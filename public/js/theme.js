// Theme Management
document.addEventListener('DOMContentLoaded', function() {
    // Theme Constants
    const THEME_KEY = 'fawtra_theme';
    const DARK_THEME = 'dark';
    const LIGHT_THEME = 'light';

    // DOM Elements
    const themeToggle = document.getElementById('themeToggle');
    const lightIcon = themeToggle?.querySelector('.theme-icon-light');
    const darkIcon = themeToggle?.querySelector('.theme-icon-dark');
    const lightLogo = document.querySelector('.logo-light');
    const darkLogo = document.querySelector('.logo-dark');

    // Get saved theme or default to light
    let currentTheme = localStorage.getItem(THEME_KEY) || LIGHT_THEME;

    // Apply theme on page load
    applyTheme(currentTheme);

    // Theme toggle click handler
    themeToggle?.addEventListener('click', () => {
        currentTheme = currentTheme === LIGHT_THEME ? DARK_THEME : LIGHT_THEME;
        applyTheme(currentTheme);
        localStorage.setItem(THEME_KEY, currentTheme);
    });

    // Apply theme to document
    function applyTheme(theme) {
        if (theme === DARK_THEME) {
            document.documentElement.classList.add('dark-theme');
            lightIcon?.classList.add('d-none');
            darkIcon?.classList.remove('d-none');
            lightLogo?.classList.add('d-none');
            darkLogo?.classList.remove('d-none');
        } else {
            document.documentElement.classList.remove('dark-theme');
            lightIcon?.classList.remove('d-none');
            darkIcon?.classList.add('d-none');
            lightLogo?.classList.remove('d-none');
            darkLogo?.classList.add('d-none');
        }
    }

    // Sidebar Toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mainSidebar = document.getElementById('mainSidebar');
    const body = document.body;

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', (e) => {
            e.preventDefault();
            body.classList.toggle('sidebar-open');
        });
    }

    // Close sidebar when clicking outside
    document.addEventListener('click', (e) => {
        if (body.classList.contains('sidebar-open') && 
            !mainSidebar?.contains(e.target) && 
            !sidebarToggle?.contains(e.target)) {
            body.classList.remove('sidebar-open');
        }
    });

    // Submenu Toggle
    const submenuToggles = document.querySelectorAll('.nav-link.has-arrow');
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            const submenu = toggle.nextElementSibling;
            
            // Close other open submenus
            const openSubmenus = document.querySelectorAll('.nav-submenu.show');
            openSubmenus.forEach(menu => {
                if (menu !== submenu) {
                    menu.classList.remove('show');
                    menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                }
            });

            // Toggle current submenu
            toggle.setAttribute('aria-expanded', submenu.classList.contains('show') ? 'false' : 'true');
            submenu.classList.toggle('show');
        });
    });

    // Active Link Highlight
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link, .submenu-item a');

    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentPath.includes(href)) {
            link.classList.add('active');
            
            // If it's a submenu item, expand its parent
            const submenuItem = link.closest('.submenu-item');
            if (submenuItem) {
                const parentSubmenu = submenuItem.closest('.nav-submenu');
                const parentLink = parentSubmenu.previousElementSibling;
                parentSubmenu.classList.add('show');
                parentLink.setAttribute('aria-expanded', 'true');
            }
        }
    });

    // Dropdown Menus
    const dropdownToggles = document.querySelectorAll('.nav-link.has-arrow');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            const submenu = toggle.nextElementSibling;
            if (submenu) {
                submenu.classList.toggle('show');
                toggle.classList.toggle('active');
            }
        });
    });

    // Search Functionality
    const searchInput = document.getElementById('searchInput');
    
    searchInput?.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        // Add your search logic here
        console.log('Searching for:', searchTerm);
    });

    // Notifications Badge Update
    function updateNotificationBadge(count) {
        const badge = document.querySelector('#notificationsDropdown .badge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    // Handle RTL/LTR Layout
    const isRTL = document.documentElement.dir === 'rtl';
    if (isRTL) {
        document.body.classList.add('rtl');
    }
});
