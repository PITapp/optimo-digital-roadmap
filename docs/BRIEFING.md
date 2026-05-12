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

Die Seite soll Optimo ein **zusammenhängendes Modernisierungspaket** zeigen, das aus fünf konkreten Angeboten besteht. Drei Leitfragen, die sich der Leser nach dem Durchscrollen beantworten können soll:

1. **Was bietet mir PITapp konkret an?** → Die fünf Säulen verständlich gemacht.
2. **Warum jetzt?** → Der Status quo ist an mehreren Stellen alt geworden (Business Central Version 14, veraltete Scanner-Lösung, 20 Jahre alte Außendienst-Software, papier- und telefongetriebener Auslieferungsprozess, Etikettentool in Navision 5 ohne Migrationspfad). Hier entsteht technische Schuld, die adressiert werden muss.
3. **Warum PITapp?** → Ein einzelner, vertrauter Partner für alle fünf Themen statt mehrerer Dienstleister.

Die Präsentation verkauft kein einzelnes Produkt, sondern einen **strategischen Gesamtweg**. Das ist die wichtigste Botschaft: Alle fünf Säulen gehören zusammen und wirken gemeinsam – die BC-Migration ist dabei das technische Fundament, auf dem die vier Apps besonders stark aufsetzen können.

---

## 3. Zielgruppe

### 3.1 Primär: Vorstand der Firma Optimo
- Hat wenig Zeit, will die Kernbotschaft schnell erfassen.
- Denkt in Nutzen, Risiken, Kosten, Zeitplan – nicht in technischen Details.
- Erwartet einen seriösen, ruhigen Auftritt. Alles, was nach „Startup-Landing-Page" aussieht, ist falsch adressiert.

### 3.2 Sekundär: Fachmitarbeiter bei Optimo
- IT-Verantwortliche, Logistik-Leitung, Vertriebsleitung, Außendienstkoordination, Fuhrpark- und Versandleitung, Produktion und Markenkennzeichnung.
- Diese Gruppe geht bei Interesse in die Tiefe und will nachvollziehen, was technisch gemacht wird und welche Auswirkung es auf den Arbeitsalltag hat.

**Folge für das Design:** Zwei Leseebenen. Oben immer die Kurzaussage (für den Vorstand), darunter die Details (für Fachmitarbeiter). Keine Wand aus Fließtext.

---

## 4. Die fünf Säulen im Detail

Die Säulen werden auf der Seite in zeitlich-logischer Reihenfolge präsentiert: zuerst das Fundament (BC-Migration), darauf aufbauend die vier Apps für unterschiedliche Nutzergruppen (Lager, Außendienst, Fuhrpark, Produktion/Markenkennzeichnung).

### 4.1 Säule 1 – Migration Business Central (on-prem, neueste Version)

**Ausgangssituation:** Optimo läuft aktuell auf **Business Central Version 14**. Diese Version ist nicht mehr zeitgemäß; eine Migration auf die **neueste Version** ist überfällig.

**Wichtig:** Die Migration erfolgt **on-prem** – also explizit nicht in die Cloud-Variante, sondern auf modernen Servern im Haus bzw. in der von Optimo genutzten Infrastruktur.

**Was PITapp konkret anbietet:**
- Durchführung der Migration Version 14 → aktuelle BC-Version (on-prem).
- Darstellung und Erläuterung der Vorteile der neuen Version (bessere Oberfläche, neue Funktionen, moderne Schnittstellen, längere Wartungszusage).
- Abstimmung mit den vier App-Säulen, damit Scanner-App, Außendienst-App, Versand-App und Etiketten-App optimal zur neuen BC-Version passen.

**Wichtiger Sondereffekt der Migration:** Das in Navision 5 entwickelte Etikettentool für Optimos Produktetiketten lässt sich nicht in die aktuelle BC-Version übernehmen. Es wird durch die Etiketten-App aus Säule 5 ersetzt. Die beiden Säulen gehören in der Roadmap-Logik damit zusammen — die Etiketten-App ist Pflicht-Ersatz, nicht optionaler Ausbau.

