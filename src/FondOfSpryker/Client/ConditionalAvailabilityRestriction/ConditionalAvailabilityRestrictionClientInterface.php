<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use Generated\Shared\Transfer\CustomerTransfer;

interface ConditionalAvailabilityRestrictionClientInterface
{
    /**
     * Specifications:
     * - Expands CustomerTransfer with a value for CustomerTransfer::hasAvailabilityRestrictions
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer;
}
