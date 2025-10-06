// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  // Tell Tailwind which files to scan for classes 
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
    "./resources/js/**/*.vue",
  ],
  theme: {
    // This structure MERGES with the default theme, retaining all default colors.
    extend: {
      fontFamily: {
        // Correctly merges with the default font stack
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        // Your custom colors will be ADDED to the default color palette
        'primary-blue': '#1e40af', 
        'light-gray': '#f9fafb',   
      },
    },
  },
  plugins: [],
}