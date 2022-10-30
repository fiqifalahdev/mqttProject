const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            current: "currentColor",
            white: colors.white,
            gray: colors.gray,
            slate: colors.slate,
            blue: colors.blue,
            space: "#141B41",
            babyBlue: "#B6F6F5",
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