**Kernbotschaft dieser Säule:** Das Fundament, auf dem die anderen vier Säulen aufbauen. Die neue BC-Version bringt die moderne Web-Oberfläche, die Schnittstellen (REST/OData) und die Erweiterbarkeit mit, die Scanner-App, Außendienst-App, Versand-App und Etiketten-App brauchen. Deshalb in der Präsentation zuerst platziert: ohne dieses Fundament sind die vier Apps deutlich aufwendiger und teilweise gar nicht sinnvoll umsetzbar.

### 4.2 Säule 2 – Moderne Scanner-App für Business Central

**Ausgangssituation:** Optimo nutzt eine bestehende Scanner-Software im Zusammenspiel mit Business Central. Diese soll durch eine moderne Web-App ersetzt werden.

**Funktionsumfang der neuen App (Stand heute bekannt):**
- **Inventur** – Durchführung der Bestandsaufnahme direkt über mobile Scanner-Geräte.
- **Ladelisten** – Unterstützung bei der **LKW-Beladung im Versand** (vor der Abfahrt, im Lager).
- **Umlagerungen** – Warenbewegungen zwischen Lagerorten.
- **Artikelinformationen** – direkte Abfrage von Artikelstammdaten am Gerät.
- Weitere Funktionen sind denkbar und können bei Bedarf ergänzt werden.

**Abgrenzung zur Versand-App (Säule 4):** Die Scanner-App deckt die **Lagerprozesse** ab – inklusive der Beladung des LKW im Versand. Sobald die Ware den LKW verlässt und auf Tour geht, übernimmt die separate Versand- & Auslieferungs-App aus Säule 4. Beide Werkzeuge greifen reibungslos ineinander, sind aber bewusst getrennt, weil sie unterschiedliche Nutzergruppen, Geräte und Arbeitsumgebungen bedienen.

**Kernbotschaft dieser Säule:** Moderne Web-Technik statt proprietärer Scanner-Client, direkte und nahtlose BC-Anbindung, gerätunabhängig nutzbar.

### 4.3 Säule 3 – Moderne Außendienst-App

**Ausgangssituation:** Es gibt bereits ein Außendienst-Programm im Einsatz, das allerdings **rund 20 Jahre alt** ist. Funktional noch nützlich, technisch aber am Ende seines Lebenszyklus.

**Zielbild – Architekturentscheidung:** Die neue Lösung entsteht **bewusst als eigenständige PITapp-App**, nicht als angepasste Business-Central-Oberfläche. Sie läuft auf Laptop oder Tablet, kommuniziert über definierte Schnittstellen mit Business Central (Kunden- und Artikelstamm, Preise, Bestände, Verkaufszahlen) und ergänzt zusätzlich eigene Funktionen, die ein BC-Frontend nicht abbilden kann.

**Begründung der Architektur (eigene App statt BC-Frontend):**
- **Offline-Fähigkeit** beim Kunden vor Ort, im Keller, in ländlichen Regionen mit schwankender Netzabdeckung. Business-Central-Oberflächen funktionieren mobil nur online.
- **Verkaufsorientierte Bedienung**: Produktgalerie, Bilder, Lagerbestände auf einen Blick, klare Verfügbarkeitsanzeige – das ist in einer BC-Page nicht abbildbar. Eine eigene App lässt sich konsequent auf Verkaufsworkflows optimieren.
- **Optimierte Workflows** für Verkaufsgespräche, Angebotserfassung beim Kunden, digitale Unterschrift.
- **Lizenz- und Update-Stabilität**: Eine eigene App ist von BC-Releases entkoppelt, BC-Updates können keine Anpassungen brechen. Außerdem bräuchte jeder Außendienstler mit BC-Zugriff eine eigene Business-Central-Lizenz – auch wenn er sonst nichts in BC macht.
- **Klare Daten- und Berechtigungstrennung**: Außendienstler sehen genau das, was sie sehen sollen – nichts darüber hinaus.

**Funktionsbereiche der Außendienst-App:**

