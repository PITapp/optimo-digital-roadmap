# Claude Code – Setup-Prompt für das Projekt „Optimo Digital Roadmap"

> **Anweisung an Claude Code:** Lies diese Datei vollständig durch, bevor du irgendetwas tust. Folge den Schritten in der angegebenen Reihenfolge. **Schreibe noch keinen Anwendungscode**, bis Schritt 3 (Plan-Freigabe durch den Nutzer) abgeschlossen ist.

---

## 1. Projektkontext

Dieses Projekt erstellt eine **moderne Web-Präsentation** für die Firma **Optimo**, im Auftrag von **PITapp** (genau so geschrieben: `PIT` groß, `app` klein).

Die Präsentation wird über eine Webseite abrufbar sein und richtet sich an den **Vorstand und einzelne Mitarbeiter von Optimo**. Ziel ist es, drei Modernisierungs-Angebote strukturiert und überzeugend vorzustellen:

1. **Scanner-App für Business Central** – moderne Web-App als Ersatz für die bestehende Scanner-Software. Funktionen: Inventur, Ladelisten (LKW-Beladung im Versand), Umlagerungen, Artikelinformationen.
2. **Außendienst-Web-App** – moderne Ablösung des ca. 20 Jahre alten bestehenden Außendienst-Programms. Verkaufszahlen, Artikelinformationen und weitere Daten aus Business Central für Außendienstmitarbeiter.
3. **Business-Central-Migration** – Migration von Business Central Version 14 auf die neueste on-prem-Version, inklusive Darstellung der Vorteile.

**Projektname / Repo-Name:** `optimo-digital-roadmap`
**Präsentationstitel:** Optimo Digital Roadmap

**Vollständiges Briefing:** Alle fachlichen Details, Zielgruppen, Argumente und offenen Punkte stehen in `docs/BRIEFING.md`. **Diese Datei ist die fachliche Grundwahrheit** – bei Widersprüchen gilt das Briefing, nicht diese Setup-Datei.

---

## 2. Verbindliche Rahmenbedingungen

- **Sprache:** Gesamter sichtbarer Text (UI, Inhalte, Kommentare in Texten) in **Deutsch**. Code-Kommentare und Variablennamen auf Englisch.
- **Zielgruppe der Seite:** Vorstand + Fachmitarbeiter – also seriös, professionell, nicht verspielt, aber klar modern.
- **Optik:** Modern, ruhig, mit Fokus auf Lesbarkeit. Keine überladenen Animationen. Viel Weißraum. Gute Typografie zählt mehr als Effekte.
- **Tech-Stack:** **Astro** + **Tailwind CSS** + **TypeScript**. Astro wurde bewusst gewählt, weil es für inhaltsorientierte Seiten wie diese Präsentation optimal ist (null JavaScript standardmäßig, sehr schnelle Ladezeiten, reiner statischer Output).
- **Hosting:** **Hostinger (Business-Plan)**. Der Nutzer hat einen Business-Plan, aber wir deployen trotzdem als reine statische Seite – nicht als Node.js-Web-App. Grund: Das Setup ist sauberer, unabhängiger vom Framework und leichter nachzuvollziehen.
- **Deployment-Strategie: GitHub Actions → Hostinger Webhook (automatisch):**
  - Quellcode liegt auf GitHub im `main`-Branch.
  - Bei jedem Push auf `main` läuft eine GitHub Action, die `npm ci` + `npm run build` ausführt.
  - Der generierte `dist/`-Ordner wird in einen separaten Branch (Konvention: **`deploy`**) gepusht.
  - Hostinger ist im hPanel mit dem `deploy`-Branch verbunden und zieht die Änderungen über einen Webhook automatisch ins `public_html`.
  - **Der Nutzer pusht also einfach auf `main` – wenige Sekunden später ist die Änderung live.** Kein manueller Build, kein FTP-Upload.
- **Keine Frameworks-Overkill:** Die Seite ist im Kern eine strukturierte Informationsseite, keine komplexe App. Keep it simple – keine React-/Vue-/Svelte-Islands einbauen, wenn sie nicht wirklich gebraucht werden. Wo Interaktivität nötig ist, reicht in der Regel Vanilla-JavaScript oder eine kleine Astro-Komponente.
- **Datenschutz:** Wird später entschieden (siehe Kapitel 8 im Briefing). Ein einfacher Passwortschutz kann später über eine `.htaccess`-Datei (im `public/`-Ordner von Astro abgelegt, damit sie in den Build wandert) ergänzt werden.

