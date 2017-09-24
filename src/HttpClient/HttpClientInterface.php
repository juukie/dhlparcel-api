<?php

namespace DHLParcel\API\HttpClient;

interface HttpClientInterface
{
    /**
     * @param  string $path
     * @param  array $query
     * @return array
     */
    public function get($path, $query = []);
}
