# Claude Code – Erweiterung der Optimo-Roadmap-Präsentation: Technischer Hintergrund

> **Anweisung an Claude Code:** Lies diese Datei vollständig. **Schreibe noch keinen Code und verändere noch nichts an der bestehenden Präsentation**, bis du den Plan unter Schritt 3 ausformuliert und der Nutzer ihn freigegeben hat.

---

## 1. Projektkontext

Die bestehende Präsentation **„Optimo BC Roadmap"** wurde in einer früheren Session mit Claude Code aufgebaut und liegt in diesem Repository vor. Sie kommuniziert die fünf-säulige Modernisierungs-Roadmap, die der Dienstleister **PITapp** für die Firma Optimo umsetzt. Die Präsentation richtet sich an die Geschäftsleitung und Schlüsselanwender bei Optimo – also primär an Fachpublikum, nicht an Entwickler.

In einer parallelen Beratungssession wurde inzwischen die **technische Architektur der drei Apps + der Zentrale** geklärt (Monorepo-Aufbau, Tech-Stack, Paketstruktur usw., siehe Detailangaben unter Abschnitt 5). Diese Inhalte sollen jetzt in die bestehende Präsentation eingebaut werden – allerdings **bewusst zurückhaltend**, als optionaler Bereich für technisch interessierte Zuhörer, **ohne den fachlichen Hauptfokus der Präsentation zu verwässern**.

---

## 2. Was hinzugefügt werden soll

Ein neuer Bereich mit dem Titel **„Technischer Hintergrund"** (oder einer ähnlich zurückhaltenden Bezeichnung, siehe offene Fragen). Dieser Bereich:

- Erklärt den Aufbau und die innere Funktionsweise der App-Landschaft
- Richtet sich an technisch interessierte Zuhörer (IT-Verantwortliche bei Optimo, externe Berater, neugierige Geschäftsführung)
- Ist **klar als optionaler, vertiefender Bereich erkennbar** – wer ihn nicht braucht, soll ihn problemlos überspringen können
- Bleibt sachlich-zugänglich, vermeidet unnötige Fachbegriffe, erklärt Begriffe dort, wo sie unvermeidlich sind

---

## 3. Vorgehen (Reihenfolge einhalten)

### Schritt 1 – Bestand analysieren
1. Lies diese Datei vollständig.
2. Lies die bestehende `CLAUDE.md` (falls vorhanden) und sonstige Setup-Dokumente.
3. Verschaffe dir einen Überblick über die bestehende Präsentation: Routing-Struktur, Navigation, Design-System, verwendete Komponenten, Farbsprache, Typografie, Tonalität.

### Schritt 2 – Plan vorschlagen (noch keine Code-Änderungen)
Lege dem Nutzer einen schriftlichen Plan vor, der folgende Punkte abdeckt:

- **Platzierung in der Präsentation:** Wo wird der neue Bereich integriert? Vorschlag begründen (eigene Unterseite, dezenter Navigationspunkt, „Mehr erfahren"-Link am Ende der App-Säulen, separater Tab, Footer-Link – mehrere Optionen kurz abwägen, eine empfehlen)
- **Wie wird die „Zurückhaltung" gestalterisch umgesetzt?** (z. B. eigener Navigationspunkt mit dezenterem Styling, kein Auto-Aufruf, klare Kennzeichnung als „für Interessierte")
- **Innere Struktur des neuen Bereichs:** Sektionen, Reihenfolge, Übergänge
- **Visualisierungen:** Welche Diagramme/Schaubilder werden erstellt? (siehe Abschnitt 6)
- **Wie wird der Look mit dem bestehenden Design-System konsistent gehalten?**
- **Offene Fragen** an den Nutzer

**Auf die Bestätigung des Nutzers warten. Erst dann mit Schritt 4 beginnen.**

### Schritt 3 – Umsetzung
Nach Freigabe:
1. Den neuen Bereich integrieren – Routing, Navigation, neue Seite(n)
2. Inhaltliche Sektionen umsetzen (siehe Abschnitt 5)
3. Diagramme/Visualisierungen erstellen (siehe Abschnitt 6)
4. Konsistenz-Check: Design-System, Tonalität, Sprache
5. `pnpm dev` starten, alle Pfade durchklicken, Responsiveness prüfen
6. Kurze Zusammenfassung an den Nutzer geben: was wurde wo eingebaut, wie ist es erreichbar, welche Stellen könnten Feedback brauchen

