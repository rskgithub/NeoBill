<?php
/**
 * manager_menu.php
 *
 * This file handles the menu (left) pane of the Solid State Manager application.
 *
 * @package Pages
 * @author John Diamond <jdiamond@solid-state.org>
 * @copyright John Diamond <jdiamond@solid-state.org>
 * @license http://www.opensource.org/licenses/gpl-license.php GNU Public License
 */

// Load config file
require_once "../config.inc.php";

// Load SolidWorks
require_once $base_path . "solidworks/solidworks.php";

// Load settings from database
require_once $base_path . "util/settings.php";
load_settings( $conf );

// Display menu
$smarty->display( "smarty/templates/manager_menu.tpl" );

?>
