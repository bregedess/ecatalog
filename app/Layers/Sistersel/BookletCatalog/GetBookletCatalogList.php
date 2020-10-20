<?php


namespace App\Layers\Sistersel\BookletCatalog;


use App\Layers\Sistersel;
use Illuminate\Support\Facades\Log;

class GetBookletCatalogList extends Sistersel
{
    protected $queryParams;

    protected $uri = '/rest/V1/sistersel-ecatalog/product/search';

    protected $page;
    protected $limit;

    public function __construct($booklet_id, $page = 1, $limit = 4)
    {
        parent::__construct();
        $this->queryParams = (new Sistersel\Helpers\SearchQueryBuilder('booklet_id', $booklet_id, 'in', $page, $limit))
            ->build();
        $this->page  = $page;
        $this->limit = $limit;
    }

    public function handle()
    {
        try {
            $response = $this->client->get($this->uri, [
                'headers'   => $this->headers,
                'query'     => $this->queryParams,
            ]);

            $data = json_decode($response->getBody()->getContents());

            $lastPage = max((int) ceil($data->total_count / $this->limit), 1);

            if ($this->page < $lastPage) {
                $data->is_have_next_page = true;
            } else {
                $data->is_have_next_page = false;
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return $data;
    }

}
