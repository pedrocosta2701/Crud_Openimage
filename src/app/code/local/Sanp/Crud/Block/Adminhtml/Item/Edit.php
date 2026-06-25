<?php
class Sanp_Crud_Block_Adminhtml_Item_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId   = 'id';
        $this->_blockGroup = 'sanp_crud';
        $this->_controller = 'adminhtml_item';
        parent::__construct();
        $this->_updateButton('save', 'label', Mage::helper('adminhtml')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('adminhtml')->__('Delete Item'));
    }

    public function getHeaderText()
    {
        $item = Mage::registry('current_item');
        if ($item && $item->getId()) {
            return Mage::helper('adminhtml')->__("Edit Item '%s'", $item->getName());
        }
        return Mage::helper('adminhtml')->__('New Item');
    }
}
