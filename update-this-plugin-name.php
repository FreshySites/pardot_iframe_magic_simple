<?php
/**
* Plugin Name: Include Any Page
* Plugin URI: https://github.com/FreshyMichael/include-any-page
* Description: Include the full output of any exterior page with a simple shortcode that accepts a URL
* Version: 1.0.0
* Author: FreshySites
* Author URI: https://freshysites.com/
* License: GNU v3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* Include Any Page Start */
//______________________________________________________________________________


add_shortcode('include_any_page', 'file_get_any_page_landing');



function file_get_any_page_landing($atts){

	ob_start();
	
	extract(shortcode_atts(array('url' =>'*'), $atts));
	
	return file_get_contents($url);

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
	'https://github.com/FreshyMichael/include-any-page',
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
