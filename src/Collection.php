<?php

/**
 * Extends basic Slim Collection class for simple push method.
 * @class Collection
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

class Collection extends \Slim\Collection
{
    /**
     * Add value in the end of data array.
     * @param mixed $value Any value
     */
    public function add($value): void
    {
        $this->data[] = $value;
    }
}
