/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'blood-red': '#5C190F',
        'delft-blue': '#1C2E55',
        'midnight-green': '#004746',
        'cornell-red': '#B01A14',
      },
    },
  },
  plugins: [],
}

