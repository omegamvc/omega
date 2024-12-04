import defaultTheme from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.{nexus.php,js}',
    ],
    theme: {
        extend: {
	   fontFamily: {
	       sans: ['Figtree, ...defaultTheme.fontFamily.sans'],
           },
        },
    },
    plugins: [],
}
