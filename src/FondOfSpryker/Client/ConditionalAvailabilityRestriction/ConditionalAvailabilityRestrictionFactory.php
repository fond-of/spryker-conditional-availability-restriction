<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStub;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class ConditionalAvailabilityRestrictionFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStubInterface
     */
    public function createZedConditionalAvailabilityRestrictionStub(): ConditionalAvailabilityRestrictionStubInterface
    {
        return new ConditionalAvailabilityRestrictionStub($this->getZedRequestClient());
    }

    /**
     * @return \FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface
     */
    protected function getZedRequestClient(): ConditionalAvailabilityRestrictionToZedRequestClientInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilityRestrictionDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
