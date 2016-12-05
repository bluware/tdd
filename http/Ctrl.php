<?php

/**
 *  TDD builded on Frame Web Frame
 *
 *  @package  Frame\TDD
 *  @author   Eugen Melnychenko
 */
namespace Frame\TDD\Http;

use Frame\Http\Uri;
use Frame\Http\Client;
use Frame\TDD\Trace;

use Exception;

/**
 * @subpackage Http
 */
abstract class Ctrl
{
    /**
     *  @var array
     */
    protected $headers      = [
        'Content-Type' => 'application/json;charset=utf8',
    ];

    /**
     *  @param  [type] $url [description]
     *
     *  @return [type]      [description]
     */
    public function get($url, callable $call = null)
    {
        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::get($uri);

        /**
         *  @var void
         */
        $client->headers(
            $this->headers
        );

        /**
         *  @var mixed
         */
        if ($call !== null)
            call_user_func($call, $client);

        try {
            /**
             *  @var mixed
             */
            $response = $client->send();

            /**
             *  @var mixed
             */
            Trace::commit();

            /**
             *  @var mixed
             */
            return $response;
        } catch (Exception $e) {
            Trace::error($e);
        }

        return null;
    }

    public function post($url, $data, callable $call = null)
    {
        if (gettype($data) === 'object')
            $data = $data->to('json');

        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::post(
            $uri, $data
        );

        /**
         *  @var void
         */
        $client->headers(
            $this->headers
        );

        /**
         *  @var mixed
         */
        if ($call !== null)
            call_user_func($call, $client);

        try {
            /**
             *  @var mixed
             */
            $response = $client->send();

            /**
             *  @var mixed
             */
            Trace::commit();

            /**
             *  @var mixed
             */
            return $response;
        } catch (Exception $e) {
            Trace::error($e);
        }

        return null;
    }

    public function put($url, $data, callable $call = null)
    {
        /**
         *  @var boolean
         */
        if (gettype($data) === 'object')
            $data = $data->to('json');

        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::put(
            $url, $data
        );

        /**
         *  @var void
         */
        $client->headers(
            $this->headers
        );

        /**
         *  @var mixed
         */
        if ($call !== null)
            call_user_func($call, $client);

        try {
            /**
             *  @var mixed
             */
            $response = $client->send();

            /**
             *  @var mixed
             */
            Trace::commit();

            /**
             *  @var mixed
             */
            return $response;
        } catch (Exception $e) {
            Trace::error($e);
        }

        return null;
    }

    public function delete($url, $data, callable $call = null)
    {
        /**
         *  @var mixed
         */
        if (gettype($data) === 'object')
            $data = $data->to('json');

        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::delete(
            $url, $data
        );

        /**
         *  @var void
         */
        $client->headers(
            $this->headers
        );

        /**
         *  @var mixed
         */
        if ($call !== null)
            call_user_func($call, $client);


        try {
            /**
             *  @var mixed
             */
            $response = $client->send();

            /**
             *  @var mixed
             */
            Trace::commit();

            /**
             *  @var mixed
             */
            return $response;
        } catch (Exception $e) {
            Trace::error($e);
        }

        return null;
    }


}
