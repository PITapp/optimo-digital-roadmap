# Optimo Digital Roadmap

Web-Präsentation **Optimo Digital Roadmap** — Modernisierungsvorschlag von
**PITapp** für die Firma Optimo. Eine statische, teilbare Seite, die
den gesamten Vorschlag (Scanner-App, Außendienst-Web-App,
Business-Central-Migration) an einem Ort bündelt.

Dieses Dokument erklärt, was du **einmalig manuell** einrichten musst,
damit jeder Push auf `main` automatisch live geht.

---

## Lokal entwickeln

```bash
npm install
npm run dev          # http://localhost:4321
npm run build        # erzeugt dist/
npm run preview      # schaut sich dist/ lokal an
```

Der `dist/`-Ordner gehört **nicht** auf `main` — er wird ausschließlich
vom GitHub-Actions-Workflow auf den `deploy`-Branch gepusht.

---

## Einmalige manuelle Einrichtung

### 1. GitHub-Repository vorbereiten

1. Lokales Repo anlegen und zu GitHub pushen:

   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git branch -M main
   git remote add origin https://github.com/<dein-user>/optimo-digital-roadmap.git
   git push -u origin main
   ```

2. Im GitHub-Repository unter **Settings → Actions → General →
   Workflow permissions** auf **„Read and write permissions"**
   umstellen. Das ist nötig, damit die Action den `deploy`-Branch
   anlegen und aktualisieren darf.
3. Beim ersten Push auf `main` läuft der Workflow automatisch
   (siehe `Actions`-Tab), erzeugt den `deploy`-Branch und legt den
   Build dort ab.

### 2. Hostinger mit GitHub verbinden

1. Im Hostinger hPanel zur betreffenden Webseite wechseln.
2. Unter **Erweitert → Git** ein neues Repository anlegen:
   - **Repository-URL:** `https://github.com/<dein-user>/optimo-digital-roadmap.git`
   - **Branch:** `deploy` (nicht `main`!)
   - **Zielverzeichnis:** `public_html` (oder das Unterverzeichnis
     der gewünschten Subdomain).
3. Nach dem ersten Klonen unter **Manage → Auto Deployment** die
   angezeigte **Webhook-URL** kopieren.

### 3. Webhook in GitHub eintragen

1. Im GitHub-Repository unter **Settings → Webhooks → Add webhook**:
   - **Payload URL:** die von Hostinger kopierte URL.
   - **Content-Type:** `application/x-www-form-urlencoded`.
   - **Events:** nur `push`.
   - **Active:** ja.
2. Speichern.

### 4. Funktionstest

1. Eine Kleinigkeit im Code ändern (z. B. einen Text in
   `src/content/sections/summary.md`).
2. Auf `main` pushen.
3. Im GitHub **Actions**-Tab prüfen, ob der Workflow durchläuft
   (sollte in 1–2 Minuten grün sein).
4. Webseite neu laden — die Änderung muss live sein.

---

## Fehlerbehebung

| Symptom | Ursache / Lösung |
|---|---|
| Workflow schlägt mit Permission-Error fehl | Schritt 1.2 prüfen — **„Read and write permissions"** aktivieren. |
| Hostinger zeigt den alten Stand | Im hPanel unter **Manage** den **„Deploy"**-Button manuell drücken. Danach Webhook-URL auf Gültigkeit prüfen. |
| Webseite zeigt Quellcode statt gerenderte Seite | Hostinger ist auf den falschen Branch verbunden (`main` statt `deploy`). |
| Build scheitert lokal, läuft aber in CI | `node_modules/` lokal löschen, `npm ci` ausführen. |

---

## Projektstruktur (kurz)

```
.
├─ .github/workflows/deploy.yml   # Build + Push auf deploy-Branch
├─ docs/
│  ├─ BRIEFING.md                 # Fachliche Grundwahrheit
│  └─ claude-code-setup-prompt.md # Setup-Anweisung für Claude Code
├─ public/                        # Statische Assets (favicon, fonts/)
├─ src/
│  ├─ assets/                     # Bilder für die Astro-Pipeline
│  ├─ components/
│  │  ├─ layout/                  # Header, Footer
│  │  ├─ sections/                # Hero, Summary, Pillar, Roadmap, Contact
│  │  └─ ui/                      # Section, Card, SectionHeader, ThemeToggle
│  ├─ content/
│  │  ├─ config.ts                # Schema für Content Collections
│  │  ├─ pillars/                 # Die drei Säulen (Markdown)
│  │  └─ sections/                # Summary, Roadmap, Contact (Markdown)
│  ├─ layouts/BaseLayout.astro
│  ├─ pages/index.astro           # Single Landing-Page
│  └─ styles/global.css           # Tailwind-Base + Design-Tokens
├─ astro.config.mjs
├─ tailwind.config.mjs
├─ tsconfig.json
├─ CLAUDE.md                      # Kontext für Claude Code
└─ README.md                      # Diese Datei
```

Texte werden als **Markdown** in `src/content/` gepflegt, nicht direkt
in den Astro-Komponenten. Wer Inhalte ändern möchte, editiert die
Markdown-Datei — das Layout bleibt unberührt.

---

## Hinweise

- **Datenschutz:** Es werden keine externen CDNs, Google-Fonts oder
  Tracker geladen. Die Seite nutzt den System-Font-Stack. Optional
  lässt sich Inter als lokaler Webfont einbinden
  (siehe `public/fonts/README.md`).
- **Passwortschutz:** Wird separat auf Hostinger-Ebene eingerichtet
  (z. B. Basic-Auth via `.htaccess` im `public_html`). Die Datei
  kann bei Bedarf in `public/.htaccess` abgelegt werden, dann wandert
  sie automatisch in den Build.
- **Dark-Mode:** Die Seite hat einen Umschalter oben rechts. Die
  bevorzugte Einstellung des Besuchers (System) wird respektiert,
  die Auswahl bleibt im Browser gespeichert.
