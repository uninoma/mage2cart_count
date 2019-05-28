<?php
namespace Max\CartCount\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0', '<')||true) {
			if (!$installer->tableExists('max_cartcount')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('max_cartcount')
                )
                ->addColumn(
					'pp_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					'Product ID',
					['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,]

				)->addColumn(
                    'cart_adds',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER
                )
                    
					->setComment('cart count');
				$installer->getConnection()->createTable($table);
			}
		}

		$installer->endSetup();
	}
}