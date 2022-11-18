/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "1rem"
        },
        fontFamily: {
            "Morn": ["Morn"]
        },
        extend: {
            colors: {
                primary: "#E83B8C",
                lightPrimary: "#F0E6E9"
            },
        },
    },
    plugins: [],
}