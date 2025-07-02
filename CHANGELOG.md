# Wikonia-Changelog

## Version 0.7
Status: intern stabil nicht öffentlich
Datum: 2025-07-02

* ImageMagick-Integration / Upload-Limit: [T37](https://phorge.wikonia.net/T37)
  * Upload-Limit für Bilder im Apache/PHP und MediaWiki auf 20 MB erhöht [T140](https://phorge.wikonia.net/T140)
  * NGINX client_max_body_size gesetzt [T141](https://phorge.wikonia.net/T141)
  * ImageMagick installiert und aktiviert, Thumbnails werden korrekt generiert
* ReCAPTCHA-Integration über ConfirmEdit: [T70](https://phorge.wikonia.net/T70)
  * Fehlerhafte ConfirmEdit-Konfiguration (Namespace, Keys, Variablen) korrigiert
  * Google reCAPTCHA v2 mit korrektem Namespace und funktionierenden API-Keys aktiviert
  * Captcha-Feld erscheint und funktioniert auf Anmeldeseite

## Version 0.6
Status: intern stabil nicht öffentlich
Datum: 2025-06-28
* Installation der Extension: HeaderTabs [T81](https://phorge.wikonia.net/T81)
* Installation der Extension: PageImages [T98](https://phorge.wikonia.net/T98)
* Installation der Extension:Popups -> [T43](https://phorge.wikonia.net/T43)
* Installation und Konfiguration der Extension:MassMessage -> [T41](https://phorge.wikonia.net/T41)
* Neue Benutzergruppe "Confirmed" hinzugefügt, Rechte = "Autoconfirmed"-Gruppe. -> [T66](https://phorge.wikonia.net/T66)

## Version 0.5
Status: intern stabil, nicht öffentlich
Datum: 2025-06-16
* Integration MobileFrontend -> Reaktivierung Miberva Neue (Vorübergehend, bis eigene Anpassungen für MobileDevices geschaffen wurden)
* Austausch nach Redesign des Square-Logos (Asset) für optimierte Darstelllung im Vector 2010 Skin
* Standard-Skin auf Vector-2022 festgelegt

## Version 0.4
Status: intern stabil, nicht öffentlich
Datum: 2025-06-16
* Anpassung der Einstellungen für Temporäre Konten
* CookieConsent installiert und konfiguriert
* Ungenutzte Skins deaktiviert
* WhoisWatching rekonfiguriert

## Version 0.3
Status: intern stabil, nicht öffentlich
Datum: 2025-06-06
* Zusätzlicher Footer-Link für Nutzungsbedingungen
* VisualEditor als Standard gesetzt und in allen relevanten Namepaces aktiviert.
* ModRewrite aktiviert und Einstellungen in der LocalSetttings angepasst.
* Temporäre Konten aktiviert


## Version 0.2
Status: intern stabil, nicht öffentlich
Datum: 2025-06-05

### Änderungen
[01:30] Refaktorierung abgeschlossen
[04:40] Namespace Alias für Modul Namensraum zunächst entfert -> führt zu Fehlern in der Produltivumgebung



## Version 0.1
Status: intern stabil, nicht öffentlich
Datum: 2025-06-04

### Änderungen
[03:14] Scribunto eingebunden, Lua läuft
[04:00] Namespace-Aliase aktiviert
[05:52] LocalSettings finalisiert, Version 0.1 gesetzt
