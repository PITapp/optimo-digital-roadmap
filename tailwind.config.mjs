import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
  content: ["./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        brand: {
          /* DEFAULT and 500 resolve to CSS variables so the accent can
             shift to a softer, desaturated tone in dark mode. */
          DEFAULT: "rgb(var(--color-brand) / <alpha-value>)",
          50: "#FDF2F3",
          100: "#FBE4E7",
          200: "#F5BFC5",
          300: "#EC8C97",
          400: "#DF5868",
          500: "rgb(var(--color-brand) / <alpha-value>)",
          600: "rgb(var(--color-brand-hover) / <alpha-value>)",
          700: "#870B20",
          800: "#650818",
          900: "#440510",
        },
        surface: {
          DEFAULT: "rgb(var(--color-surface) / <alpha-value>)",
          alt: "rgb(var(--color-surface-alt) / <alpha-value>)",
          muted: "rgb(var(--color-surface-muted) / <alpha-value>)",
        },
        ink: {
          DEFAULT: "rgb(var(--color-ink) / <alpha-value>)",
          muted: "rgb(var(--color-ink-muted) / <alpha-value>)",
          subtle: "rgb(var(--color-ink-subtle) / <alpha-value>)",
        },
        line: "rgb(var(--color-line) / <alpha-value>)",
      },
      fontFamily: {
        sans: [
          "Inter",
          "ui-sans-serif",
          "system-ui",
          "-apple-system",
          "Segoe UI",
          "Roboto",
          "Arial",
          "sans-serif",
        ],
      },
      maxWidth: {
        content: "72rem",
      },
      spacing: {
        section: "6rem",
        "section-lg": "8rem",
      },
      fontSize: {
        "display-xl": ["clamp(2.75rem, 5vw + 1rem, 4.75rem)", { lineHeight: "1.05", letterSpacing: "-0.02em" }],
        "display-lg": ["clamp(2rem, 3vw + 1rem, 3rem)", { lineHeight: "1.1", letterSpacing: "-0.015em" }],
        "display-md": ["clamp(1.5rem, 2vw + 0.75rem, 2rem)", { lineHeight: "1.2", letterSpacing: "-0.01em" }],
      },
      boxShadow: {
        card: "0 1px 2px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.04)",
        "card-dark": "0 1px 2px rgba(0,0,0,0.3), 0 4px 16px rgba(0,0,0,0.35)",
      },
    },
  },
  plugins: [typography],
};
