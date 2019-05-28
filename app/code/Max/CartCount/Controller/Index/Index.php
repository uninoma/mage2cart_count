<?php
namespace Max\CartCount\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_cartCountFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Max\CartCount\Model\CartCountFactory $cartCountFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_cartCountFactory = $cartCountFactory;
		return parent::__construct($context);
	}

	public function execute()
	{	echo "cartcount:";
		$p = $this->_cartCountFactory->create();	
		$p->setData(['pp_id'=>110,'cart_adds'=>'12'])->save();

		$p2 = $this->_cartCountFactory->create();
		echo "<pre>";
		print_r($p2->load('110')->getCart_adds());
		echo "</pre>";

		$collection = $p->getCollection();
		
		foreach($collection as $item){
			echo "cartCount debug:<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();
		return $this->_cartCountFactory->create();
	}
}