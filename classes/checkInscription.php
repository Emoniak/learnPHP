<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 14/03/2018
 * Time: 10:17
 */

class checkInscription
{
    function valid($token)
    {
        $rec=new Queries();

        $sql = "update t_users set usemailvalid = 1 where usertoken='$token'";

        return $rec ->insert($sql);

    }
}