<?php

namespace G28\CustomLogs;

use WP_REST_Controller;
use WP_REST_Server;
use WP_REST_Response;

class ApiEndpoints extends WP_REST_Controller
{
    public function __construct()
    {
        register_rest_route( 'custom-logs/v1', '/ping', array(
            'methods'       => WP_REST_Server::READABLE,
            'callback'      => array( $this, 'ping' )
        ));
    }

    public function ping()
    {
        Logger::getInstance()->add('api', 'Ping endpoint called');
        return new WP_REST_Response( array(
            'status' => 'success',
            'message' => 'Ping endpoint called'
        ), 200 );
    }
}