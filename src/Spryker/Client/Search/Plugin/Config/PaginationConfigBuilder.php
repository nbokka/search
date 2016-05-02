<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Search\Plugin\Config;

use Generated\Shared\Transfer\PaginationConfigTransfer;

class PaginationConfigBuilder implements PaginationConfigBuilderInterface
{

    /**
     * @var \Generated\Shared\Transfer\PaginationConfigTransfer
     */
    protected $paginationConfigTransfer;

    /**
     * @param \Generated\Shared\Transfer\PaginationConfigTransfer $paginationConfigTransfer
     *
     * @return void
     */
    public function setPagination(PaginationConfigTransfer $paginationConfigTransfer)
    {
        $this->paginationConfigTransfer = $paginationConfigTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\PaginationConfigTransfer
     */
    public function get()
    {
        return $this->paginationConfigTransfer;
    }

    /**
     * @param array $requestParameters
     *
     * @return int
     */
    public function getCurrentPage(array $requestParameters)
    {
        $paramName = $this->paginationConfigTransfer->getParameterName();

        return isset($requestParameters[$paramName]) ? max((int)$requestParameters[$paramName], 1) : 1;
    }

}