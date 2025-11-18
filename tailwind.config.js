/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Manrope', 'sans-serif'],
      },
      colors: {
        'brand-orange': '#F75F24',
        'brand-black': '#1A1A1A',
        'brand-secondary-black': 'rgba(26, 26, 26, 0.80)',
        'brand-grey': '#F6F6F6',
        'brand-secondary-grey': '#EBECF0',
      },
      boxShadow: {
        'team': '0 5.737px 12.293px 0 rgba(0, 0, 0, 0.12)',
      },

    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
