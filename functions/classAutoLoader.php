<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 13/03/2018
 * Time: 13:50
 */
function classAutoLoader($className)
{
    include_once "./classes/".$className.".php";
}