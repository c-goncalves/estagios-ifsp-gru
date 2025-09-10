/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./html/**/*.{html,php}", // pega todos os arquivos da pasta html
    "./src/**/*.{html,php,js}", // caso tenha templates/JS
    "./*.{html,php}" // raiz do projeto
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
