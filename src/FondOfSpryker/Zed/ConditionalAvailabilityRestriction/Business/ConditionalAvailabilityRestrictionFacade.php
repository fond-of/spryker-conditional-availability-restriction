<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionBusinessFactory getFactory()
 */
class ConditionalAvailabilityRestrictionFacade extends AbstractFacade implements ConditionalAvailabilityRestrictionFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->getFactory()->createCustomerExpander()->expandWithHasAvailabilityRestrictions($customerTransfer);
    }
}
