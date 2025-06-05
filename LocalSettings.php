<?php
/**
 * LocalSettings.php
 * Diese Datei ist die zentrale Konfigurationsdatei für das Wikonia-Wiki.
 * Sie wird von MediaWiki automatisch geladen, wenn die Seite aufgerufen wird.
 * * Diese Version ist für die Produktionsumgebung gedacht und enthält
 *   Sicherheits- und Konfigurationseinstellungen, die für den Betrieb des Wikis
 *  erforderlich sind.
 * Produktivversion ab 2025-06-05
 * Git-Tag: v0.2
 */


 
/** Debugging
 * Diese Einstellungen sind nur für die Entwicklungsumgebung gedacht.
 * In der Produktionsumgebung sollten sie deaktiviert sein,
 */
 ##error_reporting(E_ALL);
 ##ini_set("display_errors", 1);


/** Schutzmechanismen und Universalisierung der LocalSettings
 * Diese Datei ist die zentrale Konfigurationsdatei für das Produduktiv-Wiki.
 * Sie wird von MediaWiki automatisch geladen, wenn die Seite aufgerufen wird.
 */

 /* Verhinderung des direkten Aufrufs dieser Datei */
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


/** Einbinden der richtigen Secrets und Univeralisierung
 * Die Konfiguration der Datenbank und anderer
 * sicherheitsrelevanter Einstellungen wird in einer separaten Datei
 * gespeichert, die je nach Umgebung (Entwicklung, Staging, Produktion)
 * unterschiedliche Werte enthält. 
 * 
 * Die Datei muss im gleichen Verzeichnis wie diese LocalSettings.php liegen
 * und den Namen "secrets.{env}.php" haben, wobei {env} die Umgebung ist.
 * 
 * Zum Beispiel: secrets.dev.php, secrets.staging.php, secrets.prod.php.
 * Die Secrets-Datei enthält ein Array mit den Konfigurationswerten,
 * das in der Variable $mySecrets gespeichert wird.
 * 
 * Diese Datei sollte nicht im Quellcode-Repository gespeichert werden,
 * sondern nur auf dem Server vorhanden sein, um die Sicherheit zu gewährleisten.
 */

$host = $_SERVER['HTTP_HOST'];
$env = null;

switch (true) {
  case str_contains($host, 'localhost'):
  case str_contains($host, 'dev'):
    $env = 'dev';
    break;

  case str_contains($host, 'staging'):
    $env = 'staging';
    break;

  default:
    $env = 'prod';
    break;
}

$secretFile = __DIR__ . "/secrets.$env.php";

if (!file_exists($secretFile)) {
  die("Konfiguration nicht vorhanden oder Zugriff verweigert.");
}

require_once $secretFile;



/** Allgemeine Konfiguration
 * Diese Einstellungen sind für die grundlegende Funktionalität und das Aussehen des Wikis verantwortlich.
 * Sie sollten an die Bedürfnisse des Wikis angepasst werden.
 */

$wgSitename = "Wikonia";  // Der Name des Wikis, der auf der Hauptseite und in der Kopfzeile angezeigt wird.

$wgScriptPath = "";     // Der Pfad zum Wiki-Skript, für die URL-Struktur. Wir nutzen Root-URL, daher leer.
$wgArticlePath = "/$1"; // Artikelpfad, der für die URL-Struktur verwendet wird, falls das Wiki im Root-Verzeichnis liegt. Dies ermöglicht saubere URLs ohne "index.php".
$wgUsePathInfo = true;  // Aktivieren von URL-Rewriting, um saubere URLs zu ermöglichen. Dies ist wichtig für die Benutzerfreundlichkeit und SEO.

$wgServer = "https://wiki.wikonia.net"; // Die Basis-URL des Wikis, die für Links und Weiterleitungen verwendet wird.

$wgResourceBasePath = $wgScriptPath;  // Der Basis-Pfad für Ressourcen wie CSS, JavaScript und Bilder. Normalerweise gleich $wgScriptPath.

$wgPingback = true; // Ermöglicht das Senden von Pingbacks, wenn Seiten verlinkt werden.

$wgLanguageCode = "de"; // Die Standardsprache des Wikis. Hier auf Deutsch gesetzt.

$wgLocaltimezone = "UTC"; // Zeitzone des Wikis, die für die Anzeige von Datums- und Zeitangaben verwendet wird. Hier auf UTC gesetzt.

