<?php
class Sanp_Crud_Model_Resource_Item extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('sanp_crud/item', 'id');
    }
}
