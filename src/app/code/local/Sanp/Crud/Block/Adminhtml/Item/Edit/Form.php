<?php
class Sanp_Crud_Block_Adminhtml_Item_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'action' => $this->getUrl('*/*/save'),
            'method' => 'post',
        ));
        $form->setUseContainer(true);

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('adminhtml')->__('Item Information'),
        ));

        $item = Mage::registry('current_item');
        if ($item && $item->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

        $fieldset->addField('name', 'text', array(
            'label'    => Mage::helper('adminhtml')->__('Name'),
            'name'     => 'name',
            'required' => true,
        ));

        $fieldset->addField('description', 'textarea', array(
            'label' => Mage::helper('adminhtml')->__('Description'),
            'name'  => 'description',
        ));

        $fieldset->addField('status', 'select', array(
            'label'  => Mage::helper('adminhtml')->__('Status'),
            'name'   => 'status',
            'values' => array(
                array('value' => 1, 'label' => 'Active'),
                array('value' => 0, 'label' => 'Inactive'),
            ),
        ));

        if ($item) {
            $form->setValues($item->getData());
        }

        $this->setForm($form);
        return parent::_prepareForm();
    }
}
