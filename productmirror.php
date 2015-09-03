<?php
if (!defined('_PS_VERSION_'))
    exit;

class ProductMirror extends Module
{
    public function __construct()
    {
        $this->name = 'productmirror';
        $this->tab = 'quick_bulk_update';
        $this->version = '1.0.0';
        $this->author = 'SMB Streamline';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Product Mirror');
        $this->description = $this->l('Makes it possible to copy the attributes of a product unto any number of other products in one action.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('PRODUCTMIRROR_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

    public function install()
    {
        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('PRODUCTMIRROR_NAME', 'Product Mirror')
        ) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() || !Configuration::deleteByName('PRODUCTMIRROR_NAME')) {
            return false;
        }

        return true;
    }
}
