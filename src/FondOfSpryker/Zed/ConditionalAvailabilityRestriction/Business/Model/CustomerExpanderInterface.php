<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandWithHasAvailabilityRestrictions(CustomerTransfer $customerTransfer): CustomerTransfer;
}
