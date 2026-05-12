---
order: 4
anchor: "versand"
eyebrow: "Säule 4"
title: "Versand & Auslieferung"
lede: "Eine moderne mobile App für die LKW-Fahrer von Optimo. Tourenbegleiter, Liefernachweis und Kommunikationsbrücke zur Zentrale — in einem Werkzeug, auch ohne Internetverbindung."
situation: "Optimo betreibt einen eigenen Fuhrpark mit Auslieferungstouren, die häufig mehrere Tage dauern. Die bestehende Versand- und Tourenplanungslösung von Optimo läuft seit Jahren stabil und bleibt unverändert in Betrieb. Was bisher fehlt, ist die digitale Brücke zwischen Fahrer und Zentrale während der Tour: aktuell laufen Rückmeldungen, Lieferbestätigungen und Schadensfälle über Papier, Telefon und Nachbearbeitung im Büro."
features:
  - title: "Tourenübersicht"
    description: "Alle Stopps des Tages bzw. der gesamten mehrtägigen Tour auf einen Blick — mit Status pro Stopp und nächster Aktion."
  - title: "Lieferdetails pro Stopp"
    description: "Kunde, Adresse, Artikel, Mengen und Sonderhinweise direkt am Stopp. Navigation zum Lieferort mit einem Tippen."
  - title: "Mengenbestätigung beim Kunden"
    description: "Bestätigung direkt vor Ort — auch Teilmengen, Über- oder Unterlieferungen werden sauber erfasst und sind sofort rückgemeldet."
  - title: "Digitale Unterschrift"
    description: "Der Kunde unterschreibt direkt auf dem Gerät. Unterschrift, Zeitstempel und Geolokation werden zusammen mit dem Lieferschein archiviert."
  - title: "Fotodokumentation"
    description: "Abstellnachweis, Schadensbilder und ordnungsgemäße Ladungssicherung als Foto am Lieferschein — Reklamationen lassen sich nachvollziehbar klären."
  - title: "Kommentar- und Schadensmeldung"
    description: "Fahrer melden Auffälligkeiten und Schäden mit Foto und Text direkt an die Zentrale, statt sie auf Zetteln in der Fahrerkabine zu sammeln."
  - title: "Statusrückmeldung in BC und Versandsystem"
    description: "Pro Lieferschein ein klarer Status („zugestellt“, „teilweise zugestellt“, „nicht angenommen“) — direkt in Business Central und im Optimo-Versandsystem sichtbar."
  - title: "Lademittel- und Palettenkonten"
    description: "Mitgeführte Paletten, Tauschpaletten und Lademittel werden pro Kunde geführt und sauber abgerechnet."
notIncluded:
  - "Keine Tourenplanung und keine Disposition — diese Aufgabe bleibt im bestehenden Optimo-Versandsystem."
  - "Keine Buchhaltung und keine Rechnungsstellung — läuft weiterhin in Business Central."
  - "Kein Fahrtenschreiber und keine Lenk- oder Ruhezeitkontrolle."
keyMessage: "Die fehlende digitale Brücke zwischen Fahrer und Zentrale — Tourenbegleiter, Liefernachweis und Kommunikationswerkzeug in einer offline-fähigen App. Die bestehende Optimo-Versandsoftware bleibt erhalten; ergänzt wird das, was bisher fehlt: die Fahrerseite."
architecture:
  title: "Eigene App, keine Business-Central-Erweiterung — warum"
  intro: "Die App ist eine eigenständige PITapp-Lösung und spricht über Schnittstellen mit Business Central und mit dem bestehenden Optimo-Versandsystem. Vier sachliche Argumente gegen eine reine BC-Erweiterung."
  arguments:
    - title: "Offline-Fähigkeit"
      description: "Business Central funktioniert mobil nur online. Bei mehrtägigen Touren mit Tunneln, abgelegenen Industriegebieten und schwankender Netzabdeckung wäre das ein echtes Praxisproblem. Die App arbeitet offline weiter und synchronisiert automatisch, sobald wieder Verbindung besteht."
    - title: "Bedienung im Fahreralltag"
      description: "Große Buttons, einfache Workflows, Touch-Bedienung mit Handschuhen. Eine eigene App lässt sich konsequent darauf optimieren — Business-Central-Oberflächen sind für Sachbearbeiter am Schreibtisch gebaut."
    - title: "Lizenzkosten"
      description: "Jeder Fahrer mit BC-Zugriff bräuchte eine eigene Business-Central-Lizenz — auch wenn er sonst nichts in BC macht. Eine eigene App vermeidet diese Lizenzen vollständig."
    - title: "Klare Trennung der Systeme"
      description: "Die Versandsoftware bleibt das Tool der Disposition, BC bleibt das ERP, die Fahrer-App ist das Werkzeug auf der Straße. Saubere Verantwortlichkeiten, einfache Updates, keine Verstrickung der Systeme."
techSpecs:
  - label: "Plattform"
    value: "Tablet (iOS / Android) und Laptop (Web-Client)"
  - label: "Betriebsmodus"
    value: "Offline-fähig mit automatischer Synchronisation"
  - label: "Schnittstellen"
    value: "Business Central (REST/OData) und Optimo-Versandsystem"
  - label: "Entwicklung und Betrieb"
    value: "PITapp"
  - label: "Hosting und Datenhaltung"
    value: "Europäischer Datenraum, DSGVO-konform"
galleryLayout: "tablet"
gallery:
  - src: "/mockups/versand-tour.svg"
    alt: "Muster-Screenshot der Tourenübersicht in der Versand-App auf einem Tablet"
    caption: "Tourenübersicht auf dem Tablet — Stoppliste links, Detail und Karte zum aktuellen Stopp rechts."
  - src: "/mockups/versand-lieferschein.svg"
    alt: "Muster-Screenshot eines Lieferscheins mit Mengenbestätigung in der Versand-App auf einem Tablet"
    caption: "Lieferschein — Positionen links, Sonderhinweis, Foto-Dokumentation und Status rechts auf einen Blick."
  - src: "/mockups/versand-unterschrift.svg"
    alt: "Muster-Screenshot der Unterschriftserfassung in der Versand-App auf einem Tablet"
    caption: "Unterschrift — Zusammenfassung und Metadaten links, großzügiges Unterschriftsfeld rechts für saubere Handschrift."
---

<!-- TODO: Optionaler Langtext mit Workflow-Beispiel einer
     mehrtägigen Tour (BRIEFING Kapitel 4.4). Schnittstellen-Details
     zum Optimo-Versandsystem werden im Technik-Termin geklärt
     (siehe BRIEFING Kapitel 8). -->
