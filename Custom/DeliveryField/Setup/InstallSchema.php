<?php
namespace Custom\DeliveryField\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'delivery_date',
            [
                'type' => 'datetime',
                'nullable' => false,
                'comment' => 'Ship Date',
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'delivery_date',
            [
                'type' => 'datetime',
                'nullable' => false,
                'comment' => 'Ship Date',
            ]
        );

        if($installer->tableExists('sales_order_grid')){
            $installer->getConnection()->addColumn(
                $installer->getTable('sales_order_grid'),
                'delivery_date',
                [
                    'type' => 'datetime',
                    'nullable' => false,
                    'comment' => 'Ship Date',
                ]
            );
        }

        $setup->endSetup();
    }
}