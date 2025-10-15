<?php

if(!defined('DOKU_INC')) die();

class action_plugin_pdfjs extends DokuWiki_Action_Plugin {
    /**
     * @param Doku_Event_Handler $controller
     */
    public function register(Doku_Event_Handler $controller) {
        $controller->register_hook('DOKUWIKI_STARTED', 'AFTER', $this, 'add_jsinfo');
		//add toolbar icon - jw
		$controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'pdfjsToolbar', array());
    }


	//add toolbar icon -jw
    public function pdfjsToolbar(&$event, $param) {
        $event->data[] = array(
            'type' => 'insert',
            'title' => 'Insert PDF',
            'icon' => '../../plugins/pdfjs/pdfjs.png',
            'insert' => '{{pdfjs width,height > NS:FILE?ZoomLevel}}',
            //'block' => false
        );
    }
	 //add toolbar icon end -jw


    /**
     * @param Doku_Event $event
     */
    public function add_jsinfo(Doku_Event $event) {
        global $JSINFO;

        $JSINFO['plugin_pdfjs']['hide_download_button'] = $this->getConf('hide_download_button');
    }
}