$wgDiff3 = "/usr/bin/diff3"; // Setzen des Pfads zur diff3-Anwendung, die für die Konfliktauflösung verwendet wird. Muss auf dem Server installiert sein.

/* Branding */
//BUG: #14 Logo, Claim und Wortmarke in Vector-2022 nicht sauber gesetzt.
$wgFavicon = "$wgResourceBasePath/wikonia-assets/favicon/favicon.ico"; // Das Favicon, das im Browser-Tab angezeigt wird. Hier auf das Wikonia-Logo gesetzt.
$wgAppleTouchIcon = "$wgResourceBasePath/wikonia-assets/favicon/apple-touch-icon.png"; // Das Apple Touch Icon, das auf iOS-Geräten verwendet wird.
$wgLogos = [
	'1x' => "$wgResourceBasePath/wikonia-assets/logo/LogoSquareFull.svg", // Logo in 1x Auflösung
  #'1.5x' => "$wgResourceBasePath/wikonia-assets/logo/LogoSquare.svg", // Logo in 1.5x Auflösung
  #'2x' => "$wgResourceBasePath/wikonia-assets/logo/LogoSquare.svg", // Logo in 2x Auflösung
  'svg' => "$wgResourceBasePath/wikonia-assets/logo/LogoSquare.svg", // SVG-Logo für skalierbare Grafiken
	'icon' => "$wgResourceBasePath/wikonia-assets/logo/Signet.svg", // Icon ohne Wortmarke
  'wordmark' => [
    'src' => "$wgResourceBasePath/wikonia-assets/banner/Brandname.svg", // Wortmarke, die im Logo verwendet wird
    #'1x' => "$wgResourceBasePath/wikonia-assets/banner/Brandname.svg", // Wortmarke in 1x Auflösung
    'height' => 30, // Höhe der Wortmarke in Pixeln
    'width' => 200, // Breite der Wortmarke in Pixeln
  ],
  'tagline' => [
    'src' => "$wgResourceBasePath/wikonia-assets/banner/Claim.svg", // Tagline, die im Logo verwendet wird
    #'1x' => "$wgResourceBasePath/wikonia-assets/banner/Tagline.svg", // Tagline in 1x Auflösung
    'height' => 18, // Höhe der Tagline in Pixeln
    'width' => 200, // Breite der Tagline in Pixeln
  ],
  #'wordmark' => "$wgResourceBasePath/resources/assets/change-your-logo.svg", // Wortmarke, die im Logo verwendet wird
];

/** E-Mail und Benachrichtungeinstellungen
 * Diese Einstellungen steuern die E-Mail-Benachrichtigungen und die Kommunikation zwischen Benutzern.
 */

$wgEmergencyContact = "admin@wikonia.net";  // E-Mail-Adresse, an die Notfallbenachrichtigungen gesendet werden.
$wgPasswordSender = "no-reply@wikonia.net";   // E-Mail-Adresse, die als Absender für Passwort- und Benachrichtigungs-E-Mails verwendet wird.

# Absenderadresse (sichtbar für Empfänger)
$wgPasswordSender = $mySecrets['smtp_user']; // E-Mail-Adresse die zum Versand benutzt wird.
$wgPasswordSenderName = "Wikonia System";


# SMTP-Konfiguration (Mailcow)
$wgSMTP = [
    'host'     => 'mail.wikonia.net',     // oder interner Hostname
    'IDHost'   => 'wikonia.net',          // wird als HELO gesendet
    'port'     => 587,
    'auth'     => true,
    'username' => $mySecrets['smtp_user'], // E-Mail-Adresse des Postfachs 
    'password' => $mySecrets['smtp_pass'], // Passwort für das Postfach
    'secure'   => 'tls'                  // STARTTLS
];


$wgEnableEmail = true;        // Ermöglicht das Senden und Empfangen von E-Mails über das Wiki.   
$wgEnableUserEmail = true;    // Ermöglicht Benutzern, E-Mails an andere Benutzer zu senden.

$wgEnotifUserTalk = true;   // Benachrichtigt Benutzer per E-Mail, wenn sie auf ihrer Diskussionsseite angesprochen werden.
$wgEnotifWatchlist = true; // Benachrichtigt Benutzer per E-Mail, wenn eine Seite auf ihrer Beobachtungsliste geändert wird.
$wgEmailAuthentication = true;  // E-Mail-Authentifizierung aktivieren, um sicherzustellen, dass E-Mails von echten Benutzern gesendet werden.

