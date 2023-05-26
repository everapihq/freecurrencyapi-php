<?php

namespace FreeCurrencyApi\FreeCurrencyApi;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * Exposes the freecurrencyapi library to client code.
 */
class FreeCurrencyApiClient
{
    const BASE_URL = 'https://api.freecurrencyapi.com/v1/';
    const REQUEST_TIMEOUT_DEFAULT = 15; // seconds

    protected Client $httpClient;

    public function __construct(public string $apiKey, ?array $settings = [])
    {
        $guzzle_opts = [
            'http_errors' => false,
            'headers' => $this->buildHeaders($apiKey),
            'timeout' => $settings['timeout'] ?? self::REQUEST_TIMEOUT_DEFAULT
        ];
        if (isset($settings['guzzle_opts'])) {
            $guzzle_opts = array_merge($guzzle_opts, $settings['guzzle_opts']);
        }
        $this->httpClient = new Client($guzzle_opts);
    }

    /**
     * @throws FreeCurrencyApiException
     */
    private function call(string $endpoint, ?array $query = [])
    {
        $url = self::BASE_URL . $endpoint;

        try {
            $response = $this->httpClient->request('GET', $url, [
                'query' => $query
            ]);
        } catch (GuzzleException $e) {
            throw new FreeCurrencyApiException($e->getMessage());
        } catch (Exception $e) {
            throw new FreeCurrencyApiException($e->getMessage());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @throws FreeCurrencyApiException
     */
    public function status()
    {
        return $this->call('status');
    }

    /**
     * @throws FreeCurrencyApiException
     */
    public function currencies(?array $query = [])
    {
        return $this->call('currencies', $query);
    }

    /**
     * @throws FreeCurrencyApiException
     */
    public function latest(?array $query = [])
    {
        return $this->call('latest', $query);
    }

    /**
     * @throws FreeCurrencyApiException
     */
    public function historical($query)
    {
        return $this->call('historical', $query);
    }

    private function buildHeaders($apiKey)
    {
        return [
            'user-agent' => 'Freecurrencyapi/PHP/0.1',
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'apikey' => $apiKey,
        ];
    }
}
