/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Manrope", "sans-serif"],
      },
      colors: {
        "brand-orange": "#FB6514",
        "brand-orange-hover": "#FD853A",
        "brand-orange-active": '#EC4A0A',
        "brand-black": "#1A1A1A",
        "brand-secondary-black": "rgba(26, 26, 26, 0.80)",
        "brand-grey": "#F6F6F6",
        "brand-secondary-grey": "#EBECF0",
        "faq-hover": "#333333",
        "brand-white-hover": '#E5E5E5',
      },
      borderRadius: {
        32: "32px",
        40: "40px",
        52: "52px",
        58: "58px",
      },
      ringWidth: {
        6: "6px",
      },
      letterSpacing: {
        "tighter-sm": "-0.32px",
        "tighter-md": "-0.4px",
        "tighter-lg": "-0.48px",
        "tighter-xl": "-0.56px",
        "tighter-2xl": "-0.64px",
        "tighter-3xl": "-0.96px",
        "tighter-4xl": "-1.04px",
      },
      boxShadow: {
        team: "0 5.737px 12.293px 0 rgba(0, 0, 0, 0.12)",
      },
    },
  },
  plugins: [require("@tailwindcss/typography")],
};
