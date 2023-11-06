const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", "sans-serif"],
                lobster: ["Lobster", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
                satisfy: ["Satisfy", "cursive"],
                dancing: ["Dancing Script", "cursive"],
            },
        },
        colors: {
            "bg-dark": "#191919",
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
    ],
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("flowbite/plugin")({
            charts: true,
        }),
    ],
};
