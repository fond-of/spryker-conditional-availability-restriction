<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Communication\Plugin\Customer;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionFacade;
use Generated\Shared\Transfer\CustomerTransfer;

class HasAvailabilityRestrictionsCustomerTransferExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Communication\Plugin\Customer\HasAvailabilityRestrictionsCustomerTransferExpanderPlugin
     */
    protected $hasAvailabilityRestrictionsCustomerTransferExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionFacade
     */
    protected $conditionalAvailabilityRestrictionFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionFacadeMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->hasAvailabilityRestrictionsCustomerTransferExpanderPlugin = new HasAvailabilityRestrictionsCustomerTransferExpanderPlugin();
        $this->hasAvailabilityRestrictionsCustomerTransferExpanderPlugin->setFacade($this->conditionalAvailabilityRestrictionFacadeMock);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->conditionalAvailabilityRestrictionFacadeMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithHasAvailabilityRestrictions')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->hasAvailabilityRestrictionsCustomerTransferExpanderPlugin->expandTransfer(
                $this->customerTransferMock
            )
        );
    }
}
