<?php
namespace Max\CartCount\Model\ResourceModel\CartCount;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'p_id';
	protected $_eventPrefix = 'max_cart_count_collection';
	protected $_eventObject = 'p_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Max\CartCount\Model\CartCount', 'Max\CartCount\Model\ResourceModel\CartCount');
	}

}