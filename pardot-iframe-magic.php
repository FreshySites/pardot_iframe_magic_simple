<?php
/**
* Plugin Name: Pardot iFrame Magic
* Plugin URI: https://github.com/FreshyMichael/pardot_iframe_magic
* Description: Send UTM Params to PArdot when using iframe implementation, and pacc piAId and piCId via the same shortcode to additonally included script
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
	
	extract(shortcode_atts(array(
		'src' =>'',
		'piAId' =>'',
		array('piCId' =>''		
	)), $atts));
	
		?>
	<script type="text/javascript">
		piAId = '<?php echo $piAId; ?>';
		piCId = '<?php echo $piCId; ?>';
		piHostname = 'pi.pardot.com';

	(function() {
		function async_load(){
			var s = document.createElement('script'); s.type = 'text/javascript';
			s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';
		var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
		}
		if(window.attachEvent) { window.attachEvent('onload', async_load); }
		else { window.addEventListener('load', async_load, false); }
	})();
</script>
	<script type="text/javascript">
 	var form = '<?php echo $src; ?>';
	var params = window.location.search;
 	var thisScript = document.scripts[document.scripts.length - 1];
 	var iframe = document.createElement('iframe');

 	iframe.setAttribute('src', form + params);
 	iframe.setAttribute('width', '100%');
	iframe.setAttribute('id', 'param_iframe');
 	iframe.setAttribute('height', 800);
 	iframe.setAttribute('type', 'text/html');
 	iframe.setAttribute('frameborder', 0);
 	iframe.setAttribute('allowTransparency', 'true');
 	iframe.style.border = '0';

 	thisScript.parentElement.replaceChild(iframe, thisScript);
	</script>



	<?php 
	ob_start();
	// echo $src;
	//echo $atts[1];
	echo '<iframe src="'. $src .'" width="100%" height="800" type="text/html" frameborder="0" allowTransparency="true" style="border: 0;display:none;"></iframe>';

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
