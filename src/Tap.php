<?php

namespace Moathdev\Tap;

use Illuminate\Config\Repository as Config;
use Moathdev\Tap\Traits\ChargeTrait;
use Illuminate\Support\Facades\Http;
use BadMethodCallException;


class Tap
{

    use ChargeTrait;


    /**
     * Store the config values.
     */
    private $tconfig;

    private $key;

    private $url;

    private $response;

    public function __construct(Config $config)
    {
        if ($config->has('tap.API_URL')) {
            $this->tconfig = $config->get('tap');
        } else {
            throw new BadMethodCallException('Tap Payment no config found');
        }

        $this->key = $this->tconfig['debug'] ? env('TAP_SECRET_KEY_SANDBOX') : env('TAP_SECRET_KEY_LIVE');

        if (is_null($this->key)) {
            throw new BadMethodCallException('Tap Payment API keys missing');
        }

        if (!$config->has('tap.API_URL')) {
            throw new BadMethodCallException('Tap Payment API URL missing');
        }

        $this->url = $this->tconfig['API_URL'];

        $this->response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->key,
            'content-type' => 'application/json'
        ]);

    }

    public function get($name, $parameters = [])
    {
        return $this->query($name, 'GET', $parameters);
    }

    public function post($name, $parameters = [])
    {
        return $this->query($name, 'POST', $parameters);
    }

    public function query($name = null, $requestMethod = 'GET', $parameters = [])
    {
        if ($requestMethod == 'POST') {
            $response = $this->response->post($this->url.$name, $parameters);
        } else {
            $response = $this->response->get($this->url.$name, $parameters);
        }

        return $response->object();
    }
}