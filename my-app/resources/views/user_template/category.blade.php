@extends('user_template.layouts.template')
@section('main-content')


<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">

<h2> {{ $category->category_name }}({{ $category->product_count}})</h2>

                <h1 class="fashion_taital">All Products</h1>
                <div class="fashion_section_2">
                   <div class="row">
                    @foreach ( $products as $product )
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">{{ $product->product_name }}</h4>
                           <p class="price_text">Price  <span style="color: #262626;">{{ $product->price }}</span></p>
                           <div class="tshirt_img"><img src="{{asset($product->product_img)}}"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                    @endforeach

                   </div>
                </div>
             </div>
          </div>

       </div>
       <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a>
    </div>
 </div>

@endsection
