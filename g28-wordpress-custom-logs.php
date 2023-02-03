<?php
/*
Plugin Name: G28 Custom Logs
Description: A G28 example plugin to demonstrate how to write log files for a custom plugin
Version: 0.0.1
Author: G28 - Guilherme Pereira
Author URI: #
*/

if ( ! defined( 'ABSPATH' ) ) exit;

require "vendor/autoload.php";

use function G28\CustomLogs\runPlugin;

runPlugin( __FILE__ );