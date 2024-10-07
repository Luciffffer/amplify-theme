/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    fontFamily: {
      'sans': ['"Inter"', 'system-ui', 'BlinkMacSystemFont', '-apple-system', 'sans-serif'],
      'heading': ['"Rubik"', '"Inter"', 'system-ui', 'BlinkMacSystemFont', '-apple-system', 'sans-serif'],
    },
    // Type scale : 1.333 for headings. 1.166 for body text.
    fontSize: {
      'body-xs': ['0.75rem', {        // 12px
        lineHeight: '150%',
        letterSpacing: '0em',
      }],
      'body-sm': ['0.875rem', {       // 14px
        lineHeight: '150%',
        letterSpacing: '-0.01em',
      }],
      'body-base': ['1rem', {         // 16px
        lineHeight: '150%',
        letterSpacing: '-0.01em',
      }],          
      'body-lg': ['1.169rem', {          // 18.7px
        lineHeight: '150%',
        letterSpacing: '-0.01em',
      }],
      'body-xl': ['1.363rem', {       // 21.8px
        lineHeight: '160%',
        letterSpacing: '-0.01em',
      }],
      
      'heading-xxs': ['1rem', {       // 16px
        lineHeight: '140%',
        letterSpacing: '0em',
        fontWeight: '700',
      }],
      'heading-xs': ['1.333rem', {    // 21.3px
        lineHeight: '140%',
        letterSpacing: '0em',
        fontWeight: '700',
      }],
      'heading-sm': ['1.777rem', {    // 28.4px
        lineHeight: '140%',
        letterSpacing: '0em',
        fontWeight: '700',
      }],
      'heading-base': ['2.369rem', {  // 37.9px
        lineHeight: '130%',
        letterSpacing: '0em',
        fontWeight: '700',
      }],
      'heading-lg': ['3.157rem', {    // 50.5px
        lineHeight: '120%',
        letterSpacing: '0.01em',
        fontWeight: '700',
      }],
      'heading-xl': ['4.209rem', {    // 67.3px
        lineHeight: '120%',
        letterSpacing: '0.01em',
        fontWeight: '700',
      }],
      'heading-xxl': ['5.61rem', {    // 89.8px
        lineHeight: '110%',
        letterSpacing: '0.01em',
        fontWeight: '700',
      }],

      'button-s': ['0.875rem', {      // 14px
        lineHeight: '1.5rem',
        letterSpacing: '-0.01em',
        fontWeight: '500',
      }],
      'button-base': ['1rem', {       // 16px
        lineHeight: '1.5rem',
        letterSpacing: '-0.01em',
        fontWeight: '500',
      }],
      'button-lg': ['1.169rem', {     // 18.7px
        lineHeight: '1.5rem',
        letterSpacing: '-0.01em',
        fontWeight: '500',
      }],
    },
    extend: {
      colors: {
        'primary': {
          DEFAULT: '#8640DC',
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

