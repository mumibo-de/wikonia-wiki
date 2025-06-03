<?php
# secrets.dev.template
# Bitte kopieren als: secrets.dev.php
# und mit lokalen Zugangsdaten befüllen
# Diese Datei enthält KEINE produktiven Secrets!

# Absicherung gegen Web-Aufruf
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

$mySecrets = [
    // Database
    'DBserver'      => 'YEOUR_DB_SERVER', // e.g. localhost
    'DBname'        => 'YOUR_DB_NAME',
    'DBuser'        => 'YOUR_DB_USER',
    'DBpassword'    => 'YOUR_DB_PASSWORD',
    'DBprefix'      => 'YOUR_TABLE_PREFIX',
    
    //Secret und Update Key
    'UpgradeKey '   => 'YOUR_UPGRADE_KEY',
    'SecretKey'     => 'YOUR_SECRET_KEY',
    // TODO: #5 SMTP-Extension installieren und Secret setzen.
    // 'smtp_user'   => 'mail@example.net',
    // 'smtp_pass'   => 'securepass123',

];
