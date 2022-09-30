/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./src/**/*.{js,ts,jsx,tsx}",
    "./components/**/*.{php,js,ts,jsx,tsx}",
    "./components/UI/*.{php,js,ts,jsx,tsx}",
  ],
  theme: {
    container: (theme) => ({
      center: true,
      padding: {
        DEFAULT: theme("spacing.6"),
        sm: theme("spacing.8"),
        lg: theme("spacing.16"),
        xl: theme("spacing.20"),
        "2xl": theme("spacing.32"),
      },
    }),

    fontFamily: {
      sans: "Fira Sans",
    },
    extend: {},
  },
  plugins: [],
};