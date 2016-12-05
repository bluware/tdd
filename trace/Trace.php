<?php

/**
 *  TDD builded on Frame Web Frame
 *
 *  @package  Frame\TDD
 *  @author   Eugen Melnychenko
 */
namespace Frame\TDD;

use Exception;

/**
 * @subpackage Http
 */
class Trace
{
    /**
     *  @var array
     */
    protected static $trace = [];

    /**
     *  @var array
     */
    protected static $report = [
        'success' => 0,
        'fail'    => 0,
    ];

    /**
     *  @param  [type] $url [description]
     *
     *  @return [type]      [description]
     */
    public static function error(Exception $e)
    {
        array_push(static::$trace, $e);

        ++static::$report['fail'];
    }

    /**
     *  @param  [type] $url [description]
     *
     *  @return [type]      [description]
     */
    public static function commit()
    {
        ++static::$report['success'];
    }

    /**
     *  @param  [type] $url [description]
     *
     *  @return [type]      [description]
     */
    public static function gather()
    {
        $report = [
            '',
            '----------#' . time() . '------------',
            '',
            sprintf(
                '%s commit. %s success. %s fail',
                static::$report['success'] + static::$report['fail'],
                static::$report['success'],
                static::$report['fail']
            ),
            '',
        ];

        foreach (static::$trace as $i => $e) {
            array_push(
                $report, sprintf(
                    "> # %s\n> %s", $i, $e->getMessage()
                )
            );
        }

        array_push($report, '', '----------#end------------', '', '');

        return join("\n", $report);
    }

    /**
     *  @param  [type] $url [description]
     *
     *  @return [type]      [description]
     */
    public static function print()
    {
        echo static::gather();
    }

    /**
     *  @param  [type] $url [description]
     *
     *  @return [type]      [description]
     */
    public static function export($file)
    {
        file_put_contents(
            $file, static::gather()
        );
    }
}
