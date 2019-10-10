<?php

namespace CaliforniaMountainSnake\ManticoreClient;

/**
 * @see https://docs.manticoresearch.com/latest/html/httpapi_reference.html#json-api
 */
interface ManticoreHttpApiEndpoints
{
    public const SQL_API_ENDPOINT = '/sql';
    public const JSON_BULK_API_ENDPOINT = '/json/bulk';
    public const JSON_DELETE_API_ENDPOINT = '/json/delete';
    public const JSON_INSERT_API_ENDPOINT = '/json/insert';
    public const JSON_PERCOLATE_API_ENDPOINT = '/json/pq';
    public const JSON_REPLACE_API_ENDPOINT = '/json/replace';
    public const JSON_SEARCH_API_ENDPOINT = '/json/search';
}
