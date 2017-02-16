<?php
namespace App\Contracts;


interface  UuidInterface
{
    public static function import($uuid);

    public static function compare($a, $b);

    public static function generate($ver = 1, $node = null, $ns = null);

}
