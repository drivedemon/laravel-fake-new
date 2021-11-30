<?php

namespace App\Domain\Repo;

use GuzzleHttp\Client as GuzzleHttpClient;
use Psr\Http\Message\ResponseInterface;

class FakeNewsRepo
{
    private GuzzleHttpClient $client;

    public function __construct(GuzzleHttpClient $client)
    {
        $this->client = $client;
    }

    public function getPosts(): array
    {
        return $this->get('posts.json', true);
    }

    public function getAuthors(): array
    {
        return $this->get('authors.json', true);
    }

    private function getUrl(string $path): string
    {
        return sprintf('%s%s', env('FAKE_NEW_URL'), $path);
    }

    private function getHeader(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    private function get(string $endpoint, bool $assoc = false): mixed
    {
        $response = $this->client->get($this->getUrl($endpoint), [
            'headers' => $this->getHeader(),
        ]);

        return $this->formatResponse($response, $assoc);
    }

    private function formatResponse(ResponseInterface $response, bool $assoc): mixed
    {
        return json_decode($response->getBody()->getContents(), $assoc);
    }
}
