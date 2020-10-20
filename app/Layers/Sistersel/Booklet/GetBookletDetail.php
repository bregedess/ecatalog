<?php


namespace App\Layers\Sistersel\Booklet;


use App\Layers\Sistersel;
use Illuminate\Support\Facades\Log;

class GetBookletDetail extends Sistersel
{
    protected $uri = '/rest/V1/sistersel-ecatalog/booklet/:bookletId';

    public function __construct($booklet_id)
    {
        parent::__construct();
        $this->uri = strtr($this->uri, [':bookletId' => $booklet_id]);
    }

    public function handle()
    {
        try {
            $response = $this->client->get($this->uri, [
                'headers'   => $this->headers,
            ]);

            $data = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return $data;
    }

}
