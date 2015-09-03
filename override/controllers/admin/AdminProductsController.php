<?php
class AdminProductsController extends AdminProductsControllerCore
{

    public function __construct() {
        parent::__construct();
		$this->bulk_actions = array(
            'delete' => array('text' => $this->l('Delete selected'), 'icon' => 'icon-trash', 'confirm' => $this->l('Delete selected items?')),
            'mirrorpaste' => array('text' => $this->l('Apply attributes to selected '), 'icon' => 'icon-copy', 'confirm' => $this->l('Apply attributes to items?')),
        );
    }


}
