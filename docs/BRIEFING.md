# Projekt-Briefing: Optimo Business Central Roadmap

> **Hinweis:** Dieses Briefing ist die fachliche Grundwahrheit des Projekts. Es enthält bewusst **keine finalen Marketing-Texte**, sondern den inhaltlichen Rahmen, die Zielgruppe, die Botschaft und die Struktur. Die konkreten Texte werden separat ausgearbeitet und dann in die Seite eingefügt.

---

## 1. Projektüberblick

**Arbeitstitel des Projekts:** Optimo Business Central Roadmap
**Präsentationstitel (für den Kunden sichtbar):** Optimo Business Central Roadmap
**Repository-/Ordnername:** `optimo-bc-roadmap`

### 1.1 Die Akteure

- **Absender / Anbieter:** **PITapp** – IT-Dienstleister, der Optimo die im Folgenden beschriebenen Modernisierungen anbietet. Schreibweise **immer** als `PITapp` (PIT groß, app klein). Niemals „PitApp", „PIT-App", „BitApp".
- **Empfänger / Kunde:** Die Firma **Optimo**. Adressiert werden gezielt der Vorstand sowie einzelne Fachmitarbeiter.

### 1.2 Die Aufgabe

Eine moderne, webbasierte Präsentation, die Optimo den gesamten Modernisierungsvorschlag von PITapp auf einmal zeigt. Die Seite soll per Link teilbar sein und so den Platz einer klassischen PowerPoint-Präsentation einnehmen – aber deutlich professioneller wirken und zu jedem Zeitpunkt aktuell gehalten werden können.

---

## 2. Ziel der Präsentation

Die Seite soll Optimo ein **zusammenhängendes Modernisierungspaket** zeigen, das aus drei konkreten Angeboten besteht. Drei Leitfragen, die sich der Leser nach dem Durchscrollen beantworten können soll:

1. **Was bietet mir PITapp konkret an?** → Die drei Säulen verständlich gemacht.
2. **Warum jetzt?** → Der Status quo ist an mehreren Stellen alt geworden (20 Jahre alte Außendienst-Software, veraltete Scanner-Lösung, Business Central Version 14). Hier entsteht technische Schuld, die adressiert werden muss.
3. **Warum PITapp?** → Ein einzelner, vertrauter Partner für alle drei Themen statt drei verschiedener Dienstleister.

Die Präsentation verkauft kein einzelnes Produkt, sondern einen **strategischen Gesamtweg**. Das ist die wichtigste Botschaft: Alle drei Säulen gehören zusammen und wirken gemeinsam – die BC-Migration ist dabei das technische Fundament, auf dem die beiden anderen Säulen besonders stark aufsetzen können.

---

## 3. Zielgruppe

### 3.1 Primär: Vorstand der Firma Optimo
- Hat wenig Zeit, will die Kernbotschaft schnell erfassen.
- Denkt in Nutzen, Risiken, Kosten, Zeitplan – nicht in technischen Details.
- Erwartet einen seriösen, ruhigen Auftritt. Alles, was nach „Startup-Landing-Page" aussieht, ist falsch adressiert.

### 3.2 Sekundär: Fachmitarbeiter bei Optimo
- IT-Verantwortliche, Logistik-Leitung, Vertriebsleitung, Außendienstkoordination.
- Diese Gruppe geht bei Interesse in die Tiefe und will nachvollziehen, was technisch gemacht wird und welche Auswirkung es auf den Arbeitsalltag hat.

**Folge für das Design:** Zwei Leseebenen. Oben immer die Kurzaussage (für den Vorstand), darunter die Details (für Fachmitarbeiter). Keine Wand aus Fließtext.

---

## 4. Die drei Säulen im Detail

### 4.1 Säule 1 – Moderne Scanner-App für Business Central

**Ausgangssituation:** Optimo nutzt eine bestehende Scanner-Software im Zusammenspiel mit Business Central. Diese soll durch eine moderne Web-App ersetzt werden.

**Funktionsumfang der neuen App (Stand heute bekannt):**
- **Inventur** – Durchführung der Bestandsaufnahme direkt über mobile Scanner-Geräte.
- **Ladelisten** – Unterstützung bei der LKW-Beladung im Versand.
- **Umlagerungen** – Warenbewegungen zwischen Lagerorten.
- **Artikelinformationen** – direkte Abfrage von Artikelstammdaten am Gerät.
- Weitere Funktionen sind denkbar und können bei Bedarf ergänzt werden.

