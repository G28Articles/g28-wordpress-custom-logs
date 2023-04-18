<?php

namespace G28\CustomLogs;


class Controller
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'addMenuPage' ));
        add_action( 'admin_enqueue_scripts', [ $this, 'registerStylesAndScripts'] );
        add_action( 'wp_ajax_ajaxGetLog', [ $this, 'ajaxGetLog' ] );
    }

    public function addMenuPage()
	{
		add_menu_page(
			'G28 Custom Logs Plugin',
			'G28 Custom Logs Plugin',
			'manage_options',
			'custom-logs',
			array( $this, 'renderMenuPage' ),
            'dashicons-edit',
            30
		);
	}

    public function renderMenuPage()
	{
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
		wp_enqueue_style(Plugin::getAssetsPrefix() . 'admin_style');
		//wp_enqueue_script( Plugin::getAssetsPrefix() . 'admin-scripts' );
		ob_start();
        include sprintf( "%sadmin-page.php", Plugin::getTemplateDir() );
        $html = ob_get_clean();
        echo $html;
	}

    public function registerStylesAndScripts()
	{
		wp_register_style( Plugin::getAssetsPrefix() . 'admin_style', Plugin::getAssetsUrl() . 'css/admin.css' );
		wp_register_script(
            Plugin::getAssetsPrefix() . 'admin-scripts',
            Plugin::getAssetsUrl() . 'js/admin-settings.js',
            array( 'jquery',),
            null,
            true
        );

		wp_localize_script( Plugin::getAssetsPrefix() . 'admin-scripts', 'ajaxobj', [
			'ajax_url'        	    => admin_url( 'admin-ajax.php' ),
			'eucap_nonce'		    => wp_create_nonce( 'eucap_nonce' ),
			'action_saveBanner'	    => 'ajaxAddBanner',
            'action_getLog'         => 'ajaxGetLog',
            'action_resetPages'     => 'ajaxResetPages',
            'action_runAvatar'      => 'ajaxRuAvatar'
		]);
	}
    
}