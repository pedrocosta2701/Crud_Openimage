<?php
class Sanp_Crud_Adminhtml_ItemController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('sanp_crud/items');
        $this->_title($this->__('Definitions'))->_title($this->__('Manage Items'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id   = $this->getRequest()->getParam('id');
        $item = Mage::getModel('sanp_crud/item')->load($id);
        Mage::register('current_item', $item);
        $this->loadLayout();
        $this->_title($this->__('Definitions'))->_title($this->__('Manage Items'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if ($data) {
            $item = Mage::getModel('sanp_crud/item')->load($data['id'] ?? 0);
            $item->addData($data);
            try {
                $item->save();
                Mage::getSingleton('adminhtml/session')->addSuccess('Item saved successfully.');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                Mage::getModel('sanp_crud/item')->load($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess('Item deleted successfully.');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
}
