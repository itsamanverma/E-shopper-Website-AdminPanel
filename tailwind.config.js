/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'admin-primary': '#3b82f6',
        'admin-secondary': '#64748b',
        'admin-success': '#10b981',
        'admin-danger': '#ef4444',
        'admin-warning': '#f59e0b',
        'admin-info': '#06b6d4',
        'admin-dark': '#1e293b',
        'admin-light': '#f8fafc'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}