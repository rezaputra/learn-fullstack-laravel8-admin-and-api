<!-- Button trigger show modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a{{ $product->id }}">
    <i class="fas fa-file-image"></i>
</button>

<div class="modal fade" id="a{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="{{ $product->name }}">{{ __('Product Detail') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


        <div class="modal-body">
            <div class="row">
                <div class="col">
                      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="{{ asset('images/'.$product->galleryImage->img0) }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="{{ asset('images/'.$product->galleryImage->img1) }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="{{ asset('images/'.$product->galleryImage->img2) }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col">
                    <p>Name</p>
                    <p>Stock</p>
                    <p>Price</p>
                </div>
                <div class="col">
                    <p>: {{ $product->name }}</p>
                    <p>: {{ $product->stock }}</p>
                    <p>: Rp {{ number_format($product->price,2,',','.') }}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <p>
                        @php
                            echo $product->description
                        @endphp
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ route('products.edit', $product->id) }}"><button type="button" class="btn btn-success">Edit</button></a>
        </div>
    </div>
    </div>
</div>