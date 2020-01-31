<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed;

use Generated\Shared\Transfer\CustomerTransfer;

interface ConditionalAvailabilityRestrictionStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer;
}
