<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpanderInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ConditionalAvailabilityRestrictionFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionFacade
     */
    protected $conditionalAvailabilityRestrictionFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionBusinessFactory
     */
    protected $conditionalAvailabilityRestrictionBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionBusinessFactoryMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityRestrictionFacade = new ConditionalAvailabilityRestrictionFacade();
        $this->conditionalAvailabilityRestrictionFacade->setFactory($this->conditionalAvailabilityRestrictionBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithHasAvailabilityRestrictions(): void
    {
        $this->conditionalAvailabilityRestrictionBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expandWithHasAvailabilityRestrictions')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->conditionalAvailabilityRestrictionFacade->expandCustomerTransferWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }
}