/** Datenbank Einstellungen
 * Diese Einstellungen sind für die Verbindung zur Datenbank verantwortlich,
 * in der die Wiki-Inhalte gespeichert werden.
 * Sie sind aus der secrets.php-Datei geladen, die sensible Informationen enthält.
 */

/* Verbindung zur Datenbank */
$wgDBtype = "mysql";
$wgDBserver = $mySecrets['DBserver'];
$wgDBname = $mySecrets['DBname'];
$wgDBuser = $mySecrets['DBuser'];
$wgDBpassword = $mySecrets['DBpassword'];

/* Worgaben zur Datenbankstruktur und Verschlüsselung und Tabellen*/
$wgDBprefix = $mySecrets['DBprefix'];
$wgDBssl = false;

$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

/* Gemeinsame Datenbank */

$wgSharedTables[] = "actor";  // Zur Zeit noch nicht implementiert, aber für zukünftige Erweiterungen gedacht.

$wgSecretKey = $mySecrets['SecretKey']; // Ein geheimer Schlüssel, der für die Verschlüsselung und Sicherheit des Wikis verwendet wird. Muss in der secrets.php definiert sein.

$wgUpgradeKey = $mySecrets['UpgradeKey'];  // Ein Schlüssel, der für die Aktualisierung des Wikis verwendet wird. Muss in der secrets.php definiert sein.

/** Dateisystem Einstellungen
 * Diese Einstellungen steuern, wo Mediendateien (Bilder, Videos, etc.) gespeichert werden.
 * Sie sollten an die Serverumgebung und die Anforderungen des Wikis angepasst werden.
 */

$wgEnableUploads = true;  // Ermöglicht das Hochladen von Bildern und Dateien ins Wiki.
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

$wgUseInstantCommons = true; // Ermöglicht die Verwendung von Bildern aus Wikimedia Commons, um Speicherplatz zu sparen und die Nutzung von Medien zu erleichtern.

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

/** Caching Einstellungen
 * Diese Einstellungen steuern das Caching von Inhalten, um die Leistung des Wikis zu verbessern.
 * Sie sollten an die Serverumgebung und die Anforderungen des Wikis angepasst werden.
 */

$wgMainCacheType = CACHE_ACCEL;   // Der Hauptcache-Typ, der für die Speicherung von Seiteninhalten verwendet wird.
$wgMemCachedServers = [];   // Liste von Memcached-Servern, die für das Caching verwendet werden können. Hier leer, da kein Memcached verwendet wird.

#$wgCacheDirectory = "$IP/cache"; // Verzeichnis für den Cache. Hier auskommentiert, da kein lokaler Cache verwendet wird.

/** Rechte und Lizenzen
 * Diese Einstellungen steuern die Rechte und Lizenzen für die Inhalte des Wikis.
 * Sie sollten an die Anforderungen des Wikis angepasst werden.
 */

$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by-sa/4.0/";
$wgRightsText = "Creative Commons „Namensnennung – Weitergabe unter gleichen Bedingungen“";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/cc-by-sa.png";


/** Skins
 * Diese Einstellungen laden die verschiedenen Skins, die für das Wiki verfügbar sind.
 */

$wgDefaultSkin = "vector";    // Der Standard-Skin, der für das Wiki verwendet wird. Hier "vector" als Standard.

wfLoadSkin( 'MinervaNeue' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );


/**
 * Extenions aus dem Installer
 * Nur zwingend notwendige Konfiguration hier, 
 * weitere Konfig insbedsondere:
 * Userrechte -> Abschnitt Rechte
 * Cave: Anhängigkeiten beachten, soweit möglich als Kommentar angegeben.
 */

wfLoadExtension( 'AbuseFilter' );
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'Cite' );
wfLoadExtension( 'CiteThisPage' );
wfLoadExtension( 'CodeEditor' );
wfLoadExtension( 'ConfirmEdit' );
wfLoadExtension( 'DiscussionTools' );
wfLoadExtension( 'Echo' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'Linter' );
wfLoadExtension( 'LoginNotify' );
wfLoadExtension( 'MultimediaViewer' );
wfLoadExtension( 'Nuke' );
wfLoadExtension( 'OATHAuth' );
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'ReplaceText' );
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';
wfLoadExtension( 'SecureLinkFixer' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TemplateData' );
wfLoadExtension( 'TextExtracts' );
wfLoadExtension( 'Thanks' );
wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'WikiEditor' );


