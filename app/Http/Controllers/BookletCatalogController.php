<?php

namespace App\Http\Controllers;


use App\Layers\Sistersel\Booklet\GetBookletDetail;
use App\Layers\Sistersel\BookletCatalog\GetBookletCatalogList;
use App\Layers\Sistersel\Member\GetMemberDetail;

class BookletCatalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($booklet_id)
    {
        $bookletLayer = new GetBookletCatalogList($booklet_id);
        $data = $bookletLayer->handle();

        $bookletDetail = new GetBookletDetail($booklet_id);
        $booklet = $bookletDetail->handle();
        $data->booklet = $booklet;

        $memberDetail = new GetMemberDetail($booklet->member_id);
        $member = $memberDetail->handle();
        $data->member = $member;

        return view('booklets.catalogues.detail', ['data' => $data]);
    }
}
