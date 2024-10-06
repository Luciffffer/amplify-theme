/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        'primary': {
          DEFAULT: '8640DC',
          50: '#E8DBF8',
          100: '#DDCAF5',
          200: '#C7A7EF',
          300: '#B285E8',
          400: '#9C63E2',
          500: '#8640DC',
          600: '#7126CD',
          700: '#571D9E',
          800: '#3D146E',
          900: '#230C3F',
          950: '#160727',
        },
        'black': '#19191D',
        'white': '#FBFCFD',
      }
    },
  },
  plugins: [],
}

