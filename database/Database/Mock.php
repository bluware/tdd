<?php

/**
 *  Tdd builded on Frame Web Frame
 *
 *  @package  Frame\Tdd
 *  @author   Eugen Melnychenko
 */
namespace Frame\Tdd\Database;

use Frame\Tdd\Trace;
use Frame\Database;

use Exception;

/**
 * @subpackage Http
 */
class Mock
{
    /**
     *  @var string
     */
    protected $driver   = 'default';

    /**
     *  @var string
     */
    public static function query(callable $q, &$state = null)
    {
        $unit = new static();

        try {
            $connection = Database::connection($unit->driver);
        } catch (Exception $e) {
            Trace::error($e);
        }

        /**
         *  @var boolean
         */
        $exec = $unit->transaction(function() use ($unit, $q, &$state) {
            $state = $unit->query(
                $q
            );
        }, $error);

        /**
         *  @var boolean
         */
        if ($exec === false) {
            Trace::error($e);
        }

        /**
         *  @var boolean
         */
        return $state;
    }
}
