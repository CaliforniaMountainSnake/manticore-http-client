<?php

namespace CaliforniaMountainSnake\ManticoreClient;

use CaliforniaMountainSnake\UtilTraits\Curl\CurlUtils;

/**
 * A simple client allows to execute search requests to the Manticore APIs.
 */
class ManticoreHttpClient implements ManticoreHttpApiEndpoints, ManticoreJsonApiKeywords
{
    use CurlUtils;

    public const DEFAULT_MANTICORE_HTTP_HOST = 'http://localhost';
    public const DEFAULT_MANTICORE_HTTP_PORT = '9308';

    /**
     * @var string
     */
    protected $host;

    /**
     * @var int
     */
    protected $port;

    /**
     * Manticore constructor.
     *
     * @param string $host
     * @param int    $port
     */
    public function __construct(string $host = 'http://localhost', int $port = 9308)
    {
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * Execute any request to the Manticore JSON API.
     *
     * @see https://docs.manticoresearch.com/latest/html/httpapi_reference.html#json-api
     *
     * @param string $_api_endpoint
     * @param array  $_query_params
     *
     * @return SearchResult
     * @throws \LogicException
     */
    public function requestJson(string $_api_endpoint, array $_query_params): SearchResult
    {
        $arr = $this->postJson($this->host . ':' . $this->port . $_api_endpoint, $_query_params)->jsonDecode();
        $this->assertSearchResultIsNotNull($arr);

        return SearchResult::fromArray($arr);
    }

    /**
     * Execute any request to the Manticore SQL API.
     *
     * Allows running a SELECT SphinxQL, set as query parameter.
     * Manticore Search doesn't support server-side prepared statements.
     * Client-side prepared statements can be used with Manticore.
     *
     * @see https://docs.manticoresearch.com/latest/html/httpapi_reference.html#sql-api
     * @see https://docs.manticoresearch.com/latest/html/sphinxql_reference.html#sphinxql-reference
     *
     * @param string $sql The query in the SphinxQL sql dialect. All user's input parameters must be escaped manually.
     *
     * @return SearchResult
     * @throws \LogicException
     */
    public function requestSql(string $sql): SearchResult
    {
        $arr = $this->getQuery($this->host . ':' . $this->port . self::SQL_API_ENDPOINT, [
            'query' => $sql
        ])->jsonDecode();
        $this->assertSearchResultIsNotNull($arr);

        return SearchResult::fromArray($arr);
    }

    /**
     * @param array $_search_result
     *
     * @throws \LogicException
     */
    private function assertSearchResultIsNotNull(array $_search_result): void
    {
        if ($_search_result === null) {
            throw new \LogicException("Can't parse a manticore server's json response!");
        }
    }
}
