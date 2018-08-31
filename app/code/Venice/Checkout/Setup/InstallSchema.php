<?php

namespace Venice\Checkout\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Venice\Product\Logger\Logger;

class InstallSchema implements InstallSchemaInterface
{

    protected $_logger;

    public function __construct(Logger $logger){
        $this->_logger = $logger;
    }
    
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->_logger->debug('starting to install schema for module'); 
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('order_payment'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true,'unsigned' => true, 'nullable' => false,'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'order_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Order ID'
            )
            ->addColumn(
                'increment_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                ['nullable' => false],
                'Order Increment ID'
            )
            ->addColumn(
                'order_currency_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                [],
                'status'
            )
            ->addColumn(
                'base_grand_total',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Grand Total'
            )
            ->addColumn(
                'base_subtotal',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Subtotal'
            )
            ->addColumn(
                'base_tax_amount',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Base Tax Amount'
            )
            ->addColumn(
                'base_shipping_amount',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Shipping Amount'
            )
            ->addColumn(
                'base_discount_amount',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Discount Amount'
            )
            ->addColumn(
                'discount_description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Discount Description'
            )
            ->addColumn(
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [],
                'Customer ID'
            )
            ->addColumn(
                'customer_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'Customer Email'
            )
            ->addColumn(
                'customer_firstname',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'Customer First Name'
            )
            ->addColumn(
                'customer_lastname',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'Customer Last Name'
            )
            ->addColumn(
                'customer_group_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [],
                'Customer Group ID'
            )
            ->addColumn(
                'customer_is_guest',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                [],
                'Customer Is Guest'
            )
            ->addColumn(
                'remote_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                [],
                'Remote IP'
            )
            ->addColumn(
                'magento_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                [],
                'Magento Order Status'
            )
            ->addColumn(
                'order_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                ['default' => -1],
                'Order Status'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [],
                'Store ID'
            )
            ->addColumn(
                'store_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'Store Name'
            )
            ->addColumn(
                'total_item_count',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [],
                'Total Item Count'
            )
            ->addColumn(
                'base_total_paid',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Total Paid'
            )
            ->addColumn(
                'payment_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                [],
                'Payment Code'
            )
            ->addColumn(
                'shipment_carrier_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                [],
                'Shipment Carrier Code'
            )
            ->addColumn(
                'shipment_track_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'Shipment Track Number'
            )
            ->addColumn(
                'shipment_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                [],
                'Shipment Status'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            );

        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('order_product'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true,'unsigned' => true, 'nullable' => false,'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'order_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Order ID'
            )
            ->addColumn(
                'product_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                ['nullable' => false],
                'Product ID'
            )
            ->addColumn(
                'sku',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'SKU'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Name'
            )
            ->addColumn(
                'serial_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                128,
                [],
                'Serial Number'
            )
            ->addColumn(
                'price',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Price'
            )
            ->addColumn(
                'tax_percent',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Tax Percent'
            )
            ->addColumn(
                'tax_amount',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Tax Amount'
            )
            ->addColumn(
                'discount_amount',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Discount Amount'
            )
            ->addColumn(
                'base_price_incl_tax',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                [20, 4],
                [],
                'Price Including Tax'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            );

        $installer->getConnection()->createTable($table);

        $this->_logger->debug('finished installing schema for module');
        $installer->endSetup();
    }
}