<?php
namespace Max\CartCount\Ui\Component\Listing\Column;
use Magento\Framework\Escaper;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class CartAdds extends Column{
    protected $escaper;

    public function __construct(
        \Max\CartCount\Model\CartCountFactory $cartCountFactory,
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Escaper $escaper,
        array $components = [],
        array $data = []
    ) {
        $this->_cartCountFactory=$cartCountFactory;
        $this->escaper = $escaper;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource){
        if (isset($dataSource['data']['items'])) {
            $p = $this->_cartCountFactory->create();
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$fieldName] = $p->load($item['entity_id'])->getCart_adds();
            }
        }
        return $dataSource;
    }

}