---
order: 5
anchor: "etiketten"
eyebrow: "Säule 5"
title: "Etiketten & Markenkennzeichnung"
lede: "Eine moderne PITapp-Webanwendung, die Optimos großformatige Produktetiketten parametergesteuert aus einer zentralen Symbol- und Bitmap-Bibliothek zusammensetzt — als Nachfolger des Etikettentools aus Navision 5."
situation: "Optimo erzeugt für Matratzen und Lattenroste großformatige, farbige Produktetiketten, die direkt auf das fertige Produkt aufgeklebt werden. Sie tragen Logos, Markenzeichen, Produkthinweise (zum Beispiel „elektrische Federleiste“) und Symbole für Recycling, Pflege und Zertifikate. Heute wird jedes Etikett aus vielen kleinen Bitmap-Bausteinen zusammengesetzt — gesteuert über ein Eigenentwicklungs-Tool in Navision 5, das in dieser Form nicht zukunftsfähig ist und in der Migration auf die aktuelle Business-Central-Version nicht mitwandert. Damit fällt eine produktionskritische Funktion weg. Die Etiketten-App schließt diese Lücke — sie ist Pflicht-Ersatz, nicht optionaler Ausbau."
features:
  - title: "Symbol- und Bitmap-Bibliothek"
    description: "Zentrale, gepflegte Bibliothek aller Bausteine: Logos, Markenzeichen, Recycling-, Pflege- und Hinweissymbole. Versioniert, gruppiert, suchbar."
  - title: "WYSIWYG-Editor mit Live-Vorschau"
    description: "Etikettenvorlagen werden visuell aufgebaut. Was im Editor steht, druckt der Drucker — ohne Umweg über RDLC-Reports oder externe Grafikprogramme."
  - title: "Parametergesteuerte Komposition"
    description: "Pro Artikel werden die richtigen Bausteine automatisch eingesetzt — Größe, Härtegrad, Zertifikate, Hinweistexte. Eine Vorlage statt hundert Einzeldateien."
  - title: "Druck und PDF-Ausgabe"
    description: "Direkter Druck an die Optimo-Farbetikettendrucker in der gewünschten Menge, alternativ PDF für Vorschau, Archivierung oder Kleinauflagen."
  - title: "Auftragswarteschlange"
    description: "Mengen, Sortierung und Drucker-Auswahl in einer übersichtlichen Liste. Mehrere Aufträge parallel, Status pro Auftrag, Wiederaufnahme bei Druckerstörung."
  - title: "Versionierung und Druckhistorie"
    description: "Vorlagen werden versioniert. Pro Artikel nachvollziehbar, welches Etikett wann in welcher Fassung gedruckt wurde — relevant für Qualitäts- und Reklamationsfälle."
notIncluded:
  - "Keine Artikelstammdatenpflege — die bleibt in Business Central."
  - "Keine Versand- oder Logistiketiketten — diese werden im BC-Standard bzw. in Säule 4 (Versand & Auslieferung) abgedeckt."
  - "Keine Grafikbearbeitung der Bitmaps selbst — Logos und Symbole werden weiterhin in den jeweiligen Grafikprogrammen erstellt und nur als fertige Bausteine eingespielt."
keyMessage: "Nachfolger des Navision-5-Etikettentools, das in der Migration nicht mitwandert. Parametergesteuerte Komposition vieler Bitmap-Bausteine zu fertigen Produktetiketten — eine Aufgabe, für die Business Central und Standard-Etikettendrucker-Software gleichermaßen nicht gemacht sind."
architecture:
  title: "Eigene App, keine Business-Central-Erweiterung — warum"
  intro: "Die App ist eine eigenständige PITapp-Webanwendung. Sie liest Artikel und Etikettenparameter aus Business Central, hält Bitmap-Bibliothek und Vorlagen selbst und gibt fertige Etiketten an die Farbdrucker aus. Vier sachliche Gründe gegen die naheliegende BC-Erweiterung."
  arguments:
    - title: "Grafische Komposition"
      description: "Business Central und seine Report-Layouts (RDLC) sind nicht dafür gemacht, viele Bitmap-Bausteine bedingt zu überlagern und in Druckqualität auszugeben. Genau das ist die Kernaufgabe dieser App — und damit außerhalb der natürlichen Stärken von BC."
    - title: "Bedienoberfläche"
      description: "Eine eigene App ermöglicht einen WYSIWYG-Editor mit echter Live-Vorschau. Im BC-Client mit Listen und Karten ist das nicht sauber abbildbar — und Mitarbeiter im Markenmanagement brauchen genau diese visuelle Arbeitsweise."
    - title: "Bitmap-Verwaltung"
      description: "Hunderte PNG-Dateien als Symbol- und Bausteinbibliothek lassen sich in einer eigenen Anwendung übersichtlicher pflegen, versionieren und gruppieren als in BC."
    - title: "Klare Trennung"
      description: "BC bleibt das ERP mit Artikel- und Etikettenparametern, die Label-App ist das Markenwerkzeug für Gestaltung und Druck. Saubere Verantwortlichkeiten, einfache Updates, keine BC-Modifikationen, die spätere Releases erschweren."
techSpecs:
  - label: "Plattform"
    value: "Web-Anwendung (Browser auf Bürorechnern und Produktionsterminals)"
  - label: "Schnittstellen"
    value: "Business Central (REST/OData) für Artikel und Etikettenparameter"
  - label: "Bibliothek und Vorlagen"
    value: "Serverseitige Verwaltung, Versionierung, Druckhistorie"
  - label: "Ausgabe"
    value: "Direkter Druck an Farbetikettendrucker, alternativ PDF"
  - label: "Entwicklung und Betrieb"
    value: "PITapp"
  - label: "Hosting und Datenhaltung"
    value: "Europäischer Datenraum, DSGVO-konform"
galleryLayout: "laptop"
gallery:
  - src: "/mockups/etiketten-editor.svg"
    alt: "Muster-Screenshot des Etiketten-Editors auf einem Laptop"
    caption: "WYSIWYG-Editor — Symbol-Palette links, Live-Vorschau des fertigen Etiketts in der Mitte, Parameter und Bausteine rechts."
  - src: "/mockups/etiketten-bibliothek.svg"
    alt: "Muster-Screenshot der Symbol- und Bitmap-Bibliothek auf einem Laptop"
    caption: "Bibliothek — alle Bausteine in einer Übersicht, gruppiert nach Kategorie, mit Suche, Filter und Versionsinfo."
  - src: "/mockups/etiketten-fertig.svg"
    alt: "Muster-Vorschau eines fertigen Optimo-Produktetiketts im Hochformat"
    caption: "Fertiges Etikett — wie es nach dem Druck aussieht: Marken-Block, Symbol-Reihe, Hinweistext und Artikel-Identifikation."
    layout: "label"
---

<!-- TODO: Optionaler Langtext mit einem konkreten Workflow-Beispiel
     (BRIEFING Kapitel 4.5): neuer Artikel in BC angelegt → Etiketten-App
     zieht Parameter → Vorlage komponiert das Etikett → Druckauftrag
     an den Farbdrucker. Vergleich zur heutigen manuellen Bitmap-
     Komposition in Navision 5. Bis dahin tragen die Frontmatter-Felder
     den Inhalt. -->
