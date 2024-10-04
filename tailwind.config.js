import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './resources/**/*.js',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        xs: '0.75rem', // 12px
        sm: '0.875rem', // 14px 內文(手機)
        base: '1rem', // 16px
        lg: '1.125rem', // 18px
        xl: '1.25rem', // 20px 註解(PC)、副標題(手機)
        '2xl': '1.5rem', // 24px 內文(PC)
        '3xl': '1.875rem', // 30px 副標題(PC)
        '4xl': '2.25rem', // 36px 大標題(PC)
        '5xl': '3rem', // 48px
        '6xl': '3.5rem', // 56px
      },
      screens: {
        '2xl': '1440px',
        llg: '1280px',
        lg: '1064px', // => @media (min-width: 1064px) { ... }
        md: '768px', // => @media (min-width: 768px) { ... }
      },
      colors: {
        'air-purple': '#471c87',
        'air-blue': '#343557',
        'air-orange': '#f59801',
        'white': '#ffffff',
        'air-yellow': '#fdd900',
        'light-gray': '#efefef',
        'gray': '#f6f6f6',
        'dark-gray': '#909090',
        'background-light-gray': '#e1e1e1',
        'warning-green': '#11bc37',
        'warning-red': '#df1f1f',
        'custom-gray': '#5d5d5d',
        'light-purple': '#f8f8ff',
      },
      textDecorationColor: {
        customGray: '#5d5d5d', // 自定義顏色
      },
    },
  },

  plugins: [forms],
};
