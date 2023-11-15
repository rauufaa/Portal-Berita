/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "app/views/**/*.php",
    "./node_modules/flowbite/**/*.js",
    "./public/js/*.js"
  ],
  theme: {
    extend: {
      '-100%': "-100%"
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('flowbite/plugin')
  ],
}

