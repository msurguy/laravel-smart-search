@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
          @include('partials.sidebar.categories', array('categories' => $categories,'current' => 0))
        </div>
        <div class="col-md-9">
            <div class="row" style="margin-bottom:30px;">
                <div class="col-md-12">                                              
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <img alt="First slide" src="http://placehold.it/800x200" style="width: 100%;">
                          </div>
                          <div class="item">
                            <img alt="Second slide" src="http://placehold.it/800x200" style="width: 100%;">
                          </div>
                          <div class="item">
                            <img alt="Third slide" src="http://placehold.it/800x200" style="width: 100%;">
                          </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="thumbnail">
                    <img src="http://placehold.it/320x120" alt="">
                    <div class="caption">
                        <h4 class="pull-right">${{ number_format($product->pricing, 2);}}</h4>
                        <h4><a href="{{url('products/'.$product->slug)}}">{{$product->name}}</a></h4>
                        <p>{{$product->short_description}}</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">{{$product->rating_count}} {{ Str::plural('review', $product->rating_count);}}</p>
                        <p>
                            @for ($i=1; $i <= 5 ; $i++)
                                <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                            @endfor
                        </p>
                    </div>
                  </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@stop