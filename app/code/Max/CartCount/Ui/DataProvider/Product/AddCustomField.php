<?php
namespace Max\CartCount\Ui\DataProvider\Product;
class AddCustomField implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface
{
          public function addField(\Magento\Framework\Data\Collection $collection, $field, $alias = null){
                   $collection->joinField(
                   'manage_stock',
                   'max_cartcount',
                   'pp_id',
                   'pp_id=entity_id',
                    null,
                   'left'
                   );
                }
}


/*


 $collection->joinField(
             'custom_column', 
             'table_name', 
             'custom_column', 
             'customfield_id=entity_id',
             null, 
             'left'
        );
        */

