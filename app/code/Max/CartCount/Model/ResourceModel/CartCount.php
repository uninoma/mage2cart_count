<?php
namespace Max\CartCount\Model\ResourceModel;


class CartCount extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected $_isPkAutoIncrement = false;
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('max_cartcount', 'pp_id');
	}
	
}