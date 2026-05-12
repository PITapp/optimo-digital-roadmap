---
order: 1
anchor: "bc-migration"
eyebrow: "Säule 1"
title: "Migration Business Central — auf die aktuelle Version, on-prem"
lede: "Das technische Fundament, auf dem die vier nachfolgenden Apps aufbauen. Migration von Version 14 auf die neueste Business-Central-Version, ausdrücklich on-prem."
situation: "Optimo läuft derzeit auf Business Central Version 14 — einer Version, deren Mainstream-Support durch Microsoft bereits im Oktober 2023 ausgelaufen ist. Eine Migration auf die aktuelle Version ist damit nicht nur fachlich, sondern auch sicherheits- und supporttechnisch überfällig. Die Migration erfolgt explizit on-prem, also nicht in die Cloud-Variante, sondern auf moderne Server in der vorhandenen Infrastruktur — die Datenhoheit bleibt vollständig bei Optimo."
features:
  - title: "Modernes Web-Client statt Windows-Client"
    description: "Version 14 war die letzte mit dem alten, lokal installierten Windows-Client. Die aktuelle Version läuft im Browser sowie als App auf Windows, iPad und iPhone — kein Software-Rollout mehr, einheitliche Bedienung im Microsoft-365-Look."
  - title: "Sicherheit und Hersteller-Support"
    description: "Version 14 erhält von Microsoft keinen Mainstream-Support mehr. Die aktuelle on-prem-Version ist bis 13.10.2027 supportiert, mit regelmäßigen Sicherheits- und Cumulative Updates."
  - title: "Saubere Anpassungs-Architektur (AL Extensions)"
    description: "In Version 14 machten C/AL-Anpassungen jedes Update teuer und riskant. Ab der neuen Version sind alle Erweiterungen sauber gekapselte Extensions, die Updates überleben — künftige Updates werden schneller, günstiger und risikoärmer."
  - title: "Eingebettete Power-BI-Dashboards"
    description: "Standard-Reports für Finanzen, Vertrieb und Lager direkt im BC-Rollencenter, ohne Custom-Entwicklung. Geschäftsführung und Bereichsleitung sehen aktuelle Zahlen ohne Excel-Export."
  - title: "Offene Schnittstellen (REST/OData-APIs)"
    description: "Standardisierte, dokumentierte Schnittstellen sind das technische Fundament für die Scanner-App, die Außendienst-App, die Versand-App und die Etiketten-App. In Version 14 nur sehr eingeschränkt vorhanden."
  - title: "Sieben Jahre Funktions-Plus seit Version 14"
    description: "Microsoft hat in jedem Halbjahres-Release Funktionen ergänzt: strukturierte E-Rechnung für gesetzliche Vorgaben, bessere Lager- und Kommissionier-Workflows, modernisiertes Buchhaltungs-Reporting, leistungsfähigere Workflow-Engine."
  - title: "Wegfallendes Etikettentool aus Navision 5"
    description: "Die in Navision 5 entwickelte Eigenlösung für Produktetiketten lässt sich nicht in die aktuelle BC-Version übernehmen. Säule 5 (Etiketten & Markenkennzeichnung) schließt diese Lücke — die beiden Säulen gehören damit zusammen in die Roadmap."
keyMessage: "Das Fundament des Gesamtpakets — zuerst platziert, weil die vier App-Säulen darauf aufsetzen. On-prem bewahrt die volle Datenhoheit und schließt zugleich an die aktive Microsoft-Roadmap an, statt auf einer auslaufenden Version stehenzubleiben."
galleryLayout: "screens"
gallery:
  - src: "/mockups/migration-versionen.svg"
    alt: "Muster-Visualisierung: Versionssprung von Business Central Version 14 auf die aktuelle Version"
    caption: "Versionssprung — von Version 14 auf die aktuelle Version, ausdrücklich on-prem."
  - src: "/mockups/migration-architektur.svg"
    alt: "Muster-Visualisierung: Zielarchitektur nach der Migration"
    caption: "Zielarchitektur — BC als Fundament, Scanner-App, Außendienst-App, Versand-App und Etiketten-App bauen darauf auf."
  - src: "/mockups/migration-vorteile.svg"
    alt: "Muster-Visualisierung: Sechs konkrete Verbesserungen durch die Migration"
    caption: "Was sich ändert — sechs konkrete Verbesserungen, die mit der Migration nutzbar werden."
---

<!-- Vorteile sind in den Frontmatter-Features abgebildet (gerendert
     durch Pillar.astro). Risikobetrachtung und typischer Projektverlauf
     einer BC-Migration ggf. später als eigenes Backup-Dokument, nicht
     als Folieninhalt. -->