---

## 4. Verbindliche Rahmenbedingungen

### Tonalität und Sprache
- **Komplett auf Deutsch**, formal mit „Sie"
- **Sachlich, aber zugänglich** – nicht akademisch, nicht buzzword-lastig
- Fachbegriffe nur, wo unvermeidlich, dann **kurz erklärt** (in Klammern oder über Tooltips)
- Analogien zur Veranschaulichung erlaubt, aber sparsam einsetzen
- **Keine Marketing-Floskeln** („cutting-edge", „state-of-the-art", „next-level")
- **Keine Übertreibung von Komplexität** – ehrlich darstellen, nicht beeindrucken wollen

### Designintegration
- Das bestehende Design-System, die Farbsprache und die Typografie der Präsentation **strikt übernehmen**
- Der neue Bereich darf **nicht visuell auffälliger** sein als die fachlichen Hauptbereiche – eher etwas zurückhaltender
- Konsistente Komponenten-Verwendung mit dem Rest der Präsentation
- Falls die bestehende Präsentation Akzentfarben pro Säule nutzt: für den technischen Bereich eine neutrale, gedämpfte Akzentfarbe wählen (z. B. ein dezentes Grau-Blau)

### Platzierungs-Prinzipien
- Der Bereich ist **erreichbar, aber nicht aufdringlich**
- Kein Pop-up, kein automatisches Anzeigen, kein Banner
- Ein **klar abgegrenzter Einstiegspunkt** (Navigation oder Link am Ende der Hauptpräsentation)
- Im Bereich selbst darf der Inhalt dann **vollständig und strukturiert** sein – „zurückhaltend" gilt nur für die Außenwirkung, nicht für die inhaltliche Tiefe

---

## 5. Inhaltliche Sektionen des technischen Bereichs

Folgende Sektionen sollen abgedeckt werden. Reihenfolge ist ein Vorschlag und darf im Plan begründet angepasst werden.

### 5.1 Einleitung / Worum geht es in diesem Bereich
- Ein Absatz Hinführung: „Dieser Bereich richtet sich an technisch interessierte Leser. Er beschreibt, wie die im Hauptteil vorgestellten Apps aufgebaut sind und zusammenspielen."
- Kurze Lesezeit-Angabe („Lesezeit ca. 5–7 Minuten")

### 5.2 Zwei getrennte Welten: Business Central und die App-Landschaft
- Erklärung, dass die Roadmap aus zwei klar getrennten Code-Universen besteht:
  - **Welt 1:** Business Central selbst inklusive Etiketten-Modul (programmiert in AL, der BC-eigenen Sprache, läuft auf dem BC-Server)
  - **Welt 2:** Die vier Apps (Scanner, Außendienst, Auslieferung, Zentrale), programmiert in TypeScript/React, laufen auf den jeweiligen Endgeräten
- Warum die Trennung – kurz, einfach erklärt: andere Sprachen, andere Tools, andere Deployment-Wege, beide Welten sprechen über klar definierte Schnittstellen miteinander
- Schaubild dazu (siehe Abschnitt 6)

### 5.3 Die vier Apps im Überblick
Tabellarische oder kartenartige Darstellung – pro App jeweils:
- Name und Zweck (ein Satz)
- Zielnutzer
- Geräte, auf denen die App läuft
- Technische Besonderheit (z. B. „PWA für Offline-Betrieb in der Fahrerkabine")

Konkrete Inhalte:
- **Scanner** – Erfassungs- und Abfrage-App für Produktion, Lager, Versand und Inventur; Handheld-Geräte (Zebra, Honeywell) und Android-Tablets; als PWA umgesetzt
- **Außendienst** – Informationssystem für Verkaufsmitarbeiter im Außendienst; Tablets und Laptops; offline-fähig durch PWA-Ansatz
- **Auslieferung** – Tour- und Lieferschein-App für Versand und Fahrer; Tablets in der Fahrerkabine; PWA mit lokaler Datenhaltung
- **Zentrale** – Verwaltungs-, Monitoring- und Kommunikations-Plattform für die drei operativen Apps; klassische Web-App im Browser am Arbeitsplatz

### 5.4 Monorepo-Architektur – warum ein gemeinsames Repository
- Begriff „Monorepo" kurz erklären (mehrere Apps in einem Code-Repository, im Gegensatz zu vielen einzelnen Repositories)
- **Kernargumente** (knapp, je 1–2 Sätze):
  - Gemeinsamer Code wird einmal geschrieben und überall genutzt (Datenmodelle, BC-Anbindung, UI-Komponenten)
  - Änderungen am gemeinsamen Code wirken sofort in allen Apps
  - Eine konsistente Entwicklungsumgebung statt vier getrennter
  - Bessere Unterstützung durch KI-gestützte Entwicklungswerkzeuge, weil der gesamte Kontext gleichzeitig sichtbar ist
- Schaubild der Struktur (siehe Abschnitt 6)

### 5.5 Die gemeinsamen Bausteine („Packages")
Vorstellung der sechs zentralen wiederverwendbaren Pakete – jeweils mit einem Satz, was sie leisten:
- **bc-client** – Anbindung an Business Central, abstrahiert die API-Aufrufe
- **auth** – Benutzeranmeldung und Berechtigungsprüfung
- **messaging** – Echtzeit-Kommunikation zwischen Zentrale und mobilen Apps
- **shared-types** – Gemeinsame Datentypen (Artikel, Kunde, Lieferschein, Tour usw.)
- **ui** – Wiederverwendbare Oberflächen-Bausteine (Buttons, Karten, Formulare)
- **utils** – Hilfsfunktionen (Datums-Formatierung, Validatoren, Zahlenformate)

Wichtig: Beim Schreiben dieser Sektion **nicht in Code-Beispiele abgleiten** – es geht um das Was und Wofür, nicht um das Wie.

### 5.6 Tech-Stack
Ehrliche Auflistung der verwendeten Technologien mit jeweils einem Satz Begründung. Reihenfolge nach Wichtigkeit:
- **TypeScript** – typisierte Variante von JavaScript, erkennt viele Fehler bereits beim Schreiben
- **React** – etablierte Bibliothek für moderne Web-Oberflächen
- **Vite** – schnelles Build-Werkzeug für die Entwicklung und Auslieferung
- **Tailwind CSS** – Gestaltungs-Framework, das konsistente Designs ermöglicht
- **pnpm Workspaces + Turborepo** – Werkzeuge zur Verwaltung des Monorepos
- **PWA-Technologie** – ermöglicht den Apps, auch ohne Internetverbindung zu funktionieren und sich wie installierte Apps zu verhalten

Diese Auflistung kann als zweispaltige Liste oder kompakte Tabelle dargestellt werden, damit sie nicht „erschlägt".

### 5.7 Datenfluss und Zusammenspiel
Wie kommunizieren die Bausteine miteinander? Eine zugängliche Erklärung:
- Apps fragen Daten beim BC-Client an
- Der BC-Client spricht mit Business Central über dessen Schnittstelle (OData/API)
- Die Zentrale erhält Live-Daten von den mobilen Apps über die Messaging-Komponente
- Nachrichten von der Zentrale an mobile Anwender laufen denselben Weg zurück

Schaubild dazu (siehe Abschnitt 6).

### 5.8 Entwicklung mit KI-Unterstützung
Eine kurze, ehrliche Sektion (3–4 Absätze), die transparent macht, dass die Entwicklung **mit Unterstützung von Claude Code** stattfindet:
- Was Claude Code ist – ein KI-Assistent für Software-Entwicklung
- Wie er eingesetzt wird – als beschleunigender Begleiter, der unter Aufsicht arbeitet, nicht als Autopilot
- Warum diese Arbeitsweise gewählt wurde – schnellere Umsetzung, niedrigere Einstiegshürde für komplexe Aufgaben, dabei volle Kontrolle und Nachvollziehbarkeit
- Klarstellung, dass die fachliche Logik, die Architektur-Entscheidungen und die Qualitätssicherung weiterhin in menschlicher Hand liegen

Diese Sektion ist **wichtig für Transparenz** und sollte nicht weggelassen werden, aber sachlich bleiben – kein Werbeblock.

### 5.9 Sicherheits- und Datenschutz-Aspekte (kurz)
Eine knappe Sektion mit den wichtigsten Punkten:
- Daten verbleiben in der Optimo-Infrastruktur (keine Cloud-Anbindungen, die das nicht müssen)
- Authentifizierung über klar definierte Benutzerrollen
- Verschlüsselte Kommunikation zwischen Apps und Business Central
- DSGVO-Konformität als Grundprinzip

Wenn hier konkrete Aussagen über tatsächliche Infrastrukturentscheidungen fehlen, lieber **vorsichtig und allgemein formulieren** und im Plan als offene Frage anmerken.

### 5.10 Ausblick: Was kommt nach dem Initial-Release
- Erweiterbarkeit durch die modulare Paketstruktur
- Hinweis, dass nach dem ersten produktiven Einsatz weitere Funktionen schrittweise ergänzt werden können
- Drei oder vier konkrete Beispiele für mögliche zukünftige Erweiterungen (z. B. Push-Benachrichtigungen, Foto-Upload bei Auslieferung, erweiterte Analytics in der Zentrale)

---

## 6. Visualisierungen / Diagramme

Drei zentrale Schaubilder, die die Sektionen tragen:

### 6.1 „Die zwei Welten" (zu Sektion 5.2)
Einfache zweispaltige Darstellung:
- Linke Spalte: **Business Central** – mit den darin lebenden Modulen (BC 27, Etiketten-Modul)
- Rechte Spalte: **App-Landschaft** – mit den vier Apps
- In der Mitte ein Pfeil/Verbindung „API-Schnittstelle"

### 6.2 „Monorepo-Struktur" (zu Sektion 5.4 und 5.5)
Visualisierung der Repository-Struktur:
- Oben: vier App-Kacheln (Scanner, Außendienst, Auslieferung, Zentrale)
- Unten: sechs Package-Kacheln (bc-client, auth, messaging, shared-types, ui, utils)
- Verbindungslinien, die zeigen, dass Apps auf Packages zugreifen
- Akzentfarbe der Apps wie im Hauptteil der Präsentation (Blau/Grün/Orange/Violett), Packages in einem neutralen Grau

### 6.3 „Datenfluss" (zu Sektion 5.7)
Flussdiagramm mit den Hauptbeteiligten:
- Business Central
- BC-Client (im Monorepo)
- Die vier Apps
- Die Zentrale als Sonderfall mit zusätzlicher Messaging-Verbindung zu den mobilen Apps
- Pfeile zeigen die Richtung der Datenflüsse

Alle Diagramme entweder als SVG direkt in React-Komponenten oder über eine schlanke Bibliothek (z. B. Mermaid-Komponenten) – **keine externen Bilddateien** außer wenn unvermeidlich.

---

## 7. Was Claude Code **nicht** tun soll

- **Keine Änderungen an bestehenden Sektionen der Präsentation**, außer wenn sie durch die neue Navigation zwingend nötig sind
- **Keine Aufblähung der Präsentations-App** durch neue große Abhängigkeiten – schlanke Lösungen bevorzugen
- **Keine fiktiven oder geschätzten technischen Details erfinden**, die im Beratungsprozess noch nicht geklärt sind (z. B. konkrete Server-Standorte, exakte Verschlüsselungsverfahren, genaue Hosting-Provider) – im Zweifel allgemein bleiben oder als offene Frage im Plan anmerken
- **Keine Code-Schnipsel oder Kommandozeilen-Beispiele** in der Präsentation zeigen – die Sektion bleibt konzeptionell
- **Keinen automatischen `git commit` oder `git push`** – der Nutzer kommittiert selbst

---

## 8. Offene Fragen, die Claude Code im Plan ansprechen darf

- **Bezeichnung des Bereichs:** „Technischer Hintergrund", „Hinter den Kulissen", „Architektur & Technik", „Für Interessierte" – welche Variante passt am besten zur Tonalität der bestehenden Präsentation?
- **Platzierung in der Navigation:** Am Ende der Hauptnavigation, im Footer, als kleiner Link auf der Startseite, oder als eigener Tab?
- **Tiefe einzelner Sektionen:** Sollen einzelne Sektionen besonders ausführlich oder besonders kompakt sein?
- **Aussagen zu Sicherheit/Datenschutz (5.9):** Welche konkreten Zusagen sind bereits gegeben? Welche bleiben noch offen?
- **Sektion 5.8 (KI-Unterstützung):** Aufnehmen, abändern oder weglassen?