**Kernbotschaft dieser Säule:** Moderne Web-Technik statt proprietärer Scanner-Client, direkte und nahtlose BC-Anbindung, gerätunabhängig nutzbar.

### 4.2 Säule 2 – Modernes Außendienst-Modul in Business Central

**Ausgangssituation:** Es gibt bereits ein Außendienst-Programm im Einsatz, das allerdings **rund 20 Jahre alt** ist. Funktional noch nützlich, technisch aber am Ende seines Lebenszyklus.

**Zielbild – Architekturentscheidung:** Statt einer eigenständigen Web-App entsteht ein **integriertes Außendienst-Modul direkt in der neuen Business-Central-Version**. Außendienstmitarbeiter erhalten ein eigenes, maßgeschneidertes Rollencenter („Außendienst-Cockpit"), das im BC-Webclient läuft – aufrufbar im Browser auf dem Laptop, sicher über die bestehende VPN-Verbindung. Kein zusätzliches System, kein separates Login, keine doppelte Datenhaltung.

**Begründung der Architektur:** Die Außendienstmitarbeiter bei Optimo arbeiten unterwegs primär mit Laptops, die per VPN ins Firmennetzwerk eingebunden sind – nicht mit Smartphones im Funkloch. Genau für dieses Szenario ist die direkte Integration in Business Central gegenüber einer separaten Web-App klar überlegen: weniger Wartungsaufwand, einheitliche Berechtigungen, durchgängige Datenbasis, kein Schnittstellen-Overhead.

**Funktionsbereiche des Außendienst-Moduls:**

- **Kunden- und Artikelinformationen** – schneller Zugriff auf den eigenen Kundenstamm, Artikelstammdaten, Preise und aktuelle Lagerbestände direkt aus der BC-Datenbasis.
- **Verkaufszahlen und Auswertungen** – Umsätze, Kennzahlen und Entwicklungen pro Kunde und Artikel. Umgesetzt über **eingebettete Power-BI-Reports** im Rollencenter, automatisch gefiltert auf den jeweiligen Außendienstler. Damit deutlich stärkere Visualisierungen, als sie eine klassische Eigenentwicklung leisten könnte.
- **Tagesberichte / Tätigkeitserfassung** – strukturierte Erfassung der täglichen Außendienst-Aktivitäten (Kundenbesuche, Gesprächsinhalte, Notizen, Anhänge). Daten gehören dem jeweiligen Mitarbeiter, Vertriebsleitung sieht aggregiert.
- **Fahrtkosten- und Reisekostenerfassung** – Eingabe von Fahrten, Spesen und Belegen direkt im Modul. Daten landen unmittelbar dort, wo sie buchhalterisch weiterverarbeitet werden – ohne Zwischenexport, ohne separate Schnittstelle.
- **Weitere Auswertungen und Informationen aus dem Firmennetzwerk** – modular erweiterbar, je nachdem, welche Funktionen aus dem alten Außendienst-Programm übernommen werden sollen und welche neuen Anforderungen sich aus dem laufenden Betrieb ergeben.

**Kernbotschaft dieser Säule:** Das tägliche Werkzeug der Außendienstmitarbeiter – modern, übersichtlich, direkt mit der BC-Datenbasis verknüpft. Ein System, ein Login, eine Datenquelle. Kein paralleler Betrieb von Außendienst-App und ERP, sondern echte Integration in die zentrale Plattform.

**Strategischer Bezug zu Säule 3:** Das Außendienst-Modul setzt direkt auf der neuen Business-Central-Version auf. Säule 3 ist damit nicht nur ein technisches Update, sondern die ausdrückliche Voraussetzung dafür, dass Säule 2 in dieser eleganten Form überhaupt umsetzbar ist.

### 4.3 Säule 3 – Migration Business Central (on-prem, neueste Version)

**Ausgangssituation:** Optimo läuft aktuell auf **Business Central Version 14**. Diese Version ist nicht mehr zeitgemäß; eine Migration auf die **neueste Version** ist überfällig.

**Wichtig:** Die Migration erfolgt **on-prem** – also explizit nicht in die Cloud-Variante, sondern auf modernen Servern im Haus bzw. in der von Optimo genutzten Infrastruktur.

**Was PITapp konkret anbietet:**
- Durchführung der Migration Version 14 → aktuelle BC-Version (on-prem).
- Darstellung und Erläuterung der Vorteile der neuen Version (bessere Oberfläche, neue Funktionen, moderne Schnittstellen, längere Wartungszusage).
- Abstimmung mit den ersten beiden Säulen, damit Scanner-App und Außendienst-Modul optimal zur neuen BC-Version passen.

**Kernbotschaft dieser Säule:** Das Fundament, auf dem die Säulen 1 und 2 aufbauen. Die neue BC-Version bringt die moderne Web-Oberfläche, die Schnittstellen und die Erweiterbarkeit mit, die Scanner-App und Außendienst-Modul brauchen. Deshalb in der Präsentation als drittes platziert, technisch aber das Rückgrat des Gesamtpakets.

---

## 5. Tonalität und Designprinzipien

- **Seriös, nicht verspielt.** Keine verrückten Animationen, keine Memes, keine übertriebenen Claims.
- **Modern, aber ruhig.** Viel Weißraum, gute Typografie, zurückhaltende Farbpalette. Lesbarkeit schlägt Effekt.
- **Zwei Leseebenen** (siehe Zielgruppe): erst die Kernaussage, dann die Details.
- **Deutsch.** Alle sichtbaren Texte auf Deutsch.
- **PITapp hilft, Optimo entscheidet.** Ton nicht überheblich, nicht belehrend. Wir zeigen, was möglich ist, und laden zum Gespräch ein.
- **Nicht überfrachten.** Jede Säule bekommt ihre eigene klar erkennbare Sektion, kein Vermischen.

---

## 6. Struktur der Präsentationsseite

Die Seite folgt dieser Reihenfolge (diese Reihenfolge ist bewusst so gewählt: erst das Gesamtbild, dann die drei Säulen, dann der Kontakt):

1. **Hero / Titel**
   Projektname „Optimo Business Central Roadmap", kurzer Untertitel, PITapp als Absender. Einprägsame Einstiegsaussage.

2. **Management Summary**
   Drei bis vier Absätze auf einer Sektion: Was bieten wir an, warum jetzt, was hat Optimo davon. Diese Sektion soll für sich alleine lesbar sein – wenn der Vorstand nichts weiter liest, bleibt diese Sektion hängen.

3. **Säule 1 – Scanner-App**
   Kurzbeschreibung, Funktionsliste, Nutzenargumente.

4. **Säule 2 – Außendienst-Modul in Business Central**
   Kurzbeschreibung, Funktionsliste, Nutzenargumente. Deutlich machen, dass dies der moderne Nachfolger des 20 Jahre alten Bestandsprogramms ist – und dass die Lösung bewusst als integriertes BC-Modul umgesetzt wird, nicht als eigenständige App. Das Argument der einheitlichen Plattform und Datenbasis prominent platzieren.

5. **Säule 3 – BC-Migration**
   Ausgangspunkt (Version 14), Zielbild (aktuelle Version, on-prem), Vorteile der neuen Version. Hier zusätzlich die Verbindung zu Säule 2 erwähnen: Die Migration ist die Voraussetzung dafür, dass das Außendienst-Modul nahtlos integriert werden kann.

6. **Gesamtbild / Roadmap**
   Wie die drei Säulen zusammenspielen. Dass sie einzeln bestellbar sind, aber als Paket den größten Nutzen entfalten. Besonders herausheben: Säule 3 als Fundament, auf dem die anderen beiden besonders stark wirken. Optional: grobe zeitliche Abfolge („erst BC-Migration, dann die Apps darauf" oder parallel denkbar).

7. **Ansprechpartner / Kontakt**
   PITapp als Partner, direkte Ansprechpartner mit Kontaktdaten, Einladung zum Gespräch.

---

## 7. Schreibweise und Terminologie (verbindlich)

- **PITapp** – immer so geschrieben (PIT groß, app klein). Niemals „BitApp", „PitApp", „PIT-App", „PITAPP".
- **Optimo** – als Eigenname unverändert.
- **Business Central** – bei erster Nennung ausgeschrieben, danach darf die Kurzform **BC** verwendet werden.
- **Version 14** – so schreiben (nicht „V14", nicht „14er"), weil das der offizielle Versionsname ist.
- **Scanner-App** – durchgängig so, nicht mal so, mal anders.
- **Außendienst-Modul** – die korrekte Bezeichnung für die Lösung in Säule 2. **Nicht** mehr „Außendienst-Web-App" oder „Außendienst-App", weil es technisch kein eigenständiges Produkt ist, sondern ein Modul innerhalb von Business Central. In marketingnahen Texten ist auch „Außendienst-Cockpit" oder „integrierter Außendienst-Arbeitsplatz" zulässig, sofern an mindestens einer Stelle der Sektion klar gemacht wird, dass es sich um ein BC-Modul handelt.
- **Power BI** – wird im Außendienst-Modul für Auswertungen eingesetzt und darf in der Fachebene erwähnt werden. Für den Vorstand reicht die Aussage „eingebettete moderne Auswertungen".
- **Rollencenter** – Microsoft-BC-Fachbegriff für die Startseite eines Anwenderprofils. In der Fachebene verwendbar, im Vorstandstext besser durch „Cockpit" oder „Arbeitsplatz" ersetzen.
- **„on-prem"** bei der Migration – bewusst so erwähnen, damit der Unterschied zur Cloud-Variante klar ist.

---

## 8. Offene Punkte (müssen später geklärt werden)

Diese Punkte sind absichtlich noch offen und sollen im Laufe des Projekts entschieden werden. Claude Code soll sie **nicht** selbst erfinden, sondern bei den entsprechenden Sektionen Platzhalter setzen und darauf hinweisen.

- **Deadline / Präsentationstermin:** Noch nicht festgelegt.
- **Konkrete Preise / Aufwände:** Noch nicht im Briefing enthalten – werden separat besprochen und nicht notwendigerweise direkt auf der Webseite, sondern evtl. erst im Gespräch gezeigt.
- **Lizenzthematik für Säule 2:** Zu klären, welche BC-Lizenzklasse die Außendienstmitarbeiter benötigen (Essentials vs. Team Member, abhängig vom finalen Funktionsumfang) und ob für die eingebetteten Auswertungen Power-BI-Pro-Lizenzen erforderlich sind. Diese Frage wird **nicht** in der Präsentation auftauchen, sondern im Gespräch besprochen – im Briefing aber bewusst vermerkt.
- **Funktionsumfang aus dem Altprogramm:** Welche Funktionen aus dem 20 Jahre alten Außendienst-Programm sollen 1:1 übernommen, welche überarbeitet, welche gestrichen werden? Wird im Workshop mit Optimo erhoben.
- **Passwortschutz für die Seite:** Nach aktueller Lage ja – die Seite ist nicht für die Öffentlichkeit gedacht, sondern nur für den Vorstand und ausgewählte Mitarbeiter. Umsetzung erfolgt später über Hostinger (z. B. Basic-Auth per `.htaccess`).
- **Logo-Assets:** Logos von Optimo und PITapp müssen als Dateien bereitgestellt werden. Bis dahin nur Text-Platzhalter.
- **Konkrete Screenshots / Mockups der drei Lösungen:** Werden später nachgereicht. Bis dahin neutrale Platzhalter oder stilisierte Darstellungen. Für Säule 2 bietet sich an, einen stilisierten BC-Rollencenter-Screen zu zeigen, sobald die ersten Entwürfe stehen.
- **Ansprechpartner-Daten:** Name, E-Mail, Telefon des oder der PITapp-Ansprechpartner für Optimo.

---

## 9. Was ausdrücklich nicht in die Präsentation gehört

- Keine Aussagen über konkrete Zeitpläne, solange sie nicht im Briefing oder im Gespräch festgelegt wurden.
- Keine konkreten Zahlen zu Einsparungen, ROI oder Ähnlichem, solange diese nicht belegt sind.
- Keine Referenzen auf andere Kunden ohne deren ausdrückliche Freigabe.
- Kein Vergleich mit konkret benannten Wettbewerbern.
- Keine übertriebenen Claims („die beste Scanner-App Österreichs" o. ä.).
- Keine technischen Details zur Lizenzierung (BC-Lizenzklassen, Power-BI-Pro etc.) – das ist Gesprächsthema, nicht Präsentationsinhalt.
- **Keine Bezeichnung von Säule 2 als „eigene App" oder „separate Web-App".** Architektur und Botschaft sind hier bewusst eine andere geworden, die Texte müssen das durchgängig widerspiegeln.

---

## 10. Technische Rahmenbedingungen (zur Kenntnis)

Diese Punkte stehen detailliert in `claude-code-setup-prompt.md` und sind hier nur zur Orientierung erwähnt:

- **Tech-Stack:** Astro + Tailwind CSS + TypeScript.
- **Hosting:** Hostinger (Business-Plan), statischer Output, Deployment via GitHub Actions auf den `deploy`-Branch und von dort per Webhook ins `public_html`.
- **Datenschutz:** Keine externen CDNs für Fonts oder Tracking. Schriften lokal einbinden.