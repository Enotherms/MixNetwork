/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1920px",
        },
        fontFamily: {
            din: ["DIN Condensed", "sans-serif"],
        },
        colors: {
            WhiteCol: "#ffffff",
            BlueCol: "#45A3C5",
            UnitsCol: "#f6f6f6",
            UnitsHov: "#f9f9f9",
            TestCol: "#000000",
            FediCol: "#FFA47A",
            BGCol: "#D9D9D9",
            FooterBlue: "#054A91",
            NavCol: "#F6FAF9",
        },
        extend: {
            backgroundImage: {
                BGBody: "url('/public/logos/Body.png')",
            },
        },
    },
    plugins: [],
};
