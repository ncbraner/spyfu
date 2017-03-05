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

    protected function buildUrl($endPoint, $clientUrl)
    {
        return "https://www.spyfu.com/apis/url_api/{$endPoint}?q={$clientUrl}&r=10&api_key={$this->apiSecret}";
    }

    public function get($endPoint, $clientUrl)
    {
        try {
            $result = $this->client->request('GET', $this->buildUrl($endPoint, $clientUrl));
            return $result->getBody()->getContents();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