---

## 3. Vorgehen (Reihenfolge einhalten)

### Schritt 1 – Einlesen & Verstehen
1. Lies `docs/BRIEFING.md` vollständig.
2. Lies diese Datei (`docs/claude-code-setup-prompt.md`) zu Ende.
3. Prüfe, ob bereits eine `CLAUDE.md` im Projekt-Root existiert.

### Schritt 2 – Plan vorschlagen (noch kein Code!)
Erstelle einen schriftlichen Plan mit folgenden Punkten und lege ihn dem Nutzer zur Freigabe vor:

- **Tech-Stack ist gesetzt:** Astro + Tailwind CSS + TypeScript. Keine Alternativen mehr vorschlagen.
- **Projektstruktur** (Ordner-Baum mit kurzer Erklärung pro Ordner, passend zum Astro-Standard: `src/pages/`, `src/layouts/`, `src/components/`, `src/styles/`, `public/`, plus `.github/workflows/` für die Deployment-Action).
- **Seitenarchitektur**: Eine durchgehende Landing-Page mit Scroll-Sektionen (`src/pages/index.astro` mit Section-Komponenten) ODER eine Multi-Page-Struktur (eine eigene Seite pro Säule)? Empfehlung begründen.
- **Sektionen / Seitenaufbau** in dieser logischen Reihenfolge:
  1. Hero / Titel (Optimo Digital Roadmap)
  2. Management Summary
  3. Säule 1 – Scanner-App
  4. Säule 2 – Außendienst-Web-App
  5. Säule 3 – Business-Central-Migration
  6. Gesamtbild / Roadmap
  7. Ansprechpartner PITapp / Kontakt
- **Inhaltsverwaltung**: Sollen die Texte der Sektionen als Markdown-Dateien (`src/content/` mit Astro Content Collections) gepflegt werden, oder direkt in den Astro-Komponenten stehen? Empfehlung begründen.
- **Design-Tokens**: Vorschlag für Farbpalette (zurückhaltend, professionell), Typografie (eine moderne Grotesk als Default, **lokal eingebunden** wegen Datenschutz – keine Google-Fonts-CDN), Spacing-Skala.
- **Deployment-Workflow skizzieren** – kurz beschreiben, wie der GitHub-Actions-Workflow aussehen wird (Trigger, Build, Push des `dist/`-Ordners auf den `deploy`-Branch) und welche Schritte der Nutzer einmalig selbst in GitHub und im Hostinger hPanel machen muss.

**Stoppe nach dem Plan und warte auf Rückmeldung.**

### Schritt 3 – Umsetzung nach Freigabe
Erst nach expliziter Freigabe des Plans:

1. Projekt initialisieren mit `npm create astro@latest` – minimales Template („Empty" oder „Minimal"), TypeScript aktiviert (strict), Git initialisieren.
2. Tailwind CSS als offizielle Astro-Integration einrichten: `npx astro add tailwind`.
3. Design-Tokens aus dem freigegebenen Plan als CSS-Variablen in `src/styles/global.css` und als Theme-Erweiterung in der Tailwind-Konfiguration hinterlegen.
4. Ordnerstruktur anlegen wie im Plan beschrieben.
5. `.gitignore` prüfen und sicherstellen, dass **`dist/` und `node_modules/` ausgeschlossen sind** (der `dist/`-Ordner darf nie im `main`-Branch landen – er wird nur vom GitHub-Actions-Workflow auf den `deploy`-Branch gepusht).
6. **GitHub-Actions-Workflow** anlegen unter `.github/workflows/deploy.yml`. Anforderungen:
   - Trigger: `push` auf Branch `main` (und `workflow_dispatch` für manuelle Auslösung).
   - Job-Schritte: Checkout → Node.js-Setup (LTS, aktuell Node 20 oder neuer) → `npm ci` → `npm run build` → Push des `dist/`-Ordners in den `deploy`-Branch desselben Repositories.
   - Verwende für den Push-Schritt eine etablierte Action wie `peaceiris/actions-gh-pages` oder `s0/git-publish-subdir-action`. Wähle die Variante, die eine saubere Commit-History auf dem `deploy`-Branch erzeugt und `GITHUB_TOKEN` nutzt (kein Personal Access Token nötig).
   - Commit-Message des Deploy-Pushs soll den Quell-Commit-SHA enthalten, damit nachvollziehbar bleibt, welche `main`-Version gerade live ist.
