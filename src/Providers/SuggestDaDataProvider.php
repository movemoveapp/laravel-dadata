<?php

namespace MoveMoveIo\DaData\Providers;

/**
 * Class SuggestDaDataProvider
 * @package MoveMoveIo\DaData\Providers
 */
class SuggestDaDataProvider
{

    use Client;

    /**
     * @var string
     */
    protected $api  = 'https://suggestions.dadata.ru/suggestions/api';

    /**
     * @var string
     */
    protected $v    = '4_1';

    /**
     * @var string application/json
     */
    protected $content_type = 'application/json';

    /**
     * @var string
     */
    protected $accept       = 'application/json';

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var int
     */
    protected $timeout;

    /**
     * SuggestDaDataProvider constructor.
     *
     * @param string $token
     * @param string $secret
     * @param int $timeout
     * @param string $v
     */
    public function __construct(string $token, string $secret, int $timeout = 10, $v = '4_1')
    {
        $this->token    = $token;
        $this->secret   = $secret;
        $this->timeout  = $timeout;
        $this->v        = $v;

    }

    /**
     * @param string $method
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function post(string $method, array $data = []) : array
    {
        $headers = [
            'Content-Type' => $this->content_type,
            'Accept'        => $this->accept,
            'Authorization' => sprintf('Token %s', $this->token),
            'X-Secret'      => $this->secret,
        ];
        $url     = sprintf('%s/%s/%s', $this->api, $this->v, $method);

        return $this->postData($headers, $url, $data, $this->timeout);
    }

    /**
     * @param string $method
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function get(string $method, array $data = []) : array
    {
        $headers = [
            'Accept'        => $this->accept,
            'Authorization' => sprintf('Token %s', $this->token),
        ];
        $url     = sprintf('%s/%s/%s', $this->api, $this->v, $method);

        return $this->getData($headers, $url, $data, $this->timeout);
    }



}
