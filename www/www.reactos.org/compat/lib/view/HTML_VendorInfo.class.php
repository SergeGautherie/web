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



class HTML_VendorInfo extends HTML
{

  protected function body ()
  {

  $stmt=CDBConnection::getInstance()->prepare("SELECT * FROM rsdb_item_vendor WHERE vendor_id = :vendor_id AND vendor_visible = '1' ORDER BY vendor_name ASC");
  $stmt->bindParam('vendor_id',@$_GET['vendor'],PDO::PARAM_STR);
  $stmt->execute();
	
	$result_page = $stmt->fetchOnce(PDO::FETCH_ASSOC);
	
if ($result_page['vendor_id']) {
?>

<style type="text/css">
<!--
/* tab colors */
.tab                { background-color : #ffffff; }
.tab_s              { background-color : #5984C3; }
.tab_u              { background-color : #A0B7C9; }

/* tab link colors */
a.tabLink           { text-decoration : none; }
a.tabLink:link      { text-decoration : none; }
a.tabLink:visited   { text-decoration : none; }
a.tabLink:hover     { text-decoration : underline; }
a.tabLink:active    { text-decoration : underline; }

/* tab link size */
p.tabLink_s         { color: navy; font-size : 10pt; font-weight : bold; padding : 0 8px 1px 2px; margin : 0; }
p.tabLink_u         { color: black; font-size : 10pt; padding : 0 8px 1px 2px; margin : 0; }

/* text styles */
.strike 	       { text-decoration: line-through; }
.bold              { font-weight: bold; }
.newstitle         { font-weight: bold; color: purple; }
.title_group       { font-size: 16px; font-weight: bold; color: #5984C3; text-decoration: none; }
.bluetitle:visited { color: #323fa2; text-decoration: none; }

.Stil1 {font-size: xx-small}
.Stil2 {font-size: x-small}
.Stil3 {color: #FFFFFF}
.Stil4 {font-size: xx-small; color: #FFFFFF; }

-->
</style>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr align="left" valign="top">
          <!-- title -->
          <td valign="bottom" width="100%">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td class="title_group" nowrap="nowrap">&nbsp;</td>
                </tr>
                <tr valign="bottom">
                  <td class="tab_s"><img src="images/white_pixel.gif" alt="" height="1" width="1"></td>
                </tr>
          </table></td>
          <!-- start tab -->
          <td nowrap="nowrap">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr align="left" valign="top">
                  <td width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td width="4"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab_s"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab_s" width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td width="2"><img src="images/blank.gif" alt="" height="1" width="2"></td>
                </tr>
                <tr align="left" valign="top">
                  <td class="tab_s" width="1"><img src="images/white_pixel.gif" alt="" height="4" width="1"></td>
                  <td width="4"><img src="images/tab_corner_active.gif" alt="" height="4" width="4"></td>
                  <td><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab_s" width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td width="2"><img src="images/blank.gif" alt="" height="1" width="2"></td>
                </tr>
                <tr valign="middle">
                  <td class="tab_s" width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td width="4"><img src="images/blank.gif" alt="" height="1" width="4"></td>
                  <td nowrap="nowrap"><p class="tabLink_s"><a href="<?php echo $RSDB_intern_link_vendor.htmlspecialchars($_GET['vendor']); ?>" class="tabLink">Overview</a></p></td>
                  <td class="tab_s" width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td width="2"><img src="images/blank.gif" alt="" height="1" width="2"></td>
                </tr>
                <tr valign="bottom">
                  <td class="tab_s" width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab" width="4"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab_s" width="1"><img src="images/blank.gif" alt="" height="1" width="1"></td>
                  <td class="tab_s" width="2"><img src="images/blank.gif" alt="" height="1" width="2"></td>
                </tr>
          </table></td>
          <!-- end tab -->

          <!-- fill the remaining space -->
          <td valign="bottom" width="10">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr valign="bottom">
                  <td class="tab_s"><img src="images/white_pixel.gif" alt="" height="1" width="10"></td>
                </tr>
          </table></td>
        </tr>
</table>

	<h2><?php echo $result_page['vendor_name']; ?></h2>
	<p><font size="3" face="Arial, Helvetica, sans-serif"><?php echo htmlentities($result_page['vendor_fullname']); ?></font></p>
	<p><font size="2" face="Arial, Helvetica, sans-serif"><b>Website:</b> <a href="<?php echo htmlentities($result_page['vendor_url']); ?>" onmousedown="return clk(this.href,'res','')"><?php echo htmlentities($result_page['vendor_url']); ?></a></font></p>
	<p><font size="2" face="Arial, Helvetica, sans-serif"><b>E-Mail:</b> <a href="mailto:<?php echo htmlentities($result_page['vendor_email']); ?>"><?php echo htmlentities($result_page['vendor_email']); ?></a></font></p>
	<p><font size="2" face="Arial, Helvetica, sans-serif"><b>Information:</b> <?php echo wordwrap(nl2br(htmlentities($result_page['vendor_infotext'], ENT_QUOTES))); ?></font></p>
	<p>&nbsp;</p>
	<table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr bgcolor="#5984C3">
        <td width="20%" title="Item">
          <div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>
            <?php
		
				echo "Application";

		?>
        </strong></font></div></td>
        <td width="30%" title="Description">
          <div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>Description</strong></font></div></td>
        <td width="15%" title="Award/Medal (best)"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>Award</strong></font></div></td>
        <td width="8%" title="Version">
          <div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>Ver.</strong></font></div></td>
        <td width="20%" title="Compatibility &Oslash;">
          <div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>Compatibility &Oslash;</strong></font></div></td>
        <td width="7%" title="Status"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>Stat.</strong></font></div></td>
      </tr>
      <?php
	
    $stmt=CDBConnection::getInstance()->prepare("SELECT * FROM rsdb_groups WHERE grpentr_vendor = :vendor_id AND grpentr_visible = '1' AND grpentr_comp = '1' ORDER BY grpentr_name ASC");
    $stmt->bindParam('vendor_id',@$_GET['vendor'],PDO::PARAM_STR);
    $stmt->execute();
	
		$farbe1="#E2E2E2";
		$farbe2="#EEEEEE";
		$zaehler="0";
		
		while($result_page = $stmt->fetch(PDO::FETCH_ASSOC)) { // Pages
	?>
      <tr>
        <td valign="top" bgcolor="<?php
									$zaehler++;
									if ($zaehler == "1") {
										echo $farbe1;
										$farbe = $farbe1;
									}
									elseif ($zaehler == "2") {
										$zaehler="0";
										echo $farbe2;
										$farbe = $farbe2;
									}
								 ?>" >
          <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><b><a href="<?php echo $RSDB_intern_link_vendor2_group.$result_page['grpentr_id']; ?>">
            <?php
      $stmt_item=CDBConnection::getInstance()->prepare("SELECT * FROM rsdb_item_vendor WHERE vendor_id = :vendor_id");
      $stmt_item->bindParam('vendor_id',$result_page['grpentr_vendor'],PDO::PARAM_STR);
      $stmt_item->execute();
			$result_entry_vendor = $stmt->fetch(PDO::FETCH_ASSOC);
	/*	
			echo $result_entry_vendor['vendor_name']."&nbsp;";
	*/
		  ?>
            <?php echo $result_page['grpentr_name']; ?></a></b>
                <?php
			echo " &nbsp;<i>";
      $stmt_item=CDBConnection::getInstance()->prepare("SELECT DISTINCT (comp_appversion), comp_osversion, comp_id, comp_name FROM rsdb_item_comp WHERE comp_visible = '1' AND comp_groupid = :group_id GROUP BY comp_appversion ORDER BY comp_appversion ASC LIMIT 15");
      $stmt_item->bindParam('group_id',$result_page['grpentr_id'],PDO::PARAM_STR);
      $stmt_item->execute();
			while($result_entry_appver = $stmt_item->fetch(PDO::FETCH_ASSOC)) {
				if ($result_entry_appver['comp_name'] > $result_page['grpentr_name']) {
					echo "<a href=\"".$RSDB_intern_link_group.$result_page['grpentr_id']."&amp;group2=".$result_entry_appver['comp_appversion']."\">".substr($result_entry_appver['comp_name'], strlen($result_page['grpentr_name'])+1 )."</a>, ";
				}
			}
			echo "</i>";
		?>
        </font></div></td>
        <td valign="top" bgcolor="<?php echo $farbe; ?>"><font size="2">
          <?php
	
	if (strlen(htmlentities($result_page['grpentr_description'], ENT_QUOTES)) <= 30) {
		echo $result_page['grpentr_description'];
	}
	else {
		echo substr(htmlentities($result_page['grpentr_description'], ENT_QUOTES), 0, 30)."...";
	}
	 
	  ?>
        </font></td>
        <?php
			$counter_stars_install_sum = 0;
			$counter_stars_function_sum = 0;
			$counter_stars_user_sum = 0;
			$counter_awards_best = 0;
			
			$counter_items = 0;

			$counter_testentries = 0;
			$counter_forumentries = 0;
			$counter_screenshots = 0;

      $stmt_comp=CDBConnection::getInstance()->prepare("SELECT * FROM rsdb_item_comp WHERE comp_groupid = :group_id AND comp_visible = '1' ORDER BY comp_groupid DESC");
      $stmt_comp->bindParam('group_id',$result_page['grpentr_id'],PDO::PARAM_STR);
      $stmt_comp->execute();
			while($result_group_sum_items = $stmt_comp->fetch(PDO::FETCH_ASSOC)) { 
				$counter_items++;
				if ($counter_awards_best < $result_group_sum_items['comp_award']) {
					$counter_awards_best = $result_group_sum_items['comp_award'];
				}
        $stmt_results=CDBConnection::getInstance()->prepare("SELECT SUM(test_result_install) AS install_sum, SUM(test_result_function) AS function_sum, COUNT(*) AS user_sum FROM rsdb_item_comp_testresults WHERE test_visible = '1' AND test_comp_id = :comp_id ORDER BY test_comp_id ASC");
        $stmt_results->bindParam('comp_id',$result_group_sum_items['comp_id'],PDO::PARAM_STR);
        $stmt_results->execute();
        $tmp=$stmt_results->fetchOnce(PDO::FETCH_ASSOC);

				$counter_stars_install_sum += $tmp['install_sum'];
				$counter_stars_function_sum += $tmp['function_sum'];
				$counter_stars_user_sum += $tmp['user_sum'];
				
        $stmt_count=CDBConnection::getInstance()->prepare("SELECT COUNT(*) FROM rsdb_item_comp_testresults WHERE test_visible = '1' AND test_comp_id = :comp_id");
        $stmt_count->bindParam('comp_id',$result_group_sum_items['comp_id'],PDO::PARAM_STR);
        $stmt_count->execute();
				$result_count_testentries = $stmt_count->fetchOnce(PDO::FETCH_NUM);
				$counter_testentries += $result_count_testentries[0];
				
				// Forum entries:
        $stmt_count=CDBConnection::getInstance()->prepare("SELECT COUNT(*) FROM ".CDBT_COMMENTS." WHERE visible IS TRUE AND entry_id = :comp_id");
        $stmt_count->bindParam('comp_id',$result_group_sum_items['comp_id'],PDO::PARAM_STR);
        $stmt_count->execute();
				$result_count_forumentries = $stmt_count->fetchOnce(PDO::FETCH_NUM);
				$counter_forumentries += $result_count_forumentries[0];

				// Screenshots:
        $stmt_count=CDBConnection::getInstance()->prepare("SELECT COUNT(*) FROM ".CDBT_ATTACHMENTS." WHERE visible IS TRUE AND entry_id = :group_id");
        $stmt_count->bindParam('group_id',$result_group_sum_items['comp_media'],PDO::PARAM_STR);
        $stmt_count->execute();
				$result_count_screenshots = $stmt_count->fetchOnce(PDO::FETCH_NUM);
				$counter_screenshots += $result_count_screenshots[0];
			}
?>
        <td valign="top" bgcolor="<?php echo $farbe; ?>"><div align="left"><font size="1">&nbsp;<img src="media/icons/awards/<?php echo Award::icon($counter_awards_best); ?>.gif" alt="<?php echo Award::name($counter_awards_best); ?>" width="16" height="16" /> <?php echo Award::name($counter_awards_best); ?></font></div></td>
        <td valign="top" bgcolor="<?php echo $farbe; ?>"><div align="center"><font size="2">
            <?php 
			
			echo $counter_items;
			
			?>
        </font></div></td>
        <td valign="top" bgcolor="<?php echo $farbe; ?>"><div align="left"><font size="2">
            <?php 
			
			echo Star::drawSmall($counter_stars_function_sum, $counter_stars_user_sum, 5, "") . " (".$counter_stars_user_sum.")";
			
			?>
        </font></div></td>
        <td valign="top" bgcolor="<?php echo $farbe; ?>" title="<?php echo "Tests: ".$counter_testentries.", Forum entries: ".$counter_forumentries.", Screenshots: ".$counter_screenshots; ?>"><div align="center">
            <table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="33%"><div align="center">
                    <?php if ($counter_testentries > 0) { ?>
                    <img src="media/icons/info/test.gif" alt="Compatibility Test Report entries" width="13" height="13">
                    <?php } else { echo "&nbsp;"; } ?>
                </div></td>
                <td width="33%"><div align="center">
                    <?php if ($counter_forumentries > 0) { ?>
                    <img src="media/icons/info/forum.gif" alt="Forum entries" width="13" height="13">
                    <?php } else { echo "&nbsp;"; } ?>
                </div></td>
                <td width="33%"><div align="center">
                    <?php if ($counter_screenshots > 0) { ?>
                    <img src="media/icons/info/screenshot.gif" alt="Screenshots" width="13" height="13">
                    <?php } else { echo "&nbsp;"; } ?>
                </div></td>
              </tr>
            </table>
        </div></td>
      </tr>
      <?php	
		}	// end while
	?>
    </table>
<?php
	}
	else {
		echo "<p>No related database entry found.</p>";
	}
?>
<p>&nbsp;</p>
<?php

	if (CUser::isModerator($RSDB_intern_user_id)) {
	
    $stmt=CDBConnection::getInstance()->prepapare("SELECT * FROM rsdb_item_vendor WHERE vendor_visible = '1' AND vendor_id = :vendor_id LIMIT 1");
    $stmt->bindParam('vendor_id',@$_GET['vendor'],PDO::PARAM_STR);
    $stmt->execute();
		$result_maintainer_vendor = $stmt->fetchOnce(PDO::FETCH_ASSOC);

		$RSDB_referrer="";
		$RSDB_usragent="";
		$RSDB_ipaddr="";
		if (array_key_exists('HTTP_REFERER', $_SERVER)) $RSDB_referrer=htmlspecialchars($_SERVER['HTTP_REFERER']);
		if (array_key_exists('HTTP_USER_AGENT', $_SERVER)) $RSDB_usragent=htmlspecialchars($_SERVER['HTTP_USER_AGENT']);
		if (array_key_exists('REMOTE_ADDR', $_SERVER)) $RSDB_ipaddr=htmlspecialchars($_SERVER['REMOTE_ADDR']);

		$RSDB_TEMP_pmod = "";
		$RSDB_TEMP_txtreq1 = "";
		$RSDB_TEMP_txtreq2 = "";
		$RSDB_TEMP_txtspam = "";
		$RSDB_TEMP_verified = "";
		$RSDB_TEMP_vendname = "";
		$RSDB_TEMP_fullname = "";
		$RSDB_TEMP_txturl = "";
		$RSDB_TEMP_txtemail = "";
		$RSDB_TEMP_txtinfo = "";
		if (array_key_exists("pmod", $_POST)) $RSDB_TEMP_pmod=htmlspecialchars($_POST["pmod"]);
		if (array_key_exists("txtreq1", $_POST)) $RSDB_TEMP_txtreq1=htmlspecialchars($_POST["txtreq1"]);
		if (array_key_exists("txtreq2", $_POST)) $RSDB_TEMP_txtreq2=htmlspecialchars($_POST["txtreq2"]);
		if (array_key_exists("txtspam", $_POST)) $RSDB_TEMP_txtspam=htmlspecialchars($_POST["txtspam"]);
		if (array_key_exists("verified", $_POST)) $RSDB_TEMP_verified=htmlspecialchars($_POST["verified"]);
		if (array_key_exists("vendname", $_POST)) $RSDB_TEMP_vendname=htmlspecialchars($_POST["vendname"]);
		if (array_key_exists("fullname", $_POST)) $RSDB_TEMP_fullname=htmlspecialchars($_POST["fullname"]);
		if (array_key_exists("txturl", $_POST)) $RSDB_TEMP_txturl=htmlspecialchars($_POST["txturl"]);
		if (array_key_exists("txtemail", $_POST)) $RSDB_TEMP_txtemail=htmlspecialchars($_POST["txtemail"]);
		if (array_key_exists("txtinfo", $_POST)) $RSDB_TEMP_txtinfo=htmlspecialchars($_POST["txtinfo"]);


		// Edit application group data:
		if ($RSDB_TEMP_pmod == "ok" && isset($_GET['vendor']) && $_GET['vendor'] != '' && $RSDB_TEMP_vendname != "" && $RSDB_TEMP_txturl != "" && CUser::isModerator($RSDB_intern_user_id)) {
			// Update group entry:
      $stmt=CDBConnection::getInstance()->prepare("UPDATE rsdb_item_vendor SET vendor_name = :name, vendor_fullname = :fullname, vendor_url = :url, vendor_email = :email, vendor_infotext = :info WHERE vendor_id = :vendor_id LIMIT 1");
      $stmt->bindParam('name',$RSDB_TEMP_vendname,PDO::PARAM_STR);
      $stmt->bindParam('fullname',$RSDB_TEMP_fullname,PDO::PARAM_STR);
      $stmt->bindParam('url',$RSDB_TEMP_txturl,PDO::PARAM_STR);
      $stmt->bindParam('email',$RSDB_TEMP_txtemail,PDO::PARAM_STR);
      $stmt->bindParam('info',$RSDB_TEMP_txtinfo,PDO::PARAM_STR);
      $stmt->bindParam('vendor_id',$_GET['vendor'],PDO::PARAM_STR);
      $stmt->execute();
			
			CLog::add("low", "tree_vendor", "edit", "[Vendor] Edit entry", @usrfunc_GetUsername($RSDB_intern_user_id)." changed the group data from: \n\nVendor-Name: ".htmlentities($result_maintainer_vendor['vendor_name'])." - ".htmlentities($result_maintainer_vendor['vendor_fullname'])." - ".$result_maintainer_vendor['vendor_id']."\n\nUrl: ".htmlentities($result_maintainer_vendor['vendor_url'])." \n\E-Mail: ".$result_maintainer_vendor['vendor_email']." \n\Info: ".$result_maintainer_vendor['vendor_infotext']." \n\n\nTo: \n\nVendor-Name: ".htmlentities($RSDB_TEMP_vendname)."\n\Fullname: ".htmlentities($RSDB_TEMP_fullname)." \n\nUrl: ".htmlentities($RSDB_TEMP_txturl)." \n\E-Mail: ".htmlentities($RSDB_TEMP_txtemail)." \n\Info: ".htmlentities($RSDB_TEMP_txtinfo), "0");
			?>
			<script language="JavaScript">
				window.setTimeout('window.location.href="<?php echo $RSDB_intern_link_vendor_both_javascript; ?>"','500')
			</script>
			<?php
		}

		// Special request:
		if ($RSDB_TEMP_pmod == "ok" && $RSDB_TEMP_txtreq1 != "" && $RSDB_TEMP_txtreq2 != "" && CUser::isModerator($RSDB_intern_user_id)) {
      CLog::add(null, null, null, $RSDB_TEMP_txtreq1, $RSDB_TEMP_txtreq2,'');

		}
		// Report spam:
		if ($RSDB_TEMP_pmod == "ok" && $RSDB_TEMP_txtspam != "" && CUser::isModerator($RSDB_intern_user_id)) {
      $stmt=CDBConnection::getInstance()->prepare("UPDATE rsdb_item_vendor SET vendor_visible = '3' WHERE vendor_id = :vendor_id LIMIT 1");
      $stmt->bindParam('vendor_id',@$_GET['vendor'],PDO::PARAM_STR);
      $stmt->execute();
			CLog::add("low", "tree_vendor", "report_spam", "[Vendor] Spam/ads report", @usrfunc_GetUsername($RSDB_intern_user_id)." wrote: \n".htmlentities($RSDB_TEMP_txtspam)." \n\n\n\nUser: ".@usrfunc_GetUsername($result_maintainer_vendor['vendor_usrid'])." - ".$result_maintainer_vendor['vendor_usrid']."\n\nVendor-Name: ".htmlentities($result_maintainer_vendor['vendor_name'])." - ".$result_maintainer_vendor['vendor_id']."\n\nUrl: ".htmlentities($result_maintainer_vendor['vendor_url'])." \n\E-Mail: ".$result_maintainer_vendor['vendor_email']." \n\Info: ".$result_maintainer_vendor['vendor_infotext'], $result_maintainer_vendor['vendor_usrid']);
		}
		// Verified:
		if ($result_maintainer_vendor['vendor_checked'] == "no") {
			$temp_verified = "1";
		}
		else if ($result_maintainer_vendor['vendor_checked'] == "1") {
			$temp_verified = "yes";
		}
		if ($result_maintainer_vendor['vendor_checked'] == "1" || $result_maintainer_vendor['vendor_checked'] == "no") {
			if ($RSDB_TEMP_pmod == "ok" && $RSDB_TEMP_verified == "done" && CUser::isModerator($RSDB_intern_user_id)) {
        $stmt=CDBConnection::getInstance()->prepare("UPDATE rsdb_item_vendor SET vendor_checked = :checked WHERE vendor_id = :vendor_id LIMIT 1");
        $stmt->bindParam('checked',$temp_verified,PDO::PARAM_STR);
        $stmt->bindParam('vendor_id',@$_GET['vendor'],PDO::PARAM_STR);
        $stmt->execute();
				CLog::add("low", "tree_vendor", "verified", "[Vendor] Verified", @usrfunc_GetUsername($RSDB_intern_user_id)." has verified the following vendor: \n\n\n\nUser: ".@usrfunc_GetUsername($result_maintainer_vendor['vendor_usrid'])." - ".$result_maintainer_vendor['vendor_usrid']."\n\nVendor-Name: ".htmlentities($result_maintainer_vendor['vendor_name'])." - ".$result_maintainer_vendor['vendor_id']."\n\nUrl: ".htmlentities($result_maintainer_vendor['vendor_url'])." \n\E-Mail: ".$result_maintainer_vendor['vendor_email']." \n\Info: ".$result_maintainer_vendor['vendor_infotext'], "0");
			}
		}
?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="maintainer">
	  <tbody>
		<tr>
		  <td><p><b><a name="maintainerbar"></a>Maintainer: </b>
			  <?php if ($result_maintainer_vendor['vendor_checked'] != "yes") { ?><a href="javascript:Show_verify()">Verify entry</a> | <?php  } ?><a href="javascript:Show_vendentry()">Edit vendor data</a> | <a href="javascript:Show_spam()">Report spam/ads</a> | <a href="javascript:Show_requests()">Special requests</a></p>
		    <div id="vendentry" style="display: block">
			<fieldset>
			<legend>Edit vendor data</legend>
				<div align="left">
				  <form name="form1" method="post" action="<?php echo $RSDB_intern_link_vendor.htmlspecialchars(@$_GET['vendor'])."#maintainerbar"; ?>">
				      <p><font size="2">Vendor </font><font size="2">name: 
		                  <input name="vendname" type="text" id="vendname" value="<?php echo $result_maintainer_vendor['vendor_name']; ?>" size="40" maxlength="100">
			          (max. 100 chars)	<br>
			          <br>
			          Vendor fullname:
                      <input name="fullname" type="text" id="fullname" value="<?php echo $result_maintainer_vendor['vendor_fullname']; ?>" size="70" maxlength="255">
			          (max. 255 chars, optional) <br>
			          <br>
			          URL:										        
			          <input name="txturl" type="text" id="txturl" value="<?php echo $result_maintainer_vendor['vendor_url']; ?>" size="70" maxlength="255">
			          (max. 255 chars) <br>
			            <br>
			          E-Mail:												
			          <input name="txtemail" type="text" id="txtemail" value="<?php echo $result_maintainer_vendor['vendor_email']; ?>" size="70" maxlength="100">
						(max. 100 chars, optional)		            </font></p>
				      <p><font size="2">Information:<br>
                      <textarea name="txtinfo" cols="70" rows="5" id="txtinfo"><?php echo $result_maintainer_vendor['vendor_infotext']; ?></textarea>
				      <input name="pmod" type="hidden" id="pmod" value="ok">
				        <br>
		              <br>
		                <br>
		                <input type="submit" name="Submit" value="Save">	
	                  </font>				  
				              </p>
				  </form>
				</div>
			</fieldset>
		</div>
		<div id="medal" style="display: none">
		</div>
		<div id="verify" style="display: block">
			<fieldset><legend>Verify entry</legend>
				<div align="left">
				  <p><font size="2">User &quot;<?php echo @usrfunc_GetUsername($result_maintainer_vendor['vendor_usrid']); ?>&quot; has submitted this application group on &quot;<?php echo $result_maintainer_vendor['vendor_date']; ?>&quot;. </font></p>
				  <p><font size="2"><strong>Vendor name:</strong> <?php echo htmlentities($result_maintainer_vendor['vendor_name']); ?><br>
		          <br>
			        <strong>Vendor fullname :</strong>			      <?php if ($result_maintainer_vendor['vendor_fullname']) { echo htmlentities($result_maintainer_vendor['vendor_fullname']); } else { echo '""'; } ?>
			      <br>
		          <br>
			        <strong>URL:</strong>			      <?php 
					
						echo htmlentities($result_maintainer_vendor['vendor_url']);
					
					 ?>
		          <br>
		          <br>
			        <strong>E-Mail:</strong>
			        <?php 
					
						echo htmlentities($result_maintainer_vendor['vendor_email']);
					
					 ?>
				  </font></p>
				  <p><font size="2"><strong>Information:</strong>
                      <?php 
					  
						echo wordwrap(nl2br(htmlentities($result_maintainer_vendor['vendor_infotext'], ENT_QUOTES)));
					
					 ?>
                  </font></p>
				  <p><font size="2">			        Please verify the data and choose one of the three available options below:</font></p>
				  <form name="form2" method="post" action="<?php echo $RSDB_intern_link_vendor.htmlspecialchars(@$_GET['vendor'])."#maintainerbar"; ?>">
				  <ul>
				    <li><font size="2"><a href="javascript:Show_spam()"><strong>Report spam/ads</strong></a></font></li>
				  </ul>
				  <ul>
				    <li><font size="2"><a href="javascript:Show_vendentry()"><strong>Correct/edit data</strong></a></font></li>
				  </ul>
				  <ul>
			        <li>
			            <font size="2">
			            <input type="submit" name="Submit2" value="I have verified the data and everything is okay!">
						<input name="pmod" type="hidden" id="pmod" value="ok">
                        <input name="verified" type="hidden" id="verified" value="done">
						</font> </li>
				  </ul>
	              </form> 
				</div>
			</fieldset>
		</div>
		<div id="spam" style="display: block">
			<fieldset>
			<legend>Report spam/ads</legend>
				<div align="left">
				  <form name="form4" method="post" action="<?php echo $RSDB_intern_link_vendor.htmlspecialchars(@$_GET['vendor'])."#maintainerbar"; ?>">
				    <p><font size="2">Please write a useful description:<br> 
			          <textarea name="txtspam" cols="70" rows="5" id="txtspam"></textarea>
</font><font size="2" face="Arial, Helvetica, sans-serif">
<input name="pmod" type="hidden" id="pmod" value="ok">
</font><font size="2">                    </font></p>
				    <p><font size="2"><strong>Note:</strong><br>
			        When you click on the submit button, the application group will get immediately invisible, and the user who submitted this entry a bad mark. If a user has some bad marks, he will not be able to submit anything for a certain periode.<br>
			        Only administrators can revert this task, so if you made a mistake use the <a href="javascript:Show_requests()">Special requests</a> function.</font></p>
				    <p>
				      <input type="submit" name="Submit4" value="Submit">
	                </p>
				  </form>
				</div>
			</fieldset>
		</div>
		<div id="addbundle" style="display: block">
			<fieldset><legend>Add to bundle</legend>
				<div align="left">
				  <p><font size="2">This interface is currently not available!</font></p>
				  <p><font size="2">Ask a admin to do that task for the meanwhile: <a href="javascript:Show_requests()">Special requests</a></font></p>
				</div>
			</fieldset>
		</div>
		<div id="requests" style="display: block">
			<fieldset><legend>Special requests</legend>
				<div align="left">
				  <form name="form4" method="post" action="<?php echo $RSDB_intern_link_vendor.htmlspecialchars(@$_GET['vendor'])."#maintainerbar"; ?>">
				    <p><font size="2">Message title:<br> 
		            <input name="txtreq1" type="text" id="txtreq1" size="40" maxlength="100">
				    </font></p>
				    <p><font size="2">Text:<br> 
		              <textarea name="txtreq2" cols="70" rows="5" id="txtreq2"></textarea>
</font><font size="2" face="Arial, Helvetica, sans-serif">
<input name="pmod" type="hidden" id="pmod" value="ok">
</font><font size="2">                    </font></p>
				    <p><font size="2"><strong>Note:</strong><br>
			        Please do NOT misuse this function. All administrators will be able to see your message and one of them may contact you per forum private message, email or just do the task you suggested/requested.</font></p>
				    <p><font size="2">If you want to ask something, or the task needs (in all the circumstances) a feedback,  use the website forum, the #reactos-web IRC channel, the mailing list or the forum private message system instead. </font></p>
				    <p><font size="2">This form is not a bug tracking tool nor a feature request function! Use <a href="http://www.reactos.org/bugzilla/">bugzilla</a> for such things instead!</font></p>
				    <p><font size="2"><strong>A sample usage for this form:</strong><br>
			        If you need a new category which doesn't exist, then write a request and one of the admins will read it and may add the missing category. Then you will be able to move this application group to the right category (if you have placed the application somewhere else temporary).</font></p>
				    <p>
				      <font size="2">
				      <input type="submit" name="Submit4" value="Submit">
                      </font> </p>
				  </form>
				</div>
			</fieldset>
		</div>
		  </td>
		</tr>
	  </tbody>
	</table>
	<script language="JavaScript1.2">

		document.getElementById('vendentry').style.display = 'none';
		document.getElementById('medal').style.display = 'none';
		document.getElementById('verify').style.display = 'none';
		document.getElementById('spam').style.display = 'none';
		document.getElementById('addbundle').style.display = 'none';
		document.getElementById('requests').style.display = 'none';
	
		function Show_vendentry()
		{
			document.getElementById('vendentry').style.display = (document.getElementById('vendentry').style.display == 'none') ? 'block' : 'none';
			document.getElementById('medal').style.display = 'none';
			document.getElementById('verify').style.display = 'none';
			document.getElementById('spam').style.display = 'none';
			document.getElementById('addbundle').style.display = 'none';
			document.getElementById('requests').style.display = 'none';
		}
		
		function Show_medal()
		{
			document.getElementById('vendentry').style.display = 'none';
			document.getElementById('medal').style.display = (document.getElementById('medal').style.display == 'none') ? 'block' : 'none';
			document.getElementById('verify').style.display = 'none';
			document.getElementById('spam').style.display = 'none';
			document.getElementById('addbundle').style.display = 'none';
			document.getElementById('requests').style.display = 'none';
		}
		
		function Show_verify()
		{
			document.getElementById('vendentry').style.display = 'none';
			document.getElementById('medal').style.display = 'none';
			document.getElementById('verify').style.display = (document.getElementById('verify').style.display == 'none') ? 'block' : 'none';
			document.getElementById('spam').style.display = 'none';
			document.getElementById('addbundle').style.display = 'none';
			document.getElementById('requests').style.display = 'none';
		}

		function Show_spam()
		{
			document.getElementById('vendentry').style.display = 'none';
			document.getElementById('medal').style.display = 'none';
			document.getElementById('verify').style.display = 'none';
			document.getElementById('spam').style.display = (document.getElementById('spam').style.display == 'none') ? 'block' : 'none';
			document.getElementById('addbundle').style.display = 'none';
			document.getElementById('requests').style.display = 'none';
		}
		
		function Show_addbundle()
		{
			document.getElementById('vendentry').style.display = 'none';
			document.getElementById('medal').style.display = 'none';
			document.getElementById('verify').style.display = 'none';
			document.getElementById('spam').style.display = 'none';
			document.getElementById('addbundle').style.display = (document.getElementById('addbundle').style.display == 'none') ? 'block' : 'none';
			document.getElementById('requests').style.display = 'none';
		}


		function Show_requests()
		{
			document.getElementById('vendentry').style.display = 'none';
			document.getElementById('medal').style.display = 'none';
			document.getElementById('verify').style.display = 'none';
			document.getElementById('spam').style.display = 'none';
			document.getElementById('addbundle').style.display = 'none';
			document.getElementById('requests').style.display = (document.getElementById('requests').style.display == 'none') ? 'block' : 'none';
		}

	</script>
<?php
	}
?>

<br />

<?php
	if (CUser::isAdmin($RSDB_intern_user_id)) {
	
		$RSDB_TEMP_padmin = "";
		$RSDB_TEMP_done = "";
		if (array_key_exists("padmin", $_POST)) $RSDB_TEMP_padmin=htmlspecialchars($_POST["padmin"]);
		if (array_key_exists("done", $_POST)) $RSDB_TEMP_done=htmlspecialchars($_POST["done"]);

		
?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin">
	  <tr>
		<td><b><a name="adminbar"></a>Admin: </b><a href="javascript:Show_readrequests()">Read special requests</a> | <font size="1">all other functions are under construction ...
        </font>
		<div id="readrequests" style="display: block">
			<fieldset><legend>Read special requests</legend>

 <table width="100%" border="1">  
    <tr><td width="10%"><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></font></div></td> 
    <td width="10%"><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">User</font></strong></font></div></td> 
    <td width="25%"><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Title</font></strong></font></div></td> 
    <td width="45%"><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Request</font></strong></font></div></td> 
    <td width="10%"><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Done?</font></strong></font></div></td>
    </tr>
</table>

			</fieldset>
		</div>		</td>
	  </tr>
	</table>
	<script language="JavaScript1.2">

		document.getElementById('readrequests').style.display = 'none';
	
		function Show_readrequests()
		{
			document.getElementById('readrequests').style.display = (document.getElementById('readrequests').style.display == 'none') ? 'block' : 'none';
		}
	</script>
<?php
	}
  } // end of member function body
}
?>	