7. `CLAUDE.md` im Projekt-Root erstellen (siehe Abschnitt 4 unten).
8. Grundlayout in `src/layouts/BaseLayout.astro` (mit Header / Footer) und eine wiederverwendbare `Section.astro`-Komponente bauen.
9. Platzhalter-Inhalte für alle sieben Sektionen anlegen – mit klar markierten Stellen, wo der echte Text aus dem Briefing später eingefügt wird (z. B. `<!-- TODO: Text aus BRIEFING Kapitel X -->`).
10. `astro.config.mjs` prüfen – kein Adapter nötig, Standard-Output ist bereits statisch.
11. Erste lauffähige Version lokal prüfen (`npm run dev`) und einen Test-Build ausführen (`npm run build` → `dist/`-Ordner kontrollieren).
12. **`README.md` im Projekt-Root erstellen** mit einer Schritt-für-Schritt-Anleitung für den Nutzer, was er einmalig selbst einrichten muss (siehe Abschnitt 5 unten).

### Schritt 4 – Rückmeldung einholen
Nach Schritt 3 kurz zusammenfassen:
- Was wurde gebaut?
- Was läuft lokal (URL `http://localhost:4321`)?
- Wie sieht der `dist/`-Ordner nach dem Build aus (Dateigröße, Struktur)?
- Welche einmaligen manuellen Schritte muss der Nutzer als Nächstes selbst machen? → Verweis auf die neu erstellte `README.md`.

---

## 4. Inhalt der zu erstellenden `CLAUDE.md` im Projekt-Root

Die `CLAUDE.md` soll kurz sein und bei jedem Claude-Code-Start automatisch als Kontext geladen werden. Sie soll folgenden Inhalt haben (anpassen, wenn im Plan etwas abweicht):

```markdown
# Optimo Digital Roadmap – Kontext für Claude Code

Web-Präsentation für die Firma Optimo, erstellt von PITapp.
Präsentationstitel: **Optimo Digital Roadmap**.

**Vollständiges Briefing:** Bitte immer zuerst `docs/BRIEFING.md` lesen.
**Setup-Vorgehen:** Siehe `docs/claude-code-setup-prompt.md`.
**Deployment-Schritte für den Nutzer:** Siehe `README.md`.

## Tech-Stack
- Astro (TypeScript, strict)
- Tailwind CSS
- Statischer Output (`dist/`-Ordner)

## Deployment
- Hosting: Hostinger Business-Plan
- Quellcode: GitHub, Branch `main`
- Build: GitHub Actions (`.github/workflows/deploy.yml`)
- Build-Output: Branch `deploy` (wird von der Action automatisch aktualisiert)
- Hostinger zieht den `deploy`-Branch per Webhook → `public_html`
- **Niemals** den `dist/`-Ordner in `main` committen.

## Arbeitsweise
- Deutsche Sprache in allen sichtbaren Texten; englische Bezeichner im Code.
- Vor größeren Änderungen kurzen Plan vorlegen, keine ungefragten Rewrites.
- Zurückhaltende, seriöse Optik – Zielgruppe Vorstand.
- Keine externen CDNs für Fonts oder Skripte ohne Rücksprache (Datenschutz).
- Keine Islands-Frameworks (React, Vue, Svelte) einbauen, wenn nicht wirklich nötig.

## Schreibweise
- **PITapp** (PIT groß, app klein) – nie „BitApp", „PitApp" oder „PIT-App".
- **Optimo** als Eigenname so belassen.
- Business Central ausgeschrieben, Abkürzung **BC** nur nach erster Nennung.

## Nützliche Befehle
- `npm run dev` – lokaler Dev-Server auf http://localhost:4321
- `npm run build` – statischer Build nach `dist/` (nur zum lokalen Testen, nicht committen)
- `npm run preview` – Vorschau des Builds lokal
- `git push origin main` – löst automatisches Deployment aus
```

---

## 5. Inhalt der zu erstellenden `README.md` im Projekt-Root

Die `README.md` dokumentiert für den Nutzer die **einmaligen manuellen Einrichtungsschritte**, die Claude Code nicht erledigen kann. Sie soll mindestens folgende Abschnitte enthalten, jeweils als klar nummerierte Schritt-für-Schritt-Anleitung:

