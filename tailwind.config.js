const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'],
  darkMode: 'class',
  theme: {
    colors :{
        'primary': {
          '50': '#f0f9ff',
          '100': '#e0f2fe',
          '200': '#bae2fd',
          '300': '#7dc9fc',
          '400': '#38abf8',
          '500': '#0e91e9',
          '600': '#0278c7',
          '700': '#0362a1',
          '800': '#075385',
          '900': '#0c476e',
          '950': '#082f49',
      },
    }
   },
  plugins: [require('flowbite/plugin')],
}
