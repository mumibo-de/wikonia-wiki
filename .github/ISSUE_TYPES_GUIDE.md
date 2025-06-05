# 🧭 Issue Types Guide (Wikonia / mumibo.de)

Dieses Dokument beschreibt die acht organisationseinheitlich verwendeten Issue-Typen. Sie helfen bei der systematischen Kategorisierung von Aufgaben, Tickets und Vorhaben über alle Projekte hinweg.

> ⚠️ Farben sind fest durch GitHub vorgegeben (8 Typfarben max).

---

## 🎨 Übersicht

| Typ         | Farbe     | Bedeutung                                                                 | Typischer Einsatz                            | Zugehöriges Template             |
|-------------|-----------|---------------------------------------------------------------------------|----------------------------------------------|----------------------------------|
| **Bug**     | 🔴 Rot     | Fehler, unerwartetes Verhalten, Broken Stuff                              | Defekte, Regressionen                        | `🐞 Bug Report`                  |
| **Feature** | 🟢 Grün    | Neue sichtbare Funktion, Erweiterung, Systemverhalten                     | Erweiterungen, neue Features                 | `🧩 Extension Request` *(teilweise)* |
| **Task**    | 🔵 Blau    | Technisch/organisatorische Umsetzungseinheit                              | Templates bauen, Extension konfigurieren     | `📐 Template-Optimierung`, `⚙️ Konfigurationsfrage` |
| **Refactor**| 🟠 Orange  | Technische Schulden, Wartung, Umbauten ohne neues Verhalten               | Cleanup, Modularisierung, Umstrukturierung   | `📐 Template-Optimierung`        |
| **Config**  | 🩷 Pink    | Änderung an System-, Rechte-, Namespace- oder Servereinstellungen         | `$wgXxx`, Gruppenrechte, Namensräume         | `⚙️ Konfigurationsfrage`         |
| **Docs**    | 🩶 Grau    | Dokumentation schreiben, ergänzen oder verbessern                         | Hilfe, Benutzerinfos, Changelogs             | *(Kein dediziertes Template)*    |
| **Epic**    | 🟣 Lila    | Größeres Vorhaben mit Subtickets, "User Story" oder funktionales Paket    | Feature-Komplex, Einführung neuer Komponenten| `🚧 Feature-Komplex`             |
| **Strategy**| 🟡 Gelb    | Strategische, architektonische oder richtungsweisende Entscheidungen      | Entscheidungen, Diskussionen, Richtlinien    | *(Noch kein dediziertes Template)* |

---

## 🧩 Zuordnung nach Templates

| Template-Name              | Bevorzugter `Issue Type` |
|----------------------------|--------------------------|
| `🐞 Bug Report`             | Bug                      |
| `🧩 Extension Request`      | Feature                  |
| `⚙️ Konfigurationsfrage`    | Config oder Task         |
| `📐 Template-Optimierung`   | Task oder Refactor       |
| `🚧 Feature-Komplex`        | Epic                     |
| *(optional)* `Strategische Entscheidung` | Strategy (noch kein Template) |

---

## 🔗 Hinweis zu Labels

Für spezifischere Themen wie `type: extension`, `area: ui`, `scope: internal` usw. **können zusätzlich Labels verwendet werden** – sie bleiben unabhängig vom `Issue Type`, sind frei definierbar und beliebig farblich markierbar.

---

## 🧠 Best Practices

- Nutze **nur einen Issue Type pro Ticket**
- Templates helfen bei der korrekten Auswahl
- Nicht sicher? Lieber `Task` setzen – kann später angepasst werden
- `Epic`-Tickets dienen nur der Zusammenfassung – die Arbeit steckt in den Subtickets

---

*Letztes Update: 2025-06-05*
