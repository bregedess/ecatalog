@extends('layouts.app')

<style>
    .flex-container {
        padding: 0;
        margin: 0;
        list-style: none;
        border: 1px solid silver;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -moz-flex;
        display: -webkit-flex;
        display: flex;
    }

    .wrap {
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .flex-item {
        background: bisque;
        padding: 4px;
        flex: 0 50%;
        box-sizing: border-box;
    }

    .pic-size {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .container {
        padding-left: .5rem !important;
        padding-right: .5rem !important;
        margin-bottom: .5rem !important;
        margin-top: .5rem !important;
    }

    .pic-item {
        position: relative;
        height: 195px;
        width: 100%;
        overflow: hidden;
    }

    .description-item {
        background-color: #fff;
        padding: 6px;
        min-height: 90px;
    }

    .font-setup {
        font-weight: 500;
        color: #333;
        font-size: 11px;
    }

    .item-name {
        color: #8C8C8C;
        font-size: 11px;
    }

    .item-price {
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .header {
        background-color: #fff;
        height: 56px;
        align-items: center !important;
        justify-content: center !important;
        display: flex !important;
    }

    .header-font {
        font-family: "Roboto",sans-serif;
        font-size: 16px;
        font-weight: 500;
    }

</style>

@section('content')
    <div class="container">
        <div class="header">
            <div class="header-font">{{$booklet->title}}</div>
        </div>
        <div class="banner">

        </div>
        <div class="info-name">
            <p>{{$member->member_name}}</p>
            <p>{{$member->mobile_phone}}</p>
        </div>
{{--        <p>{{$data->total_count}} Produk</p>--}}

        <div class="row justify-content-center">
            <div>
                <div class="flex-container wrap">
                    @foreach($data->items as $row)
                        <div class="flex-item">
                            <div class="pic-item">
                                <img src="{{$row->image}}" class="pic-size">
                            </div>
                            <div class="description-item">
                                <div class="font-setup"></div>
                                <div class="item-name">{{$row->display_name}}</div>
                                <div class="item-price">
                                    Rp.
                                    {{number_format($row->display_price, 0, ',', '.')}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
