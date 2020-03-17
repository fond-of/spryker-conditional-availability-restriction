<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use Codeception\Test\Unit;
use Spryker\Client\Kernel\Container;

class ConditionalAvailabilityRestrictionDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionDependencyProvider
     */
    protected $conditionalAvailabilityRestrictionDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionDependencyProvider = new ConditionalAvailabilityRestrictionDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideServiceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->conditionalAvailabilityRestrictionDependencyProvider->provideServiceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
