<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body> 

    @include('header')
 
    @yield('main')

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!-- Left Side -->
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="cart-small-carousel">
                                    <img src="image/2.jpg" class="img-fluid small-carousel-image" id="mainImage">
                                </div>
                            </div>
                            
                            <!-- Middle Content -->
                            <div class="col-md-6 d-flex flex-column justify-content-center text-center">
                                <div class="cart-image-content">
                                    <h1>Embrace Sidebord</h1>
                                    <p>Teixeira Design Studio</p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-4">
                                    <div class="color-section d-flex align-items-center">
                                      <div class="color-circle" style="background-color: rgb(186, 188, 192);">
                                        <i class="check-mark fas fa-check"></i>
                                      </div>
                                    </div>
                                    <div class="size-section d-flex align-items-center ms-2">
                                      <label class="size-option">
                                        <input type="radio" name="size" value="small">
                                        <span>Small</span>
                                      </label>
                                    </div>
                                  </div>
                                  
                            </div>
                            
                            <!-- Right Side -->
                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                <div class="cart-number d-flex align-items-center">
                                    <span class="minus">-</span>
                                    <span class="count">3</span>
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="cart-add-to-cart">
                                    <p class="cart-btn">$268.35 Add To Cart</p>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const colorOptions = document.querySelectorAll('.color-circle');
            const thumbnails = document.querySelectorAll('.small-image');
            const largeImage = document.getElementById('mainImage');
            const prevBtn = document.querySelector('.left-arrow');
            const nextBtn = document.querySelector('.right-arrow');
            const thumbnailsWrapper = document.querySelector('.small-images-wrapper');
            const thumbnailWidth = document.querySelector('.small-image').offsetWidth;
            let currentIndex = null; 
            let scrollPosition = currentIndex * thumbnailWidth;
            colorOptions.forEach(option => {
                option.addEventListener('click', () => {
                    colorOptions.forEach(c => c.classList.remove('selected'));
                    option.classList.add('selected');
                });
            });
            thumbnails.forEach((thumb, index) => {
                thumb.addEventListener('click', () => {
                    currentIndex = index;
                    updateLargeImage();
                    scrollThumbnails();
                });
            });

            function updateLargeImage() {
                const newImageSrc = thumbnails[currentIndex].getAttribute('data-large');
                largeImage.src = newImageSrc;
                thumbnails.forEach(thumb => thumb.classList.remove('selected'));
                thumbnails[currentIndex].classList.add('selected');
            }

        
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : 0;
                updateLargeImage();
                scrollThumbnails();
            });

         
            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex < thumbnails.length - 1) ? currentIndex + 1 : thumbnails.length - 1;
                updateLargeImage();
                scrollThumbnails();
            });

            function scrollThumbnails() {
                scrollPosition = currentIndex * thumbnailWidth;
                thumbnailsWrapper.style.transform = `translateX(-${scrollPosition}px)`;
            }

          
            scrollThumbnails();
        });

        document.addEventListener('DOMContentLoaded', function () {
        const cartSection = document.querySelector('.cart-section');
        const cartContainer = document.querySelector('.cart-container');
        const countElement = cartSection.querySelector('.count');
        const cartCountElement = cartContainer.querySelector('.cart-count');
        const priceElement = document.querySelector('.add-to-cart .price');

        const basePrice = parseFloat(priceElement.textContent) / (1 + 0.25); 
        const taxRate = 0.25; 

        let quantity = parseInt(countElement.textContent, 10);

        
        function updateQuantity(amount) {
            quantity = Math.max(1, quantity + amount);
            countElement.textContent = quantity;
            cartCountElement.textContent = quantity; 

            const totalPrice = basePrice * quantity * (1 + taxRate);
            priceElement.textContent = totalPrice.toFixed(2); 
        }


        cartSection.querySelector('.minus').addEventListener('click', function () {
            updateQuantity(-1);
        });

        cartSection.querySelector('.plus').addEventListener('click', function () {
            updateQuantity(1);
        });
    });
      
    </script>
</body>
</html>
