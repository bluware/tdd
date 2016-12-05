<?php

/**
 *  Tdd builded on Frame Web Frame
 *
 *  @package  Frame\TDD
 *  @author   Eugen Melnychenko
 */
namespace Frame\Tdd\Http;

use Frame\Http\Uri;
use Frame\Http\Client;
use Frame\Tdd\Trace;

use Exception;

/**
 * @subpackage Http
 */
abstract class Ctrl extends \Frame\Controller
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

    /**
     *  @param  string    $url  [description]
     *  @param  mixed    $data [description]
     *  @param  callable $call [description]
     *
     *  @return mixed
     */
    public function post($url, callable $call = null)
    {
        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::post($uri);

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

    public function put($url, callable $call = null)
    {

        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::put($url);

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

    public function delete($url, callable $call = null)
    {
        /**
         *  @var Uri
         */
        $uri    = new Uri($url);

        /**
         *  @var Client
         */
        $client = Client::delete(
            $url
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
