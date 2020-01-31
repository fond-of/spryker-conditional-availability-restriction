<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\ConditionalAvailabilityRestriction\ConditionalAvailabilityRestrictionFactory getFactory()
 */
class ConditionalAvailabilityRestrictionClient extends AbstractClient implements ConditionalAvailabilityRestrictionClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->getFactory()->createZedConditionalAvailabilityRestrictionStub()
            ->expandCustomerTransferWithHasAvailabilityRestrictions($customerTransfer);
    }
}
