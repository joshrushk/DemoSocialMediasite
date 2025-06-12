<?php
error_reporting(0);
#error_reporting(E_ALL ^ E_NOTICE);

// Database information
define('DATABASE_HOST', ''); // localhost, if this default
define('DATABASE_NAME', ''); // Database Name
define('DATABASE_USERNAME', ''); // Database Username
define('DATABASE_PASSWORD', ''); // Database Password

// Website configuration
define('YOUTUBE_API_KEY', ''); // YOUR YOUTUBE V3 API KEY
define('WEBSITE_URL', ''); // YOUR WEBSITE URL
define('FOOTER_TITLE', '2015 New STAR, NISGEO Production'); // Footer Title
define('FACEBOOK_PAGE', 'https://twitter.com/'); // Facebook Page Url
define('TWITTER_PAGE', 'https://www.facebook.com/'); // Twitter Page Url

// Connect to the database
mysql_connect(DATABASE_HOST,DATABASE_USERNAME,DATABASE_PASSWORD) or die(mysql_error());
mysql_select_db(DATABASE_NAME) or die(mysql_error());
mysql_query("SET CHARACTER SET utf8"); 
mysql_query("SET NAMES 'utf8'");
$CONFIG_SETTINGS = mysql_fetch_array(mysql_query("SELECT * FROM settings LIMIT 1"));
define('LANG', $CONFIG_SETTINGS['lang']); // YOUR WEBSITE LANGUAGE
?>