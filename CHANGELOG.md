# Wikonia-Changelog

## Version 0.11
Status: interm stabil, nicht öffentlich
Datum: 2025-08-05
* Standardeinstellungen für den Vector-Skin definiert, rechtsseitige Menüs eingeklappt. [T309](https://phorge.wikonia.net/T309)
* Installation der Erweiterung `CodeMirror` als verbesserte Darstellungsweise für den Wiki-Editor. [T314](https://phorge.wikonia.net/T314)
* Erlauben zusätzlicher Dateieindungen für den Upload

## Version 0.10
Status: interm stabil, nicht öffentlich
Datum: 2025-08-02
* Umsetzung zusätzliche Schutzstufen und Benutzergruppen [T105](https://phorge.wikonia.net/T105):
 * Sensible Vorlagen und Module schützen, durch neue Schutzstufe `templateprotection`. [T106](https://phorge.wikonia.net/T106)
  * Benutzergruppe `template-master` eingeführt und die entsprechenden Rechte zur Bearbeitung gewährt
  * Recht zur Festlegung des Schutzstatus an Admins `sysop` übertragen.
 * Rechtlich relevante inhalte der Ebtreibergesellschaft durch Schutzstufe `policyprotection` schützbar.  [T107](https://phorge.wikonia.net/T107)
  * Benutzergruppe `policy-editor`eingeführt und die entsprechenden Rechte zur Bearbeitung gewährt.
  * Recht zur Festlegeung des Schutzstatus an Bürkokraten `bureaucrats` übertragen.
* Kleinere Änderungen udn Fixes:
 * Korrektur von Schriebfehlern in den Lizenzkommentaren des MediaUploaders
 * MediaUploader als Standard-Upload-Tool definiert.


## Version 0.9
Status: intern stabil nicht öffentlich
Datum: 2025-07-30
* Alternative: Installation MediaUploader [T155](https://phorge.wikonia.net/T115)
* Entfernen des UploadWizards, siehe Dokumentation und Probleme unter [T155](https://phorge.wikonia.net/T115)

## Version 0.8
Status: intern stabil nicht öffentlich
Datum: 2025-07-29
* Installation der Extension UploadWizzard [T155](https://phorge.wikonia.net/T115)
* Asset FontAwesome wurde final hinzugefügt (nicht bestandteil des Repos)

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
