<?php

namespace DHLParcel\API;

use DHLParcel\API\HttpClient\HttpClient;
use DHLParcel\API\HttpClient\HttpClientInterface;

class Api
{
    /** @var HttpClientInterface $client  */
    protected $client;

    /**
     * @param HttpClientInterface|null $client
     */
    public function __construct(HttpClientInterface $client = null)
    {
        $this->client = $client ?: new HttpClient();
    }

    /**
     * Find Parcel Shop Locations.
     *
     * @param string $countryCode
     * @param array  $query
     * @return array|mixed
     */
    public function findParcelShopLocations($countryCode = 'NL', $query = [])
    {
        return $this->client->get("parcel-shop-locations/{$countryCode}", $query);
    }

    /**
     * Find Parcel Shop by given id.
     *
     * @param string $countryCode
     * @param array  $query
     * @return array|mixed
     */
    public function findParcelShopById($countryCode = 'NL', $id)
    {
        return $this->client->get("parcel-shop-locations/{$countryCode}/{$id}");
    }
}
