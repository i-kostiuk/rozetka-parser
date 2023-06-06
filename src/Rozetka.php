<?php

namespace Rozetka;

use Rozetka\common\Constants;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Rozetka
{

    protected string $url;

    protected array $errors = [];

    protected Client $client;

    /*
     * Поля для видачі користувачеві
     * */
    protected int $statusCode;

    protected ?string $body;

    protected ?array $headers;

    /*
     * Поля, які будуть використовуватись при парсингу
     * */
    protected Crawler $crawler;

    protected string $parseType;
    protected array $parseData = [];

    public function __construct(string $url) {
        $this->url = $url;
        $this->prepareParse();
    }

    private function prepareParse() {
        if (!$this->url) {
            $this->errors[] = Constants::ERROR_URL_IS_EMPTY;
        } else {
            $this->getClient();
            $response = $this->client->request('GET', $this->url);
            $this->statusCode = $response->getStatusCode();
            $this->body = $response->getBody();
            $this->headers = $response->getHeaders();
            if (!in_array($this->statusCode, Constants::SUCCESS_STATUS_CODES)) {
                $this->errors[] = Constants::ERROR_RESPONSE_CODE;
            }

        }
    }

    private function getClient() {
        $this->client = new Client();
    }

    /*
     * Ґеттери start
     * */
    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getBody() {
        return $this->body;
    }

    public function getHeaders() {
        return $this->headers;
    }
    /*
     * Ґеттери end
     * */
    public function parse() {
        // спочатку потрібно зрозуміти яку сторінку парсимо, це буде таким собі - типом.
        $this->crawler = new Crawler($this->body);

        if ($this->isProductCard()) { // якщо це сторінка товару - парсимо товар
            $this->parseProductCard();
        }

        return [
            'type' => $this->parseType,
            'data' => $this->parseData,
            'errors' => $this->errors,
        ];
    }

    private function isProductCard() {
        // перевірка чи є заголовок товару
        $isProductTitle = (bool)$this->crawler->filter('h1.product__title')->count();
        // чи є на сторінці таби із опціями товару
        $isProductTabs = (bool)$this->crawler->filter('.product-tabs')->count();
        // чи є блоки із описами і деталями товару
        $isProductAbout = (bool)$this->crawler->filter('.product-about')->count();
        return $isProductTitle && $isProductTabs && $isProductAbout;
    }

    private function parseProductCard() {
        $this->parseType = 'Product';
        // потрібен заголовок товару
        if ($this->crawler->filter('h1.product__title')->count()) {
            $this->parseData['title'] = trim($this->crawler->filter('h1.product__title')->text());
        }

        $jsonData = [];

        if ($this->crawler->filter('[data-module-key="script_seo_markupProduct"]')->count()) {
            $jsonData = $this->crawler->filter('[data-module-key="script_seo_markupProduct"]')->text();
            $jsonData = json_decode($jsonData, true);
        }

        if (isset($jsonData['offers'])) {
            $offers = $jsonData['offers'];
            if ($offers['price']) {
                $this->parseData['price'] = $offers['price'];
            }
            if ($offers['priceCurrency']) {
                $this->parseData['currency'] = $offers['priceCurrency'];
            }
            if (isset($offers['availability'])) {
                $this->parseData['availability'] = $offers['availability'];
            }
        }

        if (isset($jsonData['brand'])) {
            $brand = $jsonData['brand'];
            if ($brand['name']) {
                $this->parseData['brand'] = $brand['name'];
            }
        }

        if (isset($jsonData['aggregateRating'])) {
            $rating = $jsonData['aggregateRating'];
            $this->parseData['rating'] = $rating;
        }

        if (isset($jsonData['description'])) {
            $this->parseData['description'] = $jsonData['description'];
        }

        if (isset($jsonData['image'])) {
            $this->parseData['image'] = $jsonData['image'];
        }

        if (isset($jsonData['url'])) {
            $this->parseData['url'] = $jsonData['url'];
        }

        if (isset($jsonData['sku'])) {
            $this->parseData['sku'] = $jsonData['sku'];
        }

        if (isset($jsonData['sku'])) {
            $this->parseData['sku'] = $jsonData['sku'];
        }

    }

}