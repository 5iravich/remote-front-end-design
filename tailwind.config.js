/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./Final/.{html,js,php}"],
    theme: {
      extend: {
        fontFamily: {
            Prompt: ["Prompt", "sans-serif"],
           }
      },
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }