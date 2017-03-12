<?php

namespace TwitchApiBundle\Client;

abstract class AbstractClientV3 implements ClientV3Interface
{
    const BASE_URL = 'https://api.twitch.tv/kraken';

    /**
     * @var resource
     */
    protected $ch;

    /**
     * @var string
     */
    private $client_id = '';

    /**
     * @var int
     */
    private $timeout;

    public function __construct()
    {
        $this->ch = curl_init($this->ch);
    }

    abstract protected function getApiVersion();

    private function init($path)
    {
        curl_setopt($this->ch, CURLOPT_URL, self::BASE_URL . $path);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->getTimeout());

        // Workaround 'SSL certificate problem: unable to get local issuer certificate'
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, [
            'Accept: application/vnd.twitchtv.' . $this->getApiVersion() . '+json',
            'Client-ID: ' . $this->getClientId(),
        ]);
    }

    protected function httpRequest($path, $fields = array(), $method = null)
    {
        $this->init($path);

        if ($method === null) {
            $method = empty($fields) ? 'GET' : 'POST';
        }

        if ($method !== 'GET' && $method !== 'POST') {
            curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        if (!empty($fields)) {
            $fields_string = '';
            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . urlencode($value) . '&';
            }
            rtrim($fields_string, '&');
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields_string);
        }

        $data = curl_exec($this->ch);

        return $data;
    }

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }
}
