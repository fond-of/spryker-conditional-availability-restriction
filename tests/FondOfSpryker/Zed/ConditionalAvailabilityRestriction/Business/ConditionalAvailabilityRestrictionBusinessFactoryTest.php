<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpanderInterface;

class ConditionalAvailabilityRestrictionBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionBusinessFactory
     */
    protected $conditionalAvailabilityRestrictionBusinessFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionBusinessFactory = new ConditionalAvailabilityRestrictionBusinessFactory();
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->conditionalAvailabilityRestrictionBusinessFactory->createCustomerExpander()
        );
    }
}