/**
 * Zusätzliche Extensions
 * Nur zwingend notwendige Konfiguration hier, 
 * weitere Konfig insbedsondere:
 * Userrechte -> Abschnitt Rechte
 * Cave: Anhängigkeiten und reihenfolge beachten, soweit möglich als Kommentar angegeben.
 */

wfLoadExtension( 'Lockdown' );				// Aussperren aus Namensräumen und Seiten für feingranulare Zugangverwaltung

wfLoadExtension( 'CheckUser' );				// Checkuser: IPs nachschauen
wfLoadExtension( 'Cargo' );				// Speichern strukturierter Daten für Artikel
wfLoadExtension( 'ApprovedRevs' );			// Nur die letzte Version eines Beitrags wird freigegeben.
wfLoadExtension( 'UserMerge' );				// Benutzerkonen vereinen (und mit Trick 17 löschen)
wfLoadExtension( 'RevisionSlider' );			// Bessere Dartellung Revisionsverläufe
wfLoadExtension( 'WhoIsWatching' );			// Anzeigen, wer eine Seite beobachtet
wfLoadExtension( 'PageNotice' );			// Hinweisbanner pro Namensraum / Seite
wfLoadExtension( 'DynamicSidebar' );			// Benutzerspezifische Seitenleist
wfLoadExtension( 'UniversalLanguageSelector' );		// Anhängigkeit für Translate
wfLoadExtension( 'Translate' );      // Übersetzungs-Extension, die auch die MediaWiki-UI übersetzt



/** Extensions - Konfiguration
 * Setzen allgemein gültiger Konfiguration
 * nicht Benutzer, bzw- Rechte.
 */

$wgVisualEditorEnableWikitext = true; // Aktiviert die Bearbeitung im Quelltextmodus im VisualEditor, um den Benutzern die Möglichkeit zu geben, den Quelltext direkt zu bearbeiten.
$wgVisualEditorEnableToolbar = true; // Aktiviert die Werkzeugleiste im VisualEditor, um die Bearbeitung zu erleichtern.

$wgDefaultUserOptions['visualeditor-enable'] = 1; // Standardmäßig den VisualEditor aktivieren, wenn er verfügbar ist.
$wgHiddenPrefs[] = 'visualeditor-enable'; // Keine Beta-Spielchen
$wgVisualEditorUseSingleEditTab = true; // Aktiviert den einzelnen Bearbeiten-Tab für den VisualEditor, anstatt zwischen Quelltext und VisualEditor zu wechseln.

/**
 * Parsoid - Konfiguration
 * Diese Einstellungen sind für die Parsoid-Integration erforderlich,
 */
$wgVisualEditorParsoidAutoConfig = true;
$wgVirtualRestConfig['modules']['parsoid'] = [];

/** Lockdown */

// Nur Admins dürfen Spezialseite "Version" sehen
$wgSpecialPageLockdown['Version'] = [ 'sysop' ];

/** ApprovedRevions
 * 
 */

$wgApprovedRevsEnable = true;                     // Aktivieren der Funktion
$wgApprovedRevsNamespaces = [ NS_MAIN, NS_HELP ]; // nur im Haupt- und Hilfenamensraum
$wgApprovedRevsEnableReview = true;               // Freigabe von Revisionen aktivieren
$wgApprovedRevsEnableAuto = true;                 // Automatische Freigabe der letzten Revision aktivieren  
$wgApprovedRevsEnableAutoOnSave = true;           // Automatische Freigabe der letzten Revision beim Speichern aktivieren
$wgApprovedRevsEnableAutoOnMove = true;           // Automatische Freigabe der letzten Revision beim Verschieben aktivieren
$wgApprovedRevsEnableAutoOnMoveToNew = true;      // Automatische Freigabe der letzten Revision beim Verschieben in einen neuen Artikel aktivieren
$wgApprovedRevsEnableAutoOnEdit = true;           // Automatische Freigabe der letzten Revision beim Bearbeiten aktivieren
$wgApprovedRevsEnableAutoOnEditToNew = true;      // Automatische Freigabe der letzten Revision beim Bearbeiten in einen neuen Artikel aktivieren   
$wgApprovedRevsUseVisualEditor = true;
$wgApprovedRevsUseVisualEditorOnEdit = true;      // VisualEditor beim Bearbeiten verwenden
$wgApprovedRevsUseVisualEditorOnMove = true;      // VisualEditor beim Verschieben verwenden

