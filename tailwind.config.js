import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Century Gothic"', 'sans-serif'],
      },
      fontSize: {
        'xs-custom': '12px',
        'sm-custom': '14px',
        'base-custom': '16px',
        'lg-custom': '18px',
        'xl-custom': '22px',
        '2xl-custom': '26px',
        '3xl-custom': '32px',
        '4xl-custom': '38px',
      },
      colors: {
        black: '#000000',
        primary: '#14B1F0',
        prima: '#15ADB7',
        accent: '#FF9900',
        green_p: '#34A853',
        palewhite: '#F8F6F6',
        rose: '#EECFCC',
        cleanwithe: '#FAFAFA',
        bluecieal :'#153BF8',
        greenCustom: "#21BF73",
        rose: "#EECFCC",
        cleanwithe:'#FAFAFA',
      },
    },
  },
  plugins: [],
}

