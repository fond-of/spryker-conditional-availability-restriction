<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandWithHasAvailabilityRestrictions(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $debtorNumber = null;
        $companyTransfer = $this->getCompanyTransferByCustomerTransfer($customerTransfer);

        if ($companyTransfer !== null) {
            $debtorNumber = $companyTransfer->getDebtorNumber();
        }

        $hasAvailabilityRestrictions = $debtorNumber !== null && strpos($debtorNumber, '5') === 0;

        return $customerTransfer->setHasAvailabilityRestrictions($hasAvailabilityRestrictions);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    protected function getCompanyTransferByCustomerTransfer(CustomerTransfer $customerTransfer): ?CompanyTransfer
    {
        $companyUserTransfer = $customerTransfer->getCompanyUserTransfer();

        if ($companyUserTransfer === null) {
            return null;
        }

        return $this->getCompanyTransferByCompanyUserTransfer($companyUserTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    protected function getCompanyTransferByCompanyUserTransfer(
        CompanyUserTransfer $companyUserTransfer
    ): CompanyTransfer {
        $companyTransfer = $companyUserTransfer->getCompany();
        $companyBusinessUnitTransfer = $companyUserTransfer->getCompanyBusinessUnit();

        if ($companyTransfer === null && $companyBusinessUnitTransfer !== null) {
            return $companyBusinessUnitTransfer->getCompany();
        }

        return $companyTransfer;
    }
}
