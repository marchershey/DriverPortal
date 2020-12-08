const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
    purge: [],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
        },
        truncate: {
            lines: {
                2: "2",
            },
        },
    },
    variants: {
        display: ["responsive", "last"],
    },
    plugins: [
        require("tailwindcss-truncate-multiline")(),
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/ui")({
            layout: "sidebar",
        }),
        require("autoprefixer"),
    ],
};
