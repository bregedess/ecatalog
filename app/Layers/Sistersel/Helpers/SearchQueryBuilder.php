<?php


namespace App\Layers\Sistersel\Helpers;


class SearchQueryBuilder
{
    protected $currentPage;
    protected $pageSize;
    protected $filterGroups;
    protected $filters;
    protected $field;
    protected $value;
    protected $conditionType;

    public function __construct($field, $value, $conditionType, $currentPage = 1, $pageSize = 15)
    {
        $this->currentPage      = $currentPage;
        $this->pageSize         = $pageSize;
        $this->field            = $field;
        $this->value            = $value;
        $this->conditionType    = $conditionType;
    }

    public function build()
    {
        $query['searchCriteria'] = [];

        $searchCriteria['currentPage']      = $this->currentPage;
        $searchCriteria['pageSize']         = $this->pageSize;
        $searchCriteria['filterGroups'][0]  = [
            'filters' => [
                0 => [
                    'field' => $this->field,
                    'value' => $this->value,
                    'conditionType' => $this->conditionType
                ]
            ]
        ];

        $query['searchCriteria'] = $searchCriteria;

        return $query;
    }

}
