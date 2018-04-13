<?php
/**
 * Created by PhpStorm.
 * User: jaCUBE
 * Date: 12.04.2018
 * Time: 18:08
 */

class Controller
{
    public function __construct()
    {
        $action = Rychecky::action();
        $this->$action();
    }
}
