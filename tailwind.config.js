/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    container: {
      center: true,
      padding: '16px'
    },
    fontFamily: {
      orbitron: ['Orbitron'],
      roboto: ['Roboto']
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
