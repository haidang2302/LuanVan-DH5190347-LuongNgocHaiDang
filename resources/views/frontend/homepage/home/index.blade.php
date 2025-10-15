@extends('frontend.homepage.layout')

@section('content')
    <div id="homepage" class="homepage">
        <div class="panel-main-slide">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-medium">
                    <div class="uk-width-large-2-3">
                        @include('frontend.component.slide')
                    </div>
                    <div class="uk-width-large-1-3">
                        @if(count($slides['banner']['item']))
                        <div class="banner-wrapper">
                            <div class="uk-grid uk-grid-small">
                                @foreach($slides['banner']['item'] as $key => $val)
                                    <div class="uk-width-small-1-2 uk-width-medium-1-1">
                                        <div class="banner-item">
                                            <a href="{{ $val['canonical'] }}" title="{{ $val['description'] }}"><img src="{{ $val['image'] }}" alt="{{ $val['image'] }}"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Flash Sale đã được xóa --}}
        <div class="panel-general page">
            <div class="uk-container uk-container-center">
                @if(isset($widgets['product']->object) && count($widgets['product']->object))
                    @foreach($widgets['product']->object as $key => $category)
                    @php
                        $catName = $category->languages->first()->pivot->name;
                        $catCanonical = write_url($category->languages->first()->pivot->canonical)
                    @endphp
                    <div class="panel-product">
                        {{-- <style>
                            .main-heading:before {
                                filter: brightness(96%);
                                content: '';
                                display: block;
                                position: absolute;
                                left: 0;
                                top: 0;
                                width: 120px;
                                height: 40px;
                            
                                background-size: 100% !important;
                                background: url({{ $system['homepage_logo'] }}) 100% no-repeat;
                            }
                        </style> --}}
                        <div class="main-heading">
                            <div class="panel-head">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <h2 class="heading-1"><a href="{{ $catCanonical }}" title="{{ $catName }}">{{ $catName }}</a></h2>
                                    <a href="{{ $catCanonical }}" class="readmore">Tất cả sản phẩm</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(count($category->products))
                            <div class="uk-grid uk-grid-medium">
                                @foreach($category->products as $index => $product)
                                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                                    @include('frontend.component.product-item', ['product' => $product])
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Phần tin thời trang đã được xóa --}}

    </div>
@endsection
