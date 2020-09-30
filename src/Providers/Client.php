<?php

namespace MoveMoveIo\DaData\Providers;

use Illuminate\Support\Facades\Http;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait Client
 * @package MoveMoveIo\DaData\Providers
 */
trait Client
{

    /**
     * @param array $headers
     * @param string $url
     * @param array $data
     * @param int $timeout
     * @return array
     * @throws \Exception
     */
    public function getPostData(array $headers, string $url, array $data, int $timeout) : array
    {
        $response   = Http::withHeaders($headers)->timeout($timeout)->post($url, $data);
        $data       = json_decode($response->body(), true);

        if ($response->status() != Response::HTTP_OK) {
            throw new \Exception($data['message'] ?? Response::$statusTexts[$response->status()], $response->status());
        }

        return $data;
    }

}
