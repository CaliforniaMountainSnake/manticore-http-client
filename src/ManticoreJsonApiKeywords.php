<?php

namespace CaliforniaMountainSnake\ManticoreClient;

/**
 * The list of keywords that can be used in queries to the Manticore json api.
 *
 * @see https://docs.manticoresearch.com/latest/html/http_reference/json_search.html
 */
interface ManticoreJsonApiKeywords
{
    public const INDEX = 'index';
    public const QUERY = 'query';
    public const MATCH = 'match';
    public const MATCH_PHRASE = 'match_phrase';
    public const MATCH_ALL = 'match_all';
    public const QUERY_STRING = 'query_string';
    public const OPERATOR = 'operator';
    public const BOOL = 'bool';
    public const MUST = 'must';
    public const SHOULD = 'should';
    public const MUST_NOT = 'must_not';
    public const GREATHER_OR_EQUAL = 'gte';
    public const LESS_OR_EQUAL = 'lte';
    public const LESS_THAN = 'lt';
    public const GREATHER_THAN = 'gt';
    public const EQUALS = 'equals';
    public const RANGE = 'range';
    public const SORT = 'sort';
    public const ASC = 'asc';
    public const DESC = 'desc';
    public const MODE = 'mode';
    public const MIN = 'min';
    public const MAX = 'max';
    public const SCRIPT_FIELDS = 'script_fields';
    public const HIGHLIGHT = 'highlight';
    public const LIMIT = 'limit';
    public const OFFSET = 'offset';

    public const GEO_DISTANCE = 'geo_distance';
    public const LOCATION_ANCHOR = 'location_anchor';
    public const LOCATION_SOURCE = 'location_source';
    public const DISTANCE_TYPE = 'distance_type';
    public const ADAPTIVE = 'adaptive';
    public const DISTANCE = 'distance';
    public const METERS = 'meters';
    public const KILOMETERS = 'kilometers';
    public const CENTIMETERS = 'centimeters';
    public const MILLIMETERS = 'millimeters';
    public const MILES = 'miles';
    public const YARDS = 'yards';
    public const FEET = 'feet';
    public const INCH = 'inch';
    public const NAUTICALMILES = 'nauticalmiles';
    public const LAT = 'lat';
    public const LON = 'lon';
    public const ATTR_LAT = 'attr_lat';
    public const ATTR_LON = 'attr_lon';
}
