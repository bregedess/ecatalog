<?php

namespace App\Http\Controllers;


use App\Layers\Sistersel\GetBookletCatalogList;

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
        //TODO get booklet name and put on data
        return view('booklets.catalogues.detail', ['data' => $data]);
    }
}
