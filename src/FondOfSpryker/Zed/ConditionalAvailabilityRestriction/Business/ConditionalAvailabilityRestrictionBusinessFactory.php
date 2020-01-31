<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business;

use FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpanderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class ConditionalAvailabilityRestrictionBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander();
    }
}
