/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'my_blur':"background-color: rgba(0, 0, 0, 0.5);",
        'dark_color':" linear-gradient(68deg, rgba(5,3,40,1) 23%, rgba(39,39,99,1) 45%, rgba(18,18,98,1) 73%, rgba(17,20,150,1) 100%);",
        'my-color': '#090D1F', // Sizning rangingiz
        'text-dark':"#1A1A1A",
        'color-dark':"#C0C5D0",
        'time-color':"#6941C6",
        "my-light":"#ffffff",
        'my_pink':'#C11574',
        'my_green':"#027A48",
        'my_blue':'#3538CD'
      },
    },
  },
  plugins: [],
}