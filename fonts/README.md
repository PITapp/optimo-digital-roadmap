# Lokale Webfonts

Dieser Ordner nimmt die lokal eingebundenen Webfonts für die Seite auf. Er
existiert, weil wir aus Datenschutzgründen **keine Google-Fonts-CDN**
verwenden.

## Aktueller Zustand

Standardmäßig greift die Seite auf den System-Font-Stack zurück
(`system-ui`, auf Windows Segoe UI, auf macOS SF Pro, auf Linux ein
passendes Sans-Serif). Das funktioniert sofort, ohne Downloads.

## Wenn Inter gewünscht ist

1. Inter von https://rsms.me/inter/ herunterladen (OFL-lizenziert, kostenlos).
2. Die folgenden Dateien in diesen Ordner legen:
   - `inter-regular.woff2` (Weight 400)
   - `inter-medium.woff2` (Weight 500)
   - `inter-semibold.woff2` (Weight 600)
   - `inter-bold.woff2` (Weight 700)
3. In `src/styles/global.css` die auskommentierten `@font-face`-Blöcke
   aktivieren.

## Alternative: IBM Plex Sans

Gleiches Schema – Dateien hier ablegen, Dateinamen in den
`@font-face`-Regeln anpassen, den Namen in `tailwind.config.mjs` unter
`fontFamily.sans` austauschen.
