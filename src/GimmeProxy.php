<?php

namespace Xchimx\GimmeProxy;

use GuzzleHttp\Client;

class GimmeProxy
{
    protected $client;

    protected $baseUrl = 'https://gimmeproxy.com/api/getProxy';

    public function __construct()
    {
        $this->client = new Client;
    }

    public function getProxy(array $params = [])
    {
        $amount = isset($params['amount']) ? intval($params['amount']) : 1;
        unset($params['amount']);

        $results = [];
        $errorsInRow = 0;

        while (count($results) < $amount) {
            try {
                $response = $this->client->get($this->baseUrl, [
                    'query' => $params,
                ]);

                $body = (string) $response->getBody();

                if (isset($params['ipPort']) && $params['ipPort'] === 'true') {
                    $proxy = trim($body);
                } elseif (isset($params['curl']) && $params['curl'] === 'true') {
                    $proxy = trim($body);
                } else {
                    $proxy = json_decode($body, true);

                    if (isset($proxy['error']) && $proxy['error'] === 'no more proxies left') {
                        $errorsInRow++;
                        if ($errorsInRow >= 3) {
                            break;
                        }

                        continue;
                    }
                }

                if (! in_array($proxy, $results, true)) {
                    $results[] = $proxy;
                }

            } catch (\Exception $e) {
                $errorsInRow++;
                if ($errorsInRow >= 3) {
                    break;
                }

                continue;
            }
        }

        return $results;
    }
}
