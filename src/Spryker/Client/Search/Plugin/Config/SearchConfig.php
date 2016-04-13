<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Search\Plugin\Config;

use Spryker\Client\Kernel\AbstractPlugin;

/**
 * @method \Spryker\Client\Search\SearchFactory getFactory()
 */
class SearchConfig extends AbstractPlugin implements SearchConfigInterface
{

    /**
     * @var \Spryker\Client\Search\Plugin\Config\FacetConfigBuilderInterface
     */
    protected $facetConfigBuilder;

    /**
     * @var \Spryker\Client\Search\Plugin\Config\SortConfigBuilderInterface
     */
    protected $sortConfigBuilder;

    public function __construct()
    {
        $this->facetConfigBuilder = $this->getFactory()->createFacetConfigBuilder();
        $this->sortConfigBuilder = $this->getFactory()->createSortConfigBuilder();

        $searchConfigBuilder = $this->getFactory()->getSearchConfigBuilder();

        $searchConfigBuilder->buildFacetConfig($this->facetConfigBuilder);
        $searchConfigBuilder->buildSortConfig($this->sortConfigBuilder);

        $this->extendConfig();
    }

    /**
     * @return void
     */
    protected function extendConfig()
    {
        // TODO: query redis, extend config dynamically, etc.
    }

    /**
     * @return \Spryker\Client\Search\Plugin\Config\FacetConfigBuilderInterface
     */
    public function getFacetConfigBuilder()
    {
        return $this->facetConfigBuilder;
    }

    /**
     * @return \Spryker\Client\Search\Plugin\Config\SortConfigBuilderInterface
     */
    public function getSortConfigBuilder()
    {
        return $this->sortConfigBuilder;
    }

}