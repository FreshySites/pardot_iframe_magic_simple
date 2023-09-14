<?php
/**
* Plugin Name: Pardot iFrame Magic
* Plugin URI: https://github.com/FreshySites/pardot_iframe_magic_simple
* Description: Send UTM Params to Pardot when using Pardot's iframe implementation option
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

	include_once( plugin_dir_path( __FILE__ ) . '/includes/isMobileDevice.php'); //device detection

	extract(shortcode_atts(array(
		'src' =>'',
		'height' => '',
		'mobile-height' => '',
	), $atts));

		if (!empty($atts['height'])){
			$iframe_height = $atts['height'];
		}
		else {
			$iframe_height = '800';
		}
		if (!empty($atts['src'])){
			$src = $atts['src'];
		}
		if(!empty($atts['mobile-height'])){
			$mobile_height = $atts['mobile-height'];
		}
		else{
			$mobile_height = '800';
		}

	ob_start();

		//var_dump(isMobileDevice($is_mob));
	?>

	<script type="text/javascript">

 	var form = '<?php echo $src; ?>';
	var params = window.location.search;
 	var thisScript = document.scripts[document.scripts.length - 1];
 	var iframe = document.createElement('iframe');
	var referrer = document.referrer;
	if (referrer !== '') {
		if (params == '') {
			params = params+'?referrer=' + referrer;
		}
		else {
			params = params+'&referrer=' + referrer;
		}
	}

 	iframe.setAttribute('src', form + params);
 	iframe.setAttribute('width', '100%');
	iframe.setAttribute('id', 'param_iframe');
 	iframe.setAttribute('height', <?php if(isMobileDevice($is_mob) === 1){ echo " ' " . $mobile_height . " ' ";} else{ echo " ' " . $iframe_height . " ' ";}  ?>);
 	iframe.setAttribute('type', 'text/html');
 	iframe.setAttribute('frameborder', 0);
 	iframe.setAttribute('allowTransparency', 'true');
 	iframe.style.border = '0';
 	thisScript.parentElement.replaceChild(iframe, thisScript);

	</script>
<?php
	if (isMobileDevice($is_mob) === 1 ) {
		//echo('Mobile Height in use');
		//var_dump( $mobile_height);
		echo '<iframe src="'. $src .'" width="100%" height="'. $mobile_height .'" type="text/html" frameborder="0" allowTransparency="true" style="border: 0;display:none"></iframe>';
	}
	else{
		//echo('Desktop Height in use');
		//var_dump( $iframe_height);
		echo '<iframe src="'. $src .'" width="100%" height="'. $iframe_height .'" type="text/html" frameborder="0" allowTransparency="true" style="border: 0;display:none"></iframe>';
	}

	$ReturnString = ob_get_clean();

	return $ReturnString;

}
//______________________________________________________________________________
// All About Updates

//  Begin Version Control | Auto Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// ***IMPORTANT*** Update this path to New Github Repository Master Branch Path
	'https://github.com/FreshySites/pardot_iframe_magic_simple',
	__FILE__,
// ***IMPORTANT*** Update this to New Repository Master Branch Path
	'pardot_iframe_magic_simple'
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
/* Pardot iFrame Magic end */
?>
