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
                primary: "#5B8BB8",
                primaryLight: "#8AB9E0",
                accent: "#D4AB07",
                secondary: "#6E7E2A",
            },
        },
    },
    plugins: [],
};
