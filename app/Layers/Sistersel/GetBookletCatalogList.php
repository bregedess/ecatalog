<?php


namespace App\Layers\Sistersel;


use App\Layers\Sistersel;
use Illuminate\Support\Facades\Log;

class GetBookletCatalogList extends Sistersel
{
    protected $queryParams;

    const URI = '/rest/V1/sistersel-ecatalog/product/search';

    public function __construct($booklet_id)
    {
        parent::__construct();
        $this->queryParams = (new Sistersel\Helpers\SearchQueryBuilder('booklet_id', $booklet_id, 'in'))
            ->build();
    }

    public function handle()
    {
        try {
            $response = $this->client->get(self::URI, [
                'headers'   => $this->headers,
                'query'     => $this->queryParams,
            ]);

            $data = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return $data;
    }

}
