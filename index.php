<?php 
/*
Plugin Name: Casino System
Description: Adds casino and review functionality to the site
Version: 1.0.0
Author: Njegos Vukadin
Author URI: vukadinsu@gmail.com
*/

namespace Casino;

if( !defined( 'ABSPATH' ) ) exit;

define( 'CS_VERSION', '1.0.0' );
define( 'CS_FILE', __FILE__ );
define( 'CS_DIR', dirname( __FILE__ ) );

include CS_DIR.'/lib/class.Casino_Plugin.php';

new Plugin();