1. **GitHub-Repository vorbereiten**
   - Lokales Repo zu GitHub pushen (`main`-Branch).
   - In den Repository-Settings unter **„Actions → General → Workflow permissions"** auf **„Read and write permissions"** umstellen. Das ist nötig, damit die Action den `deploy`-Branch anlegen und aktualisieren darf.
   - Beim ersten Push auf `main` läuft der Workflow, erzeugt den `deploy`-Branch automatisch und pusht den Build hinein.

2. **Hostinger mit GitHub verbinden**
   - Im Hostinger hPanel zur betreffenden Webseite wechseln.
   - Unter **„Erweitert → Git"** ein neues Repository anlegen:
     - Repository-URL: `https://github.com/<user>/optimo-digital-roadmap.git` (mit Platzhalter für den echten Benutzernamen).
     - Branch: **`deploy`** (nicht `main`!).
     - Zielverzeichnis: `public_html` (oder Unterverzeichnis der gewünschten Subdomain).
   - Nach dem ersten Klonen auf **„Manage → Auto Deployment"** gehen und die dort angezeigte **Webhook-URL** kopieren.

3. **Webhook in GitHub eintragen**
   - Im GitHub-Repository unter **„Settings → Webhooks → Add webhook"**:
     - Payload URL: die von Hostinger kopierte Webhook-URL.
     - Content-Type: `application/x-www-form-urlencoded`.
     - Nur „push"-Events aktivieren.
     - Active: ja.
   - Speichern.

4. **Funktionstest**
   - Eine Kleinigkeit im Code ändern, auf `main` pushen.
   - In GitHub den Actions-Tab öffnen und prüfen, ob der Workflow durchläuft.
   - Nach ca. 1–2 Minuten die Webseite neu laden – die Änderung muss live sein.

5. **Fehlerbehebung (Kurzliste)**
   - Workflow schlägt fehl mit Permission-Error → Punkt 1 (Workflow permissions) prüfen.
   - Hostinger zeigt den alten Stand → im hPanel manuell „Deploy"-Button drücken und Webhook-Verbindung prüfen.
   - Webseite zeigt Quellcode statt gerenderter Seite → Hostinger ist auf den falschen Branch (`main` statt `deploy`) verbunden.

---

## 6. Dinge, die Claude Code **nicht** tun soll

- Keine Texte erfinden, die im Briefing nicht belegt sind (z. B. konkrete Preise, Zeitpläne, Referenzkunden). Stattdessen Platzhalter setzen und nachfragen.
- Keine Logos, Markenzeichen oder Bilder von Optimo oder Dritten einbinden, bevor der Nutzer diese explizit bereitstellt.
- Keine Analytics, kein Tracking, keine externen Schriftarten-CDNs ohne Nachfrage (Datenschutz-Gründe, Zielmarkt ist Österreich/EU).
- Keine React-/Vue-/Svelte-Integrationen in Astro installieren, solange keine konkrete Komponente das wirklich braucht.
- Keine SSR-Adapter (`@astrojs/node`, `@astrojs/vercel` etc.) einbauen – der Output muss statisch bleiben.
- **Den `dist/`-Ordner niemals ins `main`-Repository committen.** Er gehört ausschließlich auf den `deploy`-Branch und wird dort ausschließlich vom GitHub-Actions-Workflow aktualisiert.
- Keine Personal Access Tokens, API-Keys oder Hostinger-Zugangsdaten ins Repository legen. Der Workflow nutzt nur das automatisch bereitgestellte `GITHUB_TOKEN`.
- Keine großen Refactorings „nebenbei". Scope einhalten.
- Kein Einrichten der GitHub- oder Hostinger-Seite vornehmen – das macht der Nutzer selbst anhand der `README.md`. Claude Code liefert nur den Code und die Anleitung.

---

## 7. Erste konkrete Aktion

Sobald du diese Datei gelesen hast, antworte dem Nutzer mit:

1. Einer kurzen Bestätigung, dass Setup-Prompt und Briefing gelesen wurden.
2. Dem **Plan aus Schritt 2** (Projektstruktur, Seitenarchitektur, Sektionen, Inhaltsverwaltung, Design-Tokens, Deployment-Workflow-Skizze).
3. Einer klaren Frage zur Freigabe („Soll ich so umsetzen, oder möchtest du etwas anpassen?").

Danach warten.
