<?php
namespace Max\CartCount\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('max_cartcount')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('max_cartcount')
			)
				->addColumn(
					'pp_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					'Post ID',
					['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,]
				
				)->addColumn(
                    'cart_adds',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER
                )
			
				
				->setComment('Cart Count');
			$installer->getConnection()->createTable($table);
		}
		$installer->endSetup();
	}
}
