<?php
namespace Casino;

if( !defined( 'ABSPATH' ) ) exit;


require_once CS_DIR.'/lib/class.Casino_Helpers.php';
require_once CS_DIR.'/lib/class.Casino_Backend.php';
require_once CS_DIR.'/lib/class.Casino_Frontend.php';

class Plugin
{
    public function __construct()
    {
        new Backend();
        new Frontend();
    }
}