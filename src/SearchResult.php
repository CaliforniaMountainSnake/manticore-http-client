<?php

namespace CaliforniaMountainSnake\ManticoreClient;

/**
 * Manticore search result.
 *
 * @see https://docs.manticoresearch.com/latest/html/http_reference/json_search.html#result-set-format
 */
class SearchResult
{
    /**
     * Time in milliseconds it took to execute the search
     *
     * @var int
     */
    protected $took;

    /**
     * If the query timed out or not.
     *
     * @var bool
     */
    protected $timed_out;

    /**
     * Search results.
     *
     * @var array
     */
    protected $hits;

    /**
     * Total number of matching documents.
     *
     * @var int
     */
    protected $total;

    /**
     * SearchResult constructor.
     *
     * @param int   $took
     * @param bool  $timed_out
     * @param array $hits
     * @param int   $total
     */
    public function __construct(int $took, bool $timed_out, array $hits, int $total)
    {
        $this->took = $took;
        $this->timed_out = $timed_out;
        $this->hits = $hits;
        $this->total = $total;
    }

    /**
     * @param array $_arr
     *
     * @return SearchResult
     * @throws \LogicException
     */
    public static function fromArray(array $_arr): self
    {
        $error = $_arr['error'] ?? null;
        if ($error !== null) {
            throw new \LogicException('The search failed with the error: "' . $error . '"');
        }

        return new self ($_arr['took'], $_arr['timed_out'], $_arr['hits']['hits'], $_arr['hits']['total']);
    }

    /**
     * @return string[]
     */
    public function getIds(): array
    {
        $result = [];
        foreach ($this->hits as $hit) {
            $result[] = $hit['_id'];
        }

        return $result;
    }

    /**
     * @return int
     */
    public function getTook(): int
    {
        return $this->took;
    }

    /**
     * @return bool
     */
    public function isTimedOut(): bool
    {
        return $this->timed_out;
    }

    /**
     * @return array
     */
    public function getHits(): array
    {
        return $this->hits;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
}
