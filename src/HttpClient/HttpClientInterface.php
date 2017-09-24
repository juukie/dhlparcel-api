<?php

namespace DHLParcel\API\HttpClient;

interface HttpClientInterface
{
    /**
     * @param  string $path
     * @param  array $query
     * @return array
     * @throws \DHLParcel\API\Exception\InvalidResponseException
     */
    public function get($path, $query = []);
}
