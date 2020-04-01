<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use Codeception\Test\Unit;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStubInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ConditionalAvailabilityRestrictionClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionClient
     */
    protected $conditionalAvailabilityRestrictionClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionFactory
     */
    protected $conditionalAvailabilityRestrictionFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStubInterface
     */
    protected $conditionalAvailabilityRestrictionStubInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionFactoryMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionStubInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionClient = new ConditionalAvailabilityRestrictionClient();
        $this->conditionalAvailabilityRestrictionClient->setFactory($this->conditionalAvailabilityRestrictionFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithHasAvailabilityRestrictions(): void
    {
        $this->conditionalAvailabilityRestrictionFactoryMock->expects($this->atLeastOnce())
            ->method('createZedConditionalAvailabilityRestrictionStub')
            ->willReturn($this->conditionalAvailabilityRestrictionStubInterfaceMock);

        $this->conditionalAvailabilityRestrictionStubInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithHasAvailabilityRestrictions')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->conditionalAvailabilityRestrictionClient->expandCustomerTransferWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }
}
