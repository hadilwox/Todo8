/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./assets/css/*.{html,js,php}", ".library/*.{php}"],
  theme: {
    extend: {},
  },
  plugins: [],
  message:
    "npx tailwindcss -i ./assets/css/input.css -o ./assets/css/output.css --watch",
};
