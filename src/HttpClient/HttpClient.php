<?php

namespace DHLParcel\API\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * The default options that are passed to the Guzzle Client
     *
     * @var array
     */
    protected $options = [
        'base_url' => 'https://api-gw.dhlparcel.nl/',
        'defaults' => [
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'dhlparcels-api',
            ],
        ],
    ];

    /** @var ClientInterface */
    protected $client;

    /**
     * Construct a new HttpClient instance. Optional parameters can be supplied.
     * A Guzzle client can optionally be passed as argument, but a new instance
     * will be created by default.
     *
     * @param array $options
     * @param ClientInterface $client
     */
    public function __construct($options = [], ClientInterface $client = null)
    {
        $this->options = array_merge($this->options, $options);
        $client = $client ?: new Client($this->options);
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function get($path, $query = [])
    {
        $response = $this->client->get($path, [
            'query' => $query,
        ]);

        return json_decode($response->getBody());
    }
}

