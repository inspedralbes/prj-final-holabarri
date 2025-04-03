/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
    // "./node_modules/flowbite/**/*.{js,ts}"
  ],
  theme: {
    extend: {
      keyframes: {
        appear: {
          "0%": {
            opacity: "0",
          },
          "100%": {
            opacity: "1",
          },
        },
      },
      animation: {
        appear: "appear 0.1s ease-in-out",
      }
    },
  },
  darkMode: 'class',
  plugins: [
    // require('flowbite/plugin') // Agrega el plugin de Flowbite
  ],
};