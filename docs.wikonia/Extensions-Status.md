# 📦 MediaWiki Extension Status (Stand: 2025-06-27)

## ✅ Installiert & Aktiviert

| Extension         | Zweck                        | Ticket / Kommentar               |
|-------------------|-----------------------------|----------------------------------|
| **AbuseFilter**   | Missbrauchsvermeidung       | ersetzt Title-/SpamBlacklist     |
| **ApprovedRevs**  | Freigabe offizieller Seitenversionen | T67 (Rechte), T68 (Config), T69 (Doku) |
| **CategoryTree**  | Hierarchische Kategoriedarstellung |                              |
| **Cargo**         | Strukturierte Datenhaltung   |                                  |
| **CheckUser**     | IP-Prüfung (nur Bürokraten) | Rechte noch bei Bürokraten       |
| **Cite**          | Einfügen von Referenzen     | Zitationsvorlagen fehlen noch    |
| **CiteThisPage**  | Zitatvorschlag für externe Nutzung |                              |
| **CodeEditor**    | Erweiterter Wikitext-Editor |                                  |
| **ConfirmEdit**   | Captcha (z. B. reCAPTCHA v3) | T70 (Umstellung auf reCAPTCHA v3) |
| **DiscussionTools** | UI für Diskussionsseiten  |                                  |
| **DynamicSidebar** | Benutzerabhängige Sidebar  | Seiten müssen noch konfiguriert werden |
| **Echo**          | Benachrichtigungssystem     |                                  |
| **Gadgets**       | Benutzerdefinierte Skripte  |                                  |
| **ImageMap**      | Interaktive Bildverlinkung  |                                  |
| **InputBox**      | Benutzerdef. Such-/Eingabebox |                                |
| **Interwiki**     | Pflege von Interwiki-Links  |                                  |
| **Linter**        | Quelltext-Analyse           |                                  |
| **LoginNotify**   | Warnung bei Login-Versuchen |                                  |
| **Lockdown**      | Namespace-basierte Zugriffsbeschränkung | T71 (Config/Rechte)       |
| **MultimediaViewer** | Lightbox für Medien      |                                  |
| **Nuke**          | Massenlöschung durch Admins |                                  |
| **OATHAuth**      | Zwei-Faktor-Authentifizierung |                                |
| **PageNotice**    | Kontextsensitive Hinweise   |                                  |
| **ParserFunctions** | Erweiterte Parserlogik    |                                  |
| **PdfHandler**    | Einbindung & Vorschau von PDFs | T72 (Funktionstest)           |
| **ReplaceText**   | Globale Textsuche/-ersetzung|                                  |
| **RevisionSlider**| Visueller Vergleich von Versionen |                             |
| **Scribunto**     | Lua-Unterstützung           |                                  |
| **SecureLinkFixer** | HTTPS-Fix für externe Links |                                |
| **SyntaxHighlight_GeSHi** | Syntaxhervorhebung |                                  |
| **TemplateData**  | Parameterhilfe für Vorlagen |                                  |
| **TextExtracts**  | Vorschautexte für Seiten    |                                  |
| **Thanks**        | Danksagungen                |                                  |
| **Translate**     | Sprachversionen, ULS-Integration | T74 (Config)                  |
| **UniversalLanguageSelector** | Sprachauswahl  |                                  |
| **UserMerge**     | Zusammenführung von Konten  |                                  |
| **VisualEditor**  | WYSIWYG-Seiteneditor        |                                  |
| **WikiEditor**    | Klassischer Editor          |                                  |
| **WhoIsWatching** | Anzeige der Beobachterliste | T76 (Rechteprüfung)             |
| **CookieConsent** | Cookie-Einstellungen (EU)   | Texte müssen noch angepasst werden |
| **MobileFrontend**| Verbesserte Darstellung mobil | Vorläufig mit alternativem Skin |
| **MassMessage**   | Systemweite Benachrichtigungen         | T41         |
| **Popups**        | Vorschau bei Hover über Links          | T82         |
| **PageImages**    | Generieren von Vorschaubildern (u.a für Popuos) | T98 |
| **HeaderTabs**    | Registerkarten-Darstellung             | T81         |

---

## 🟡 Geplant / Kommt bald

| Extension         | Zweck                                  | Ticket      |
|-------------------|----------------------------------------|-------------|
| **Moderation**    | Vorschaltkontrolle für neue Benutzer/IPs | T79         |
| **ShortDescription** | Meta-Beschreibung für SEO/Übersicht | T83         |
| **NamespaceRealtions** | Darstellung weiter NS als Tabs      | T99          |

---

## ⏳ Zurückgestellt / Technisch blockiert

| Extension         | Kommentar (Historie / Status / Optionen)             | Ticket    |
|-------------------|------------------------------------------------------|-----------|
| **Citoid**        | Automatisierte Zitatgenerierung. <br>**Historie:** Öffentlicher Dienst eingestellt; Selbsthosting möglich, aber aufwendig. <br>**Optionen:** Citoid selbst hosten oder manuell zitiert; erneut prüfen bei Bedarf/ Ressourcen. | T84       |
| **TorBlock**      | Sperrt Zugriffe aus dem Tor-Netzwerk. <br>**Historie:** Verbindung zu Tor-Exitlisten aktuell nicht möglich. <br>**Optionen:** AbuseFilter als Workaround; regelmäßig auf Updates prüfen. | T85       |
| **StopForumSpam** | Blockiert Spam-Accounts über Blacklists. <br>**Historie:** Schnittstelle aktuell unzuverlässig. <br>**Optionen:** AbuseFilter oder eigene Bot-Lösung prüfen, ggf. später erneut evaluieren. | T86          |

---

## 🚫 Verworfen / Bewusster Verzicht

| Extension           | Grund / Anmerkung                                             |
|---------------------|--------------------------------------------------------------|
| **TitleBlacklist**  | Durch AbuseFilter ersetzt                                    |
| **SpamBlacklist**   | Durch AbuseFilter ersetzt                                    |
| **FlaggedRevs**     | Zu komplex und ressourcenintensiv, langfristig nicht tragfähig|
| **EmailLogger**     | Für den Einsatzzweck irrelevant                              |
| **NewSignupPage**   | Durch eigene Lösung/Workaround ersetzt                       |
| **CookieBanner**    | Durch CookieConsent abgelöst                                 |
| **RenameUser**    | Obsoloet, siet MW 1.40 im Core -> T77          |

