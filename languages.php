<?php
session_start();

$languages = array('en', 'ru', 'ge');


if($_SESSION['lang'] == '') {
	$_SESSION['lang'] = 'en';
}

  if(isset($_GET['lang']) && $_GET['lang'] != ''){ 
    // check if the language is one we support
    if(in_array($_GET['lang'], $languages))
    {       
      $_SESSION['lang'] = $_GET['lang']; // Set session
    }
  }

// do stuff with LANG constant
include($_SERVER['DOCUMENT_ROOT'].'/languages/lang.'.LANG.'.php');


$LANG['lang_en'] = "English";
$LANG['lang_ru'] = "Русский";
$LANG['lang_ge'] = "ქართული";
?>