<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUserTransfer
     */
    protected $companyUserTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var string
     */
    protected $debtorNumber;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserTransferMock = $this->getMockBuilder(CompanyUserTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->debtorNumber = 'debtor-number';

        $this->customerExpander = new CustomerExpander();
    }

    /**
     * @return void
     */
    public function testExpandWithHasAvailabilityRestrictions(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyUserTransfer')
            ->willReturn($this->companyUserTransferMock);

        $this->companyUserTransferMock->expects($this->atLeastOnce())
            ->method('getCompany')
            ->willReturn($this->companyTransferMock);

        $this->companyUserTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnit')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getDebtorNumber')
            ->willReturn($this->debtorNumber);

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('setHasAvailabilityRestrictions')
            ->willReturnSelf();

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expandWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testExpandWithHasAvailabilityRestrictionsCompanyUserNull(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyUserTransfer')
            ->willReturn(null);

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('setHasAvailabilityRestrictions')
            ->willReturnSelf();

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expandWithHasAvailabilityRestrictions(
                $this->customerTransferMock
            )
        );
    }
}
