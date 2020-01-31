<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction\Zed;

use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ConditionalAvailabilityRestrictionStub implements ConditionalAvailabilityRestrictionStubInterface
{
    /**
     * @var \FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ConditionalAvailabilityRestrictionToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithHasAvailabilityRestrictions(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        $url = '/conditional-availability-restriction/gateway/expand-customer-transfer-with-has-availability-restrictions';

        /** @var \Generated\Shared\Transfer\CustomerTransfer $customerTransfer */
        $customerTransfer = $this->zedRequestClient->call($url, $customerTransfer);

        return $customerTransfer;
    }
}
