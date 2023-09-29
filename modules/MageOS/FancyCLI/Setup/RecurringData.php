<?php

namespace MageOS\FancyCLI\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class: RecurringData
 *
 * @see InstallDataInterface
 */
class RecurringData implements InstallDataInterface
{
    /**
     * @inheritDoc
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // long running process ;)
        sleep(5);
    }
}

