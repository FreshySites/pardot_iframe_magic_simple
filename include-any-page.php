<?php
/**
* Plugin Name: Pardot iFrame Magic
* Plugin URI: https://github.com/FreshyMichael/pardot_iframe_magic
* Description: Include the full output of any exterior page with a simple shortcode that accepts a URL
* Version: 1.0.0
* Author: FreshySites
* Author URI: https://freshysites.com/
* License: GNU v3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* Pardot iFrame Magic */
//______________________________________________________________________________


add_shortcode('pardot_iframe', 'pardot_iframe_magic_func');



function pardot_iframe_magic_func($atts){

	ob_start();
	
	extract(shortcode_atts(array('src' =>'*'), $atts));
	
	return '<iframe src="'. $src .'" width="100%" height="800" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';
	?>
	<script type="text/javascript">
 	var form = '<?php echo $src; ?>';
	var params = window.location.search;
 	var thisScript = document.scripts[document.scripts.length - 1];
 	var iframe = document.createElement('iframe');

 	iframe.setAttribute('src', form + params);
 	iframe.setAttribute('width', '100%');
 	iframe.setAttribute('height', 800);
 	iframe.setAttribute('type', 'text/html');
 	iframe.setAttribute('frameborder', 0);
 	iframe.setAttribute('allowTransparency', 'true');
 	iframe.style.border = '0';

 	thisScript.parentElement.replaceChild(iframe, thisScript);
	</script>

	<?php 

	$ReturnString = ob_get_contents();
		
	ob_end_clean();
	
	return $ReturnString;

}
//______________________________________________________________________________
// All About Updates

//  Begin Version Control | Auto Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// ***IMPORTANT*** Update this path to New Github Repository Master Branch Path
	'https://github.com/FreshyMichael/pardot_iframe_magic',
	__FILE__,
// ***IMPORTANT*** Update this to New Repository Master Branch Path
	'include-any-page'
);
//Enable Releases
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
//Optional: If you're using a private repository, specify the access token like this:
//
//
//Future Update Note: Comment in these sections and add token and branch information once private git established
//
//
//$myUpdateChecker->setAuthentication('your-token-here');
//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//______________________________________________________________________________
/* Include Any Page End */
?>
