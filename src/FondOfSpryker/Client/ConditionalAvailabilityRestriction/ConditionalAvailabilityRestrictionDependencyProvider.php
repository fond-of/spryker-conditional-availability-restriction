<?php

namespace FondOfSpryker\Client\ConditionalAvailabilityRestriction;

use FondOfSpryker\Client\ConditionalAvailabilityRestriction\Dependency\Client\ConditionalAvailabilityRestrictionToZedRequestClientBridge;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class ConditionalAvailabilityRestrictionDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container = $this->addZedRequestClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addZedRequestClient(Container $container): Container
    {
        $container[static::CLIENT_ZED_REQUEST] = static function (Container $container) {
            return new ConditionalAvailabilityRestrictionToZedRequestClientBridge(
                $container->getLocator()->zedRequest()->client()
            );
        };

        return $container;
    }
}
