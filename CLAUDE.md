# Optimo Digital Roadmap — Kontext für Claude Code

Web-Präsentation für die Firma Optimo, erstellt von PITapp.
Präsentationstitel: **Optimo Digital Roadmap**.

**Vollständiges Briefing:** Bitte immer zuerst `docs/BRIEFING.md` lesen.
**Setup-Vorgehen:** Siehe `docs/claude-code-setup-prompt.md`.
**Deployment-Schritte für den Nutzer:** Siehe `README.md`.

## Tech-Stack

- Astro 5 (TypeScript, strict)
- Tailwind CSS 3 + `@tailwindcss/typography`
- Astro Content Collections für alle Sektions-Texte (`src/content/`)
- Statischer Output (`dist/`-Ordner), kein SSR-Adapter

## Deployment

- Hosting: Hostinger Business-Plan.
- Quellcode: GitHub, Branch `main`.
- Build: GitHub Actions (`.github/workflows/deploy.yml`).
- Build-Output: Branch `deploy` (wird von der Action automatisch aktualisiert).
- Hostinger zieht den `deploy`-Branch per Webhook → `public_html`.
- **Niemals** den `dist/`-Ordner in `main` committen.

## Architektur

- **Single Landing-Page** mit Scroll-Sektionen (`src/pages/index.astro`).
- **Sektionen:** Hero → Summary → 3 Säulen → Roadmap → Contact.
- **Inhalte** liegen als Markdown in `src/content/pillars/` und
  `src/content/sections/` — die Komponenten rendern diese Einträge.
- **Dark-Mode** über `class="dark"` auf `<html>`, persistent via
  `localStorage`, Bootstrap-Skript in `BaseLayout.astro` verhindert
  FOUC.
- **Design-Tokens** als CSS-Variablen in `src/styles/global.css` und
  als Theme-Erweiterung in `tailwind.config.mjs`
  (Farben `surface`, `ink`, `line`, Akzent `brand` = Optimo-Rot).

## Arbeitsweise

- Deutsche Sprache in allen sichtbaren Texten; englische Bezeichner im Code.
- Vor größeren Änderungen kurzen Plan vorlegen, keine ungefragten Rewrites.
- Zurückhaltende, seriöse Optik — Zielgruppe Vorstand.
- Keine externen CDNs für Fonts oder Skripte ohne Rücksprache (Datenschutz).
- Keine Islands-Frameworks (React, Vue, Svelte) einbauen, wenn nicht wirklich nötig.
- Keine SSR-Adapter installieren — der Output muss statisch bleiben.

## Schreibweise

- **PITapp** (PIT groß, app klein) — nie „BitApp", „PitApp" oder „PIT-App".
- **Optimo** als Eigenname so belassen.
- Business Central ausgeschrieben, Abkürzung **BC** nur nach erster Nennung.
- **Version 14** so schreiben (nicht „V14", nicht „14er").
- **on-prem** bei der BC-Migration bewusst erwähnen (Abgrenzung zur Cloud).

## Inhalte

- Konkrete Preise, Termine, Referenzkunden **nicht erfinden** — Platzhalter
  setzen (`<!-- TODO: ... -->`) und nachfragen.
- Logos, Bilder, Screenshots erst einbinden, wenn der Nutzer sie freigibt.

## Nützliche Befehle

- `npm run dev` — lokaler Dev-Server auf http://localhost:4321
- `npm run build` — statischer Build nach `dist/` (nur zum lokalen
  Testen, nicht committen)
- `npm run preview` — Vorschau des Builds lokal
- `git push origin main` — löst automatisches Deployment aus
