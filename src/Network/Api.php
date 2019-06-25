<?php

namespace Ynov\Network;

use GuzzleHttp\Client;

class Api
{

    private $client;
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->client = new Client();
    }

    public function get(array $data = array()): string
    {
        $response = $this->client->request('GET', $this->url, [
            'query' => $data
        ]);
        if ($response->getStatusCode() != 200)
        {
            throw new Exception("Erreur du serveur de l'API.");
        }
        return $response->getBody()->getContents();
    }

    public function getJSON(array $data = array()): array
    {
        $json_response = json_decode($this->get($data), JSON_OBJECT_AS_ARRAY);
        if (json_last_error() != JSON_ERROR_NONE)
        {
            throw new Exception("Retour de l'API n'est pas en JSON.");
        }
        return $json_response;
    }
}