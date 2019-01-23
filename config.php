<?php
/**
 * Address App Config
 */
define("URL", "http://localhost/shipswar_project");
define("SITE_NAME","Ships War");
define("SITE_URL", "/shipswar_project/");
define("SITE_DIR", $_SERVER['DOCUMENT_ROOT'] . SITE_URL);
define("URL_CSS", "resources/css/");
define("URL_JS", "resources/js/");
define("URL_IMAGE", "resources/images/");

/**
 * Database Config
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'shipswar_database');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_PREFIX', 'sw_d_');

/**
 * HASH
 */
define('KEY_PASSWORD', 'shipsWar');
define('ALGO_PASSWORD', 'sha1');
