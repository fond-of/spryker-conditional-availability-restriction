<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use Codeception\Test\Unit;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStubInterface;
use Spryker\Client\Kernel\Container;

class ConditionalAvailabilityRestrictionFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionFactory
     */
    protected $conditionalAvailabilityRestrictionFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface
     */
    protected $conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionFactory = new ConditionalAvailabilityRestrictionFactory();
        $this->conditionalAvailabilityRestrictionFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateZedConditionalAvailabilityRestrictionStub(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ConditionalAvailabilityRestrictionDependencyProvider::CLIENT_ZED_REQUEST)
            ->willReturn($this->conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityRestrictionStubInterface::class,
            $this->conditionalAvailabilityRestrictionFactory->createZedConditionalAvailabilityRestrictionStub()
        );
    }
}
