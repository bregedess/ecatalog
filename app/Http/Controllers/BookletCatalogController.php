<?php

namespace App\Http\Controllers;


use App\Layers\Sistersel\Booklet\GetBookletDetail;
use App\Layers\Sistersel\BookletCatalog\GetBookletCatalogList;
use App\Layers\Sistersel\Member\GetMemberDetail;
use Illuminate\Http\Request;

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

    public function index(Request $request, $booklet_id)
    {
        $page   = $request->input('page', 1);
        $limit  = $request->input('limit', 4);

        $bookletLayer = new GetBookletCatalogList($booklet_id, $page, $limit);
        $data = $bookletLayer->handle();

        return response()->json($data);
    }

    public function getView($booklet_id)
    {
        $bookletLayer = new GetBookletCatalogList($booklet_id);
        $data = $bookletLayer->handle();

        $bookletDetail = new GetBookletDetail($booklet_id);
        $booklet = $bookletDetail->handle();

        $memberDetail = new GetMemberDetail($booklet->member_id);
        $member = $memberDetail->handle();

        return view('booklets.catalogues.detail', [
            'booklet'   => $booklet,
            'member'    => $member,
            'data'      => $data,
        ]);
    }
}
