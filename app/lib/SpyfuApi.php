<?php

namespace Ecreativeworks\Spyfu\lib;

/**
 * @property  client
 */
class SpyfuApi
{

    public function __construct($client)
    {
        $this->apiSecret = getenv('SPYFU_KEY');
        $this->client = $client;
    }

    protected function buildUrl($endPoint, $clientUrl, $term)
    {
        return "http://www.spyfu.com/apis/url_api/{$endPoint}?q={$clientUrl}&r=1&t={$term}&api_key={$this->apiSecret}";
    }

    public function get($endPoint, $clientUrl,$term)
    {
        try {
            $result = $this->client->request('GET', $this->buildUrl($endPoint,$clientUrl,$term));
            return $result->getBody()->getContents();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
