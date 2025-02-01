/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.html',         
    './components/**/**/*.{html,php}'          
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
      },
    },
  },
  plugins: [],
};
