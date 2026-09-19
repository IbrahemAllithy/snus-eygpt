/**
 * Theme Switcher - Dark/Light Mode
 */

export class ThemeSwitcher {
  constructor() {
    this.theme = localStorage.getItem('theme') || 'light';
    this.init();
  }

  init() {
    this.applyTheme(this.theme);
    this.setupToggle();
  }

  applyTheme(theme) {
    document.body.classList.remove('dark', 'light');
    document.body.classList.add(theme);
    localStorage.setItem('theme', theme);
    this.updateIcon(theme);
  }

  setupToggle() {
    const toggle = document.getElementById('theme-toggle');
    if (toggle) {
      toggle.addEventListener('click', () => {
        this.theme = this.theme === 'light' ? 'dark' : 'light';
        this.applyTheme(this.theme);
      });
    }
  }

  updateIcon(theme) {
    const icon = document.querySelector('#theme-toggle i');
    if (icon) {
      icon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
    }
  }
}

/**
 * Color Theme Switcher (Red, Blue, Green, etc.)
 */
export class ColorThemeSwitcher {
  constructor() {
    this.theme = localStorage.getItem('colorTheme') || 'default';
    this.init();
  }

  init() {
    this.applyTheme(this.theme);
  }

  applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('colorTheme', theme);
  }

  setTheme(theme) {
    this.applyTheme(theme);
  }
}

// Export
export default { ThemeSwitcher, ColorThemeSwitcher };
