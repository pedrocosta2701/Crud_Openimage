<?php
class Sanp_Crud_Block_Adminhtml_Item extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_item';
        $this->_blockGroup = 'sanp_crud';
        $this->_headerText = Mage::helper('adminhtml')->__('Manage Items');
        $this->_addButtonLabel = Mage::helper('adminhtml')->__('Add New Item');
        parent::__construct();
    }
}
