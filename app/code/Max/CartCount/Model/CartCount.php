<?php
namespace Max\CartCount\Model;
class CartCount extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'max_cartcount';

	protected $_cacheTag = 'max_cartcount';

	protected $_eventPrefix = 'max_cartcount';

	protected function _construct()
	{
		$this->_init('Max\CartCount\Model\ResourceModel\CartCount');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}