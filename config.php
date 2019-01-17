<?php
/**
 * Address App Config
 */
define("URL", "http://localhost/shipswar_project");
define("SITE_NAME","جنگ کشتی ها");
define("SITE_URL", "/shipswar_project/");
define("SITE_DIR", $_SERVER['DOCUMENT_ROOT'] . SITE_URL);
define("URL_CSS", "public/css/");
define("URL_JS", "public/js/");
define("URL_IMAGE", "public/images/");

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
define('ALGO_PASSWORD', 'MD5');
