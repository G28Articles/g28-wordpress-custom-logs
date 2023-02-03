<?php

namespace G28\CustomLogs;


if( !function_exists( __NAMESPACE__ . 'runPlugin') )
{
    function runPlugin( $root )
    {
        add_action( 'plugins_loaded', function () use ( $root ) {
            Plugin::getInstance( $root );
            new Controller();
        } );
        add_action( 'rest_api_init', function (){
            new ApiEndpoints();
        });
    }
}