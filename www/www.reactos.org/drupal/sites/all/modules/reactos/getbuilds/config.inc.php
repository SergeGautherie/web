<?php
/*
  PROJECT:    ReactOS Website
  LICENSE:    GNU GPLv2 or any later version as published by the Free Software Foundation
  PURPOSE:    Easily download prebuilt ReactOS Revisions
  COPYRIGHT:  Copyright 2007-2009 Colin Finck <mail@colinfinck.de>
*/

	define("ROOT_PATH", "../");
	define("SHARED_PATH", ROOT_PATH . "drupal/sites/default/shared/");
	
	// Configuration
	$AJAX_GETFILES_PROVIDER_URL = "http://iso.reactos.org/scripts/ajax-getfiles-provider.php";
	$ISO_DOWNLOAD_URL = "http://iso.reactos.org/";
	$MAX_FILES_PER_PAGE = 100;			// The same value has to be set in "ajax-getfiles-provider.php"
?>
