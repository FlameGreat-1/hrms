const ThemeToggle = {
    init() {
        const theme = localStorage.getItem('theme') || 'light';
        this.setTheme(theme);
        
        document.getElementById('theme-toggle')?.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            this.setTheme(newTheme);
        });
    },

    setTheme(theme) {
        document.documentElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
    }
};

document.addEventListener('DOMContentLoaded', () => ThemeToggle.init());