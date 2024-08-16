@extends('dashboard')
@section('title')
    FashionHub
@endsection
@section('main')
<div class="mt-5">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="image-box">
                <img src="{{ asset($data->product_thumbnail) }}" class="img-fluid main-image" id="mainImage">
            </div>
            
            <div class="image-carousel">
                <button class="arrow left-arrow"><i class="fas fa-chevron-left"></i></button>
                
                <div class="small-images-container">
                    @foreach($data->multi_images as $multiImage)
                        <img src="{{ asset($multiImage->image) }}" class="img-fluid small-image" data-large="{{ asset($multiImage->image) }}">
                    @endforeach
                </div>
        
                <button class="arrow right-arrow"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12">
            <div class="bread-area">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Decoration</a></li>
                    <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                    <li class="breadcrumb-item"><a href="#">Storage</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sidebord</li>
                </ol>
            </div>

            <div class="image-content">
                <h1>{{$data->product_name}}</h1>
                <p>{{$data->product_subtitle}}</p>
            </div>

            <hr>

            <div class="price-review d-flex">
                <div class="price-section">
                    <h1>${{$data->product_price}}</h1>
                </div>
                <div class="review-section">
                    <div class="review d-flex">
                        <div class="review-icon">
                            <p><i class="fa-regular fa-star"></i> 4.8</p>
                        </div>
                        <div class="review-comment">
                            <p><i class="fa-regular fa-comment-dots"></i> 67 Reviews</p>
                        </div>
                    </div>
                    <div class="comment">
                        <p><span class="highlight-text">93%</span> of buyers have recommended this.</p>
                    </div>
                </div>
            </div>
            
            <hr>
            <div class="choose-color">
                <p class="choose-label">Choose a Color</p>
                <div class="color-options">
                    <div class="color-circle" style="background-color: rgb(186, 188, 192);">
                        <i class="check-mark fas fa-check"></i>
                    </div>
                    <div class="color-circle" style="background-color: rgb(255, 99, 71);">
                        <i class="check-mark fas fa-check"></i>
                    </div>
                    <div class="color-circle" style="background-color: rgb(54, 162, 235);">
                        <i class="check-mark fas fa-check"></i>
                    </div>
                </div>
            </div>
            
            <hr>

            <div class="size-section">
                <p class="choose-label">Choose a Size</p>
                <div class="size-options">
                    <label class="size-option">
                        <input type="radio" name="size" value="small">
                        <span>Small</span>
                    </label>
                    <label class="size-option">
                        <input type="radio" name="size" value="medium">
                        <span>Medium</span>
                    </label>
                    <label class="size-option">
                        <input type="radio" name="size" value="large">
                        <span>Large</span>
                    </label>
                </div>
            </div>

            <hr>

            <div class="cart-section">
                <div class="cart-number">
                    <span class="minus">-</span>
                    <span class="count">1</span>
                    <span class="plus">+</span>
                </div>
                <div class="add-to-cart">
                    <p class="cart-btn">$<span class="price">{{ $data->product_price * (1 + 0.25) }}</span> Add To Cart</p>
                </div>
            </div>
            
    </div>

    <div class="description-box">
        <div class="description">
            <p>Description</p>
            <div class="hr-container">
                <div class="black-line"></div>
                <div class="white-line"></div>
            </div>
        </div>

        <div class="product-description">
            <h5>Product Description</h5>
            <div class="product-content">
                <p>{{$data->product_description}}</p>
            </div>
        </div>

        <div class="benefits product-description">
            <h5>Benefits</h5>
           
            <div class="product-content d-block">
                @foreach ($benefitsArray as $benefit)
                    <p><i class="fa-solid fa-check"></i> {{ $benefit }}</p>
                @endforeach
            </div>
        </div>

        <div class="benefits product-description">
            <h5>Product Details</h5>
            <div class="product-content d-block">
                @foreach ($productdetails as $productdetail)
                    <p><i class="fa-solid fa-check"></i> {{ $productdetail }}</p>
                @endforeach
        </div>
        
        <div class="benefits product-description">
            <h5>More Details</h5>
            <div class="product-content d-block">
                @foreach ($moredetails as $moredetail)
                    <p><i class="fa-solid fa-check"></i> {{ $moredetail }}</p>
                @endforeach
        </div>
    </div>
</div> 
@endsection