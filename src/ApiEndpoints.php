<?php

namespace G28\CustomLogs;

use WP_REST_Controller;
use WP_REST_Server;
use WP_REST_Response;

class ApiEndpoints extends WP_REST_Controller
{
    public function __construct()
    {
        register_rest_route( 'custom-logs', '/ping', array(
            'methods'       => WP_REST_Server::READABLE,
            'callback'      => array( $this, 'ping' )
        ));
    }
}