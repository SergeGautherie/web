<?php
    /*
    RSDB - ReactOS Support Database
    Copyright (C) 2005-2006  Klemens Friedl <frik85@reactos.org>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
    */

/*
 *	ReactOS Support Database System - RSDB
 *	
 *	(c) by Klemens Friedl <frik85>
 *	
 *	2005 - 2006 
 */


	// To prevent hacking activity:
	if ( !defined('RSDB') )
	{
		die(" ");
	}

?>
<h1><a href="<?php echo $RSDB_intern_index_php ?>?page=home">ReactOS Support Database</a> &gt; 

<?php

	switch ($RSDB_SET_sec) {
		case "home": // Home
		default:
			include("inc/pack/pack_home.php");
			break;
		case "category": // Category
			include("inc/tree/tree_category.php");
			break;
		case "name": // Name
			include("inc/tree/tree_name.php");
			break;
		case "vendor": // Vendor/Company
			include("inc/tree/tree_vendor.php");
			break;
	}

?>