/** NAMESPACES 
 * Definition zusätzlichen Namensräume und Alias
 */

 /* Öffentliche zusätzlich Namensräume */

define("NS_PORTAL", 100);
define("NS_PORTAL_TALK", 101);
$wgExtraNamespaces[NS_PORTAL] = "Portal";
$wgExtraNamespaces[NS_PORTAL_TALK] = "Portal_Diskussion";
$wgNamespacesWithSubpages[NS_PORTAL] = true; // Portal kann Unterseiten haben



define("NS_ECHO", 301);
define("NS_ECHO_TALK", 302);
$wgExtraNamespaces[NS_ECHO] = "Echo";
$wgExtraNamespaces[NS_ECHO_TALK] = "Echo_Diskussion";

define("NS_PROBLEME", 303);
define("NS_PROBLEME_TALK", 304);
$wgExtraNamespaces[NS_PROBLEME] = "Probleme";
$wgExtraNamespaces[NS_PROBLEME_TALK] = "Probleme_Diskussion";

/** Interne zusätzliche Namensräume
 * Diese Namensräume sind nur für interne Zwecke gedacht
 * und sollen nicht von allen Benutzern verwendet werden.
 * Sie sind nicht im Menü sichtbar und sollten auch nicht
 * in der Suche auftauchen.
 */

define("NS_PORTALINTERN", 350);
define("NS_PORTALINTERN_TALK", 351);
$wgExtraNamespaces[NS_PORTALINTERN] = "PortalIntern";
$wgExtraNamespaces[NS_PORTALINTERN_TALK] = "PortalIntern_Diskussion";
$wgNamespacesWithSubpages[NS_PORTALINTERN] = true; // PortalIntern kann Unterseiten haben

define("NS_TEAM", 352);
define("NS_TEAM_TALK", 353);
$wgExtraNamespaces[NS_TEAM] = "Team";
$wgExtraNamespaces[NS_TEAM_TALK] = "Team_Diskussion";
$wgNamespacesWithSubpages[NS_TEAM] = true; // Team kann Unterseiten haben

define("NS_INTERN", 354);
define("NS_INTERN_TALK", 355);
$wgExtraNamespaces[NS_INTERN] = "Intern";
$wgExtraNamespaces[NS_INTERN_TALK] = "Intern_Diskussion";
$wgNamespacesWithSubpages[NS_INTERN] = true; // Intern kann Unterseiten haben

/* Namensräume verstecken */

$wgNamespaceProtection[NS_ECHO_TALK] = [ 'never' ];
$wgNamespaceProtection[NS_INTERN_TALK] = [ 'never' ];
$wgNamespaceContentModels[NS_ECHO_TALK] = 'wikitext'; // nötig für saubere Darstellung

/** Alias für Namensräume */

$wgNamespaceAliases += [
	'Projekt' 					=> NS_PROJECT,			    // Für Verwirrte und Hardliner
  'Projekt_Diskussion' 		=> NS_PROJECT_TALK,	
  'Benutzerin' 				=> NS_USER,				      // Gendern "light"
	'Benutzerin_Diskussion' 	=> NS_USER_TALK,	// Gendern "light" (aber konsequent)
	'Problemlösung' 			=> NS_PROBLEME,			  // Die Langform
	'Problemlösung_Diskussion' 	=> NS_PROBLEME_TALK,  
	 
	// Shortcuts für Tippfaule
  'W' 	=> NS_PROJECT,
  'H' 	=> NS_HELP,
	'K' 	=> NS_CATEGORY,
  'V' 	=> NS_TEMPLATE,
	'PL' 	=> NS_PROBLEME,  
  'Int' => NS_INTERN,
  'E' 	=> NS_ECHO, 
	'MW' 	=> NS_MEDIAWIKI
	];