- **Kunden- und Artikelinformationen** – schneller Zugriff auf den eigenen Kundenstamm, Artikelstammdaten, Preise und aktuelle Lagerbestände aus der BC-Datenbasis.
- **Verkaufszahlen und Auswertungen** – Umsätze, Kennzahlen und Entwicklungen pro Kunde und Artikel, automatisch gefiltert auf den jeweiligen Außendienstler.
- **Tagesberichte / Tätigkeitserfassung** – strukturierte Erfassung der täglichen Außendienst-Aktivitäten (Kundenbesuche, Gesprächsinhalte, Notizen, Anhänge). Daten gehören dem jeweiligen Mitarbeiter, Vertriebsleitung sieht aggregiert.
- **Fahrtkosten- und Reisekostenerfassung** – Eingabe von Fahrten, Spesen und Belegen direkt in der App. Daten werden an BC übergeben und dort buchhalterisch weiterverarbeitet – ohne Zwischenexport, ohne separate Schnittstelle nach außen.
- **Angebotserfassung beim Kunden** – inklusive digitaler Unterschrift, sofort an BC zurückgespielt, sobald wieder Verbindung besteht.
- **Weitere Auswertungen und Informationen** – modular erweiterbar, je nachdem, welche Funktionen aus dem alten Außendienst-Programm übernommen werden sollen und welche neuen Anforderungen sich aus dem laufenden Betrieb ergeben.

**Kernbotschaft dieser Säule:** Das tägliche Werkzeug der Außendienstmitarbeiter – modern, übersichtlich, offline-fähig und konsequent auf den Verkauf zugeschnitten. Eine eigenständige App von PITapp, die mit Business Central spricht, statt eine BC-Oberfläche, die im Verkaufsalltag bremst.

### 4.4 Säule 4 – Versand & Auslieferung

**Ausgangssituation:** Optimo betreibt einen eigenen Fuhrpark mit Auslieferungstouren, die häufig **mehrere Tage** dauern. Die bestehende Versand- und Tourenplanungslösung von Optimo läuft seit Jahren stabil und bleibt unverändert in Betrieb. Was bisher fehlt, ist die **digitale Brücke zwischen Fahrer und Zentrale** während der Tour: aktuell laufen Rückmeldungen, Lieferbestätigungen und Schadensfälle über Papier, Telefon und Nachbearbeitung im Büro.

**Zielbild:** Eine moderne mobile App für die LKW-Fahrer auf Tablet oder Laptop. Tourenbegleiter, Liefernachweis und Kommunikationsbrücke zur Zentrale – in einem Werkzeug, auch ohne Internetverbindung.

