<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ConditionalAvailabilityRestrictionStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed\ConditionalAvailabilityRestrictionStub
     */
    protected $conditionalAvailabilityRestrictionStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface
     */
    protected $conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityRestrictionToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->url = '/conditional-availability-restriction/gateway/expand-customer-transfer-with-has-availability-restrictions';

        $this->conditionalAvailabilityRestrictionStub = new ConditionalAvailabilityRestrictionStub(
            $this->conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithHasAvailabilityRestrictions(): void
    {
        $this->conditionalAvailabilityRestrictionToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->url, $this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->conditionalAvailabilityRestrictionStub->expandCustomerTransferWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }
}
