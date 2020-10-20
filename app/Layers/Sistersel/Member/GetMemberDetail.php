<?php


namespace App\Layers\Sistersel\Member;


use App\Layers\Sistersel;
use Illuminate\Support\Facades\Log;

class GetMemberDetail extends Sistersel
{
    protected $uri = '/rest/V1/membership/member/:memberId';

    public function __construct($member_id)
    {
        parent::__construct();
        $this->uri = strtr($this->uri, [':memberId' => $member_id]);
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
