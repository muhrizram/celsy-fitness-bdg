/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        screens: {
            sm: "450px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
        container: {
            center: true,
            padding: "16px",
        },
        fontFamily: {
            orbitron: ["Orbitron"],
            roboto: ["Roboto"],
            secular: ["Secular One"],
        },
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
