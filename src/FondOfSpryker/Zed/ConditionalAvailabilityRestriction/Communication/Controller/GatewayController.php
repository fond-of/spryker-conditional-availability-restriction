<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityRestriction\Business\ConditionalAvailabilityRestrictionFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictionsAction(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->getFacade()->expandCustomerTransferWithHasAvailabilityRestrictions($customerTransfer);
    }
}
