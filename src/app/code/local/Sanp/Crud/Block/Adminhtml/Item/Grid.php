<?php
class Sanp_Crud_Block_Adminhtml_Item_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('sanpCrudItemGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('sanp_crud/item')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => 'ID',
            'align'  => 'right',
            'width'  => '50px',
            'index'  => 'id',
        ));
        $this->addColumn('name', array(
            'header' => 'Name',
            'index'  => 'name',
        ));
        $this->addColumn('status', array(
            'header'  => 'Status',
            'index'   => 'status',
            'type'    => 'options',
            'options' => array(1 => 'Active', 0 => 'Inactive'),
        ));
        $this->addColumn('action', array(
            'header'  => 'Action',
            'width'   => '100px',
            'type'    => 'action',
            'getter'  => 'getId',
            'actions' => array(array(
                'caption' => 'Edit',
                'url'     => array('base' => '*/*/edit'),
                'field'   => 'id',
            )),
            'filter'    => false,
            'sortable'  => false,
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
