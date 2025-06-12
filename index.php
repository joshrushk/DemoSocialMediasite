<?php
session_start();
require_once('./config.php');
require_once('./includes/functions.php');
require_once('./includes/languages.php');

// View Function
$view = empty($_GET['view']) ? 'index' : $_GET['view'];

switch($view)
{
	// Index Page
	case('index'):
	break;
	// Profile Page
	case('play'):
	break;
	// My Playlists
	case('playlist'):
	break;
	// My Bookmarks
	case('bookmarks'):
	break;
	// Youtube User Page
	case('user'):
	break;
	// Profile Page
	case('profile'):
	break;
	// TOP
	case('top'):
	break;
	// Admin
	case('admin'):
	break;
}

$arr = array('index','play','playlist','bookmarks','user','profile','top','admin');
if(!in_array($view,$arr)) die("<html><head><meta charset='utf-8'></head><body>This Page Don't Work.</body></html>");


// Website Content Template
include($_SERVER['DOCUMENT_ROOT'].'/themes/default/theme.tpl.php');
?>