/**
 * Content-Namensräume
 * Diese Namensräume sind für die Inhalte des Wikis gedacht.
 */
  $wgContentNamespaces = [
  NS_MAIN,
  NS_HELP,
  NS_PROJECT,
  NS_ECHO,
  NS_PROBLEME
];


  /** VisualEditor-Aktivierung
   * Diese Einstellung erlaubt die Verwendung des VisualEdiors in weiteren Namensräumen.
   * Standardmäßig ist der VisualEditor nur im Hauptnamensraum und im Namensraum "Diskussion" aktiviert.
   */
// ALLE relevanten Namespaces für VE aktivieren
  $wgVisualEditorEnableNamespaces = [
    NS_MAIN => true,
    NS_TALK => true,
    NS_HELP => true,
    NS_HELP_TALK => true,
    NS_CATEGORY => true,
    NS_CATEGORY_TALK => true,
    NS_PROJECT => true,
    NS_PROJECT_TALK => true,
    NS_ECHO => true,
    NS_ECHO_TALK => true,
    NS_PROBLEME => true,
    NS_PROBLEME_TALK => true,
    NS_PORTAL => true,
    NS_PORTAL_TALK => true,
    NS_PORTALINTERN => true,
    NS_PORTALINTERN_TALK => true,
    NS_TEAM => true,
    NS_TEAM_TALK => true,
    NS_INTERN => true,
    NS_INTERN_TALK => true,
  ];

// Diese Namespaces gelten als Content → Button wird angezeigt
  $wgContentNamespaces = [
    NS_MAIN,
    NS_HELP,
    NS_CATEGORY,
    NS_PROJECT,
    NS_ECHO,
    NS_PROBLEME,
    NS_PORTAL,
    NS_PORTALINTERN,
    NS_TEAM,
    NS_INTERN,
  ];

  /** 
   * Footer Links
   * Diese Einstellungen fügen Links zum Footer hinzu.
   * 
   */
  $wgHooks['SkinAddFooterLinks'][] = function ( Skin $skin, string $key, array &$footerlinks ) {
    if ( $key === 'places' ) {
        // Nutzungsbedingungen (Projekt:Nutzung)
      $footerlinks['nutzung'] = Html::rawElement( 'a', [
        'href' => Title::newFromText( 'Wikonia:Nutzungsbedingungen' )->getLocalURL()
      ], $skin->msg( 'wikonia-terms' )->escaped() );
    }
  };


  
/** Userrechte
 * Konfiguration der Benutzerrechte
 * Rechte für Benutzergruppen
 * und Spezialseiten.
 * Cave: Anhängigkeiten beachten, soweit möglich als Kommentar angegeben.
 */

/** Allgemeine Benutzerrechte (Anonyme User) */
$wgGroupPermissions['*']['createaccount'] = true;		// Anonyme Benutzer können Accounts anlegen
$wgGroupPermissions['*']['edit'] = true;			// Anonyme Benutzer können Seiten bearbeiten
$wgGroupPermissions['*']['read'] = true;			// Anonyme Benutzer können Seiten lesen
$wgGroupPermissions['*']['createpage'] = true;		// Anonyme Benutzer können Seiten anlegen
$wgGroupPermissions['*']['createtalk'] = true;		// Anonyme Benutzer können Diskussionsseiten anlegen
$wgGroupPermissions['*']['writeapi'] = true;      // Anonyme Benutzer können die API zum Schreiben verwenden. Vorausetzung für den VisualEditor.

/** Benutzerrechte (Benutzer) */
$wgGroupPermissions['user']['editcontentmodel'] = true;  // Benutzer können den Inhaltstyp von Seiten ändern


## Admins (sysop) ##
$wgUserMergeProtectedGroups = [ 'sysop' ];			// Admins können nicht gemerged werden
$wgGroupPermissions['sysop']['whoiswatching'] = true;		// Beobachtungsliste anzeigen
$wgGroupPermissions['sysop']['approverevisions'] = true;	// Genehmigte Versionen freigeben

## Bürokraten (bureaucrat) ##
$wgGroupPermissions['bureaucrat']['usermerge'] = true; 		// eBenutzer-Accounts zusammenlegen/löschen
$wgGroupPermissions['bureaucrat']['userrights'] = true;		// Benutzerrechte verwalten
$wgGroupPermissions['bureaucrat']['lockdown'] = true;		// Lockdown verwalten
$wgGroupPermissions['bureaucrat']['checkuser'] = true;		// Checkuser-Rechte als Bürokrat