**Was die App leistet:**
- Tourenübersicht mit allen Stopps des Tages bzw. der gesamten mehrtägigen Tour
- Lieferdetails pro Stopp: Kunde, Adresse, Artikel, Mengen, Sonderhinweise
- Navigation zum Lieferort mit einem Tippen
- Mengenbestätigung direkt beim Kunden (auch Teilmengen oder Über-/Unterlieferungen)
- Digitale Unterschrift des Kunden auf dem Gerät
- Fotodokumentation (Abstellnachweis, Schadensbilder, ordnungsgemäße Ladungssicherung)
- Kommentar- und Schadensmeldung an die Zentrale
- Statusrückmeldung pro Lieferschein („zugestellt", „teilweise zugestellt", „nicht angenommen") direkt in Business Central und ins Optimo-Versandsystem
- Lademittel- und Palettenkontenführung
- Vollständige **Offline-Fähigkeit**: alles geht auch ohne Netz, Synchronisation erfolgt automatisch, sobald wieder Verbindung besteht

**Was die App bewusst NICHT macht:**
- Keine Tourenplanung / keine Dispositionssoftware – diese Aufgabe bleibt im bestehenden Optimo-Versandsystem.
- Keine Buchhaltung, keine Rechnungsstellung – läuft weiterhin in Business Central.
- Kein Fahrtenschreiber / keine Lenk- und Ruhezeitkontrolle.

**Architektur und Anbindung:** Eigenständige PITapp-Lösung auf Tablet oder Laptop. Sie kommuniziert über definierte Schnittstellen mit Business Central (für Lieferscheindaten, Artikel, Kunden, Statusrückmeldungen) und mit dem bestehenden Optimo-Versandsystem (für Tourdaten). Damit bleibt die Investition in das bestehende Versandsystem erhalten, und die neue mobile Lösung fügt nur das hinzu, was bisher fehlt: die Fahrerseite.

**Begründung der Architektur (eigene App statt BC-Erweiterung):**
- **Offline-Fähigkeit**: Business Central funktioniert mobil nur online. Bei mehrtägigen Touren mit Tunneln, abgelegenen Industriegebieten und schwankender Netzabdeckung wäre das ein echtes Praxisproblem.
- **Bedienung im Fahreralltag**: Eine eigene App lässt sich konsequent auf große Buttons, einfache Workflows und Touch-Bedienung mit Handschuhen optimieren. Business-Central-Oberflächen sind für Sachbearbeiter am Schreibtisch gebaut.
- **Lizenzkosten**: Jeder Fahrer mit BC-Zugriff bräuchte eine eigene Business-Central-Lizenz – auch wenn er sonst nichts in BC macht.
- **Klare Trennung**: Die Versandsoftware bleibt das Tool der Disposition, BC bleibt das ERP, die Fahrer-App ist das Werkzeug auf der Straße. Saubere Verantwortlichkeiten, einfache Updates.

**Nutzen für Optimo:**
- Echtzeit-Information über jede Lieferung, statt Wartezeiten bis zur Tour-Rückkehr
- Lückenlose digitale Nachweise (Unterschrift, Foto, Zeitstempel, Geolokation)
- Weniger Reklamationsstreit, weniger telefonisches Hin und Her
- Keine doppelte Datenerfassung mehr – Lieferpapiere müssen nicht mehr abgetippt werden
- Bessere Datenbasis für Qualitäts- und Reklamationsauswertungen

**Technische Eckdaten:**
- Plattform: Tablet (iOS / Android) und Laptop (Web-Client)
- Offline-Modus mit automatischer Synchronisation
- Schnittstellen: Business Central (REST/OData) und Optimo-Versandsystem
- Entwicklung und Betrieb: PITapp
- Hosting/Datenhaltung: Europäischer Datenraum, DSGVO-konform

**Kernbotschaft dieser Säule:** Die fehlende digitale Brücke zwischen Fahrer und Zentrale – Tourenbegleiter, Liefernachweis und Kommunikationswerkzeug in einer offline-fähigen App. Die bestehende Optimo-Versandsoftware bleibt erhalten; ergänzt wird das, was bisher fehlt: die Fahrerseite.

### 4.5 Säule 5 – Etiketten & Markenkennzeichnung

**Ausgangssituation:** Optimo erzeugt für seine Matratzen und Lattenroste großformatige, farbige Produktetiketten, die direkt auf das fertige Produkt aufgeklebt werden. Diese Etiketten tragen Logos, Markenzeichen, Produkthinweise (zum Beispiel „elektrische Federleiste") und Symbole für Recycling, Pflege und Zertifikate. Heute wird das Etikett für jeden Artikel aus vielen kleinen Bitmap-Bausteinen zusammengesetzt – gesteuert über ein Eigenentwicklungs-Tool in **Navision 5**, das in dieser Form nicht mehr zukunftsfähig ist und in der Migration auf die aktuelle BC-Version **nicht mitgenommen werden kann**. Damit fällt eine eigenständige, produktionskritische Funktion weg – und genau diese Lücke schließt die neue Säule. Die Etiketten-App ist Pflicht-Ersatz, nicht optionaler Ausbau.

**Zielbild:** Eine moderne PITapp-Webanwendung, die die Etiketten parametergesteuert aus einer zentralen Symbol- und Bitmap-Bibliothek zusammensetzt, in einer Live-Vorschau zeigt und an Farbetikettendrucker oder als PDF ausgibt.

**Was die App leistet:**
- Zentrale Bibliothek aller Bitmaps und Symbole: Logos, Markenzeichen, Recycling-, Pflege- und Hinweissymbole
- WYSIWYG-Editor für Etikettenvorlagen mit Live-Vorschau
- Parametergesteuerte Komposition: pro Artikel werden die richtigen Bausteine automatisch eingesetzt
- Druckausgabe an die Farbetikettendrucker bei Optimo, in der gewünschten Menge
- PDF-Ausgabe für Vorschau, Archivierung oder kleine Auflagen
- Auftragswarteschlange mit Mengen, Sortierung und Drucker-Auswahl
- Versionierung der Vorlagen und Druckhistorie – nachvollziehbar, welches Etikett wann in welcher Fassung verwendet wurde

**Was die App bewusst NICHT macht:**
- Keine Artikelstammdatenpflege – das bleibt in Business Central.
- Keine Versand- oder Logistiketiketten – diese werden im BC-Standard bzw. in Säule 4 (Versand & Auslieferung) abgedeckt.
- Keine Grafikbearbeitung der Bitmaps selbst – Logos und Symbole werden weiterhin in den jeweiligen Grafikprogrammen erstellt und nur als fertige Bausteine eingespielt.

**Architektur und Anbindung:** Eigenständige PITapp-Webanwendung. Sie liest Artikel und die etikettenrelevanten Parameter aus Business Central, hält die Bitmap-Bibliothek und die Layout-Vorlagen selbst, setzt das fertige Etikett serverseitig zusammen und gibt es an die Farbdrucker oder als PDF aus. Business Central bleibt das führende System für Artikel- und Etikettenparameter; die Label-App ist das Werkzeug für Gestaltung und Produktion.

**Begründung der Architektur (eigene App statt BC-Erweiterung):**
- **Grafische Komposition**: Business Central und die dort vorhandenen Report-Layouts (RDLC) sind nicht dafür gemacht, viele Bitmap-Bausteine bedingt zu überlagern und in Druckqualität auszugeben. Das ist die Kernaufgabe dieser App – und damit von Anfang an außerhalb der natürlichen Stärken von BC.
- **Bedienoberfläche**: Eine eigene App ermöglicht eine moderne, visuelle Vorschau und einen WYSIWYG-Editor mit echtem Look-and-Feel. Im BC-Client mit Listen und Karten ist das nicht sauber abbildbar.
- **Bitmap-Verwaltung**: Hunderte PNG-Dateien als Symbol- und Bausteinbibliothek lassen sich in einer eigenen Anwendung übersichtlicher pflegen, versionieren und gruppieren als in BC.
- **Klare Trennung**: BC bleibt das ERP mit den Artikel- und Etikettenparametern, die Label-App ist das Markenwerkzeug für Gestaltung und Druck. Saubere Verantwortlichkeiten, einfache Updates.

**Nutzen für Optimo:**
- Geschlossene Lücke nach dem Wegfall des Navision-5-Etikettentools – ohne diese Säule fehlt nach der Migration ein produktionskritisches Werkzeug.
- Schnellere Anlage und Anpassung neuer Etiketten gegenüber der heutigen Bitmap-Bastelei.
- Konsistenter Markenauftritt am fertigen Produkt – nachvollziehbar versionierte Vorlagen, keine Schatten-Excel-Listen mehr.
- Druckhistorie pro Artikel: nachvollziehbar, welches Etikett wann in welcher Fassung gedruckt wurde – relevant für Qualitäts- und Reklamationsfälle.

**Technische Eckdaten:**
- Plattform: Web-Anwendung (Browser auf Bürorechnern und Produktionsterminals)
- Schnittstellen: Business Central (REST/OData) für Artikel- und Etikettenparameter
- Bitmap-Bibliothek und Layout-Vorlagen serverseitig
- Ausgabe: direkter Druck an Farbetikettendrucker, alternativ PDF
- Entwicklung und Betrieb: PITapp
- Hosting/Datenhaltung: Europäischer Datenraum, DSGVO-konform

**Kernbotschaft dieser Säule:** Nachfolger des Navision-5-Etikettentools, das in der Migration nicht mitwandert. Parametergesteuerte Komposition vieler Bitmap-Bausteine zu fertigen Produktetiketten – die Aufgabe, für die Business Central und Standard-Etikettendrucker-Software gleichermaßen nicht gemacht sind.

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

Die Seite folgt dieser Reihenfolge (zeitlich-logisch aufgebaut: erst das Gesamtbild, dann das Fundament, dann die vier Apps, dann der Kontakt):

1. **Hero / Titel**
   Projektname „Optimo Business Central Roadmap", kurzer Untertitel, PITapp als Absender. Einprägsame Einstiegsaussage.

2. **Management Summary**
   Drei bis vier Absätze auf einer Sektion: Was bieten wir an, warum jetzt, was hat Optimo davon. Diese Sektion soll für sich alleine lesbar sein – wenn der Vorstand nichts weiter liest, bleibt diese Sektion hängen.

3. **Säule 1 – BC-Migration**
   Ausgangspunkt (Version 14), Zielbild (aktuelle Version, on-prem), Vorteile der neuen Version. Klar als technisches Fundament positionieren, auf dem die vier App-Säulen aufsetzen. Hinweis aufnehmen, dass das Etikettentool aus Navision 5 in der Migration nicht mitwandert und durch Säule 5 ersetzt wird.

4. **Säule 2 – Scanner-App**
   Kurzbeschreibung, Funktionsliste, Nutzenargumente. Abgrenzung zur Versand-App aus Säule 4 explizit machen: Scanner deckt die Lagerprozesse inkl. LKW-Beladung ab, die Tour selbst übernimmt Säule 4.

5. **Säule 3 – Außendienst-App**
   Kurzbeschreibung, Funktionsliste, Nutzenargumente. Deutlich machen, dass dies der moderne Nachfolger des 20 Jahre alten Bestandsprogramms ist – und dass die Lösung **bewusst als eigenständige PITapp-App** umgesetzt wird, nicht als angepasste BC-Oberfläche. Die Architekturargumente (Offline, UX, Lizenzen, Update-Stabilität, Berechtigungstrennung) prominent platzieren.

6. **Säule 4 – Versand & Auslieferung**
   Kurzbeschreibung, Funktionsblock, „Was die App bewusst nicht macht", Architekturbegründung, Nutzen, Technische Eckdaten. Klar machen: Die bestehende Optimo-Versandsoftware bleibt, ergänzt wird die Fahrerseite.

7. **Säule 5 – Etiketten & Markenkennzeichnung**
   Kurzbeschreibung, Funktionsblock, „Was die App bewusst nicht macht", Architekturbegründung, Nutzen, Technische Eckdaten. Den Zusammenhang mit Säule 1 ausdrücklich machen: Das Navision-5-Etikettentool fällt mit der Migration weg, diese Säule schließt die Lücke. Pflicht-Ersatz, nicht optionaler Ausbau.

8. **Gesamtbild / Roadmap**
   Wie die fünf Säulen zusammenspielen. Dass sie einzeln bestellbar sind, aber als Paket den größten Nutzen entfalten. Besonders herausheben: Säule 1 als Fundament, auf dem die anderen vier besonders stark wirken. Zeitliche Sonderstellung von Säule 5 erwähnen: parallel oder unmittelbar nach der BC-Migration, weil sie produktionskritische Ersatzlösung ist.

9. **Ansprechpartner / Kontakt**
   PITapp als Partner, direkte Ansprechpartner mit Kontaktdaten, Einladung zum Gespräch.

---

## 7. Schreibweise und Terminologie (verbindlich)

- **PITapp** – immer so geschrieben (PIT groß, app klein). Niemals „BitApp", „PitApp", „PIT-App", „PITAPP".
- **Optimo** – als Eigenname unverändert.
- **Business Central** – bei erster Nennung ausgeschrieben, danach darf die Kurzform **BC** verwendet werden.
- **Version 14** – so schreiben (nicht „V14", nicht „14er"), weil das der offizielle Versionsname ist.
- **Scanner-App** – durchgängig so, nicht mal so, mal anders.
- **Außendienst-App** – die korrekte Bezeichnung für die Lösung in Säule 3. Es handelt sich technisch um eine eigenständige PITapp-App, nicht um ein BC-Modul.
- **Versand-App** bzw. **Versand- & Auslieferungs-App** – die korrekte Bezeichnung für die Lösung in Säule 4. Ebenfalls eine eigenständige PITapp-App.
- **Etiketten-App** bzw. **Etiketten- & Markenkennzeichnungs-App** – die korrekte Bezeichnung für die Lösung in Säule 5. Eigenständige PITapp-Webanwendung, Nachfolger des Etikettentools aus Navision 5.
- **Navision 5** – Bezeichnung des Altsystems, in dem das heutige Etikettentool als Eigenentwicklung läuft. Bewusst so schreiben, damit klar ist, dass es sich um die Vorgängergeneration handelt.
- **„on-prem"** bei der Migration – bewusst so erwähnen, damit der Unterschied zur Cloud-Variante klar ist.
- **„offline-fähig"** ist bei Außendienst- und Versand-App ein zentrales Argument und darf in der Vorstandsebene genau so verwendet werden.

---

## 8. Offene Punkte (müssen später geklärt werden)

Diese Punkte sind absichtlich noch offen und sollen im Laufe des Projekts entschieden werden. Claude Code soll sie **nicht** selbst erfinden, sondern bei den entsprechenden Sektionen Platzhalter setzen und darauf hinweisen.

- **Deadline / Präsentationstermin:** Noch nicht festgelegt.
- **Konkrete Preise / Aufwände:** Noch nicht im Briefing enthalten – werden separat besprochen und nicht notwendigerweise direkt auf der Webseite, sondern evtl. erst im Gespräch gezeigt.
- **Funktionsumfang aus dem Altprogramm:** Welche Funktionen aus dem 20 Jahre alten Außendienst-Programm sollen 1:1 übernommen, welche überarbeitet, welche gestrichen werden? Wird im Workshop mit Optimo erhoben.
- **Schnittstellen-Detailtiefe zum Optimo-Versandsystem:** Welche Datenflüsse genau (Tourdaten rein, Statusrückmeldungen raus), welche Frequenz, welches Protokoll. Wird im Technik-Termin mit der Optimo-IT geklärt.
- **Passwortschutz für die Seite:** Nach aktueller Lage ja – die Seite ist nicht für die Öffentlichkeit gedacht, sondern nur für den Vorstand und ausgewählte Mitarbeiter.
- **Logo-Assets:** Logos von Optimo und PITapp müssen als Dateien bereitgestellt werden. Bis dahin nur Text-Platzhalter.
- **Konkrete Screenshots / Mockups der fünf Lösungen:** Werden später nachgereicht. Bis dahin neutrale Platzhalter oder stilisierte Darstellungen.
- **Bitmap-Bibliothek der Etiketten-App:** Die heute in Navision 5 verwendeten Bitmaps müssen aus dem Altsystem extrahiert, gesichtet und für die neue App neu strukturiert werden. Volumen und Qualitätsstand werden im Migrationsworkshop erhoben.
- **Etikettendrucker bei Optimo:** Welche Druckermodelle sind im Einsatz, welche Protokolle (z. B. ZPL, IPL, direkter Druck) müssen unterstützt werden? Wird im Technik-Termin mit der Optimo-Produktion geklärt.
- **Ansprechpartner-Daten:** Name, E-Mail, Telefon des oder der PITapp-Ansprechpartner für Optimo.

---

## 9. Was ausdrücklich nicht in die Präsentation gehört

- Keine Aussagen über konkrete Zeitpläne, solange sie nicht im Briefing oder im Gespräch festgelegt wurden.
- Keine konkreten Zahlen zu Einsparungen, ROI oder Ähnlichem, solange diese nicht belegt sind.
- Keine Referenzen auf andere Kunden ohne deren ausdrückliche Freigabe.
- Kein Vergleich mit konkret benannten Wettbewerbern (auch nicht mit fertigen BC-Apps wie Insight Works Proof of Delivery, Anvaigo Mobile App, BarTender oder NiceLabel – die Entscheidungen gegen diese sind im Entscheidungslog dokumentiert, gehören aber nicht in die Präsentation).
- Keine übertriebenen Claims („die beste Scanner-App Österreichs" o. ä.).
- Keine technischen Details zur Lizenzierung – das ist Gesprächsthema, nicht Präsentationsinhalt.
- Keine polemische Abgrenzung gegen Business Central, wenn die Architekturentscheidungen (Säulen 3, 4 und 5) erklärt werden. Sachlich begründen, nicht angreifen.

---

## 10. Technische Rahmenbedingungen (zur Kenntnis)

Diese Punkte stehen detailliert in `claude-code-setup-prompt.md` und sind hier nur zur Orientierung erwähnt:

- **Tech-Stack:** Astro + Tailwind CSS + TypeScript.
- **Hosting:** Hostinger (Business-Plan), statischer Output, Deployment via GitHub Actions auf den `deploy`-Branch und von dort per Webhook ins `public_html`.
- **Datenschutz:** Keine externen CDNs für Fonts oder Tracking. Schriften lokal einbinden.

---

## 11. Entscheidungslog

Chronologische Entscheidungen, die für die Präsentation und das Gesamtprojekt relevant sind.

### Stand 2026-05-12 – Erweiterung auf vier Säulen, Architekturschwenk Außendienst

- **Neue vierte Säule „Versand & Auslieferung" aufgenommen.** Inhalt: eine offline-fähige PITapp-App für die LKW-Fahrer auf Tablet/Laptop, die mit Business Central und dem bestehenden Optimo-Versandsystem kommuniziert. Die bestehende Versand- und Tourenplanungssoftware bleibt unverändert in Betrieb.
- **Architekturentscheidung Säule 3 (Außendienst) revidiert.** Frühere Annahme: integriertes BC-Modul mit Rollencenter und eingebettetem Power BI. Neue Entscheidung: **eigenständige PITapp-App**, parallel zur Versand-App. Begründung: Offline-Fähigkeit beim Kunden, verkaufsorientierte UX, BC-Lizenzkosten vermeiden, Entkopplung von BC-Releases, klare Berechtigungstrennung. Die App spricht weiterhin direkt mit BC für Stamm- und Bewegungsdaten – aber als API-Konsument, nicht als BC-Oberfläche.
- **Reihenfolge der Säulen auf der Seite umgestellt** auf zeitlich-logisch: BC-Migration zuerst (Fundament), dann Scanner-App, Außendienst-App und Versand-App. Die frühere erzählerische Reihenfolge (BC als „Rückgrat-Finale") wird durch die neue Logik ersetzt: Fundament steht voran, die Apps bauen darauf auf.
- **Geprüft und verworfen: „Mitarbeiter-Ticketsystem in Business Central"** als möglicher weiterer Baustein. Nicht in die Roadmap aufgenommen.
- **Geprüft und verworfen: Einsatz fertiger BC-Apps** für Auslieferung (z. B. Insight Works „Proof of Delivery") und für Außendienst/Auslieferung (z. B. Anvaigo Mobile App). Entscheidung zugunsten einer **Eigenentwicklung durch PITapp**, um eine einheitliche Plattform für Optimo zu schaffen und das Investment langfristig PITapp-seitig zu konsolidieren. Diese Erwägung wird nicht in der Präsentation thematisiert, ist aber als Hintergrund festgehalten.

### Stand 2026-05-12 (Nachtrag) – Erweiterung auf fünf Säulen, Etiketten- & Markenkennzeichnungs-App

- **Neue fünfte Säule „Etiketten & Markenkennzeichnung" aufgenommen.** Inhalt: eine PITapp-Webanwendung, die Optimos großformatige Produktetiketten für Matratzen und Lattenroste parametergesteuert aus einer zentralen Symbol- und Bitmap-Bibliothek zusammensetzt und an Farbetikettendrucker oder als PDF ausgibt. Liest Artikel- und Etikettenparameter aus Business Central, hält Bibliothek und Vorlagen selbst.
- **Bezug zur BC-Migration (Säule 1):** Das heutige Etikettentool ist eine Eigenentwicklung in Navision 5 und lässt sich nicht in die aktuelle BC-Version übernehmen. Die Etiketten-App ist damit **Pflicht-Ersatz** für eine produktionskritische Funktion, nicht optionaler Ausbau. Zeitliche Empfehlung: parallel oder unmittelbar nach der BC-Migration umsetzen.
- **Geprüft und verworfen: Direkte BC-Erweiterung (AL/RDLC)** für die Etikettenerzeugung. Begründung: BC und RDLC sind nicht dafür gemacht, viele Bitmap-Bausteine bedingt zu überlagern und in Druckqualität auszugeben. Außerhalb der natürlichen Stärken von BC.
- **Geprüft und verworfen: Zukauf BarTender oder NiceLabel** mit BC-Connector. Beides ist Industriestandard für Versand- und Barcode-Etiketten aus ERP-Systemen, passt aber nicht zu Optimos parametrischer Komposition vieler kleiner Bausteine je Artikel. Außerdem: laufende Lizenzkosten, Plattformbruch zur PITapp-Strategie eigener Apps.
- **Entscheidung: Eigenentwicklung durch PITapp**, konsistent zu den anderen App-Säulen. Eine einheitliche Plattform für Optimo, Investment bleibt langfristig PITapp-seitig konsolidiert. Diese Erwägung wird nicht in der Präsentation thematisiert, ist aber als Hintergrund festgehalten.
- **Reihenfolge der Säulen auf der Seite unverändert**, neue Säule 5 hinten angehängt: BC-Migration → Scanner-App → Außendienst-App → Versand-App → Etiketten-App. Folgt der Wertschöpfungskette vom Fundament über Lager, Vertrieb und Versand bis zum Markenauftritt am fertigen Produkt.
