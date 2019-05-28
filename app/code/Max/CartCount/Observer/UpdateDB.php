<?php

    namespace Max\CartCount\Observer;
 
    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
 
    class UpdateDB implements ObserverInterface
    {

        public function __construct(
            \Max\CartCount\Model\CartCountFactory $cartCountFactory,
            \Magento\Checkout\Model\Session $checkoutSession,
            \Magento\Checkout\Model\Cart $cart
            )
            {
                $this->_checkoutSession = $checkoutSession;
                $this->_cartCountFactory = $cartCountFactory;
                $this->_cart = $cart;  
            }


        public function execute(\Magento\Framework\Event\Observer $observer) {
             
            $productInfo = $this->_cart->getQuote()->getItemsCollection();
            //$productInfo = $this->_cart->getQuote()->getAllItems(); /*****For All items *****/
            foreach ($productInfo as $item){
                $id=$item->getProductId();
                if($id){
                    $p = $this->_cartCountFactory->create();
                    $count=0;
                    $count=$p->load($id)->getCart_adds();
                    $p->setData(['pp_id'=>$id,'cart_adds'=>$count+1])->save();
                }
               
            }           
        
        }
 
    }