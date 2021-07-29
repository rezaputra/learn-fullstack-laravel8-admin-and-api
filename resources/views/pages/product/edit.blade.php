@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header mt-3 mx-3">
                    <h5 class="text-center">Edit product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" 
                                placeholder="name@example.com"
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ $product->name }}">
                            <label for="floatingInput">Name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" 
                                placeholder="price@example.com"
                                class="form-control @error('price') is-invalid @enderror" 
                                name="price"
                                value="{{ $product->price }}">
                            <label for="floatingInput">Price</label>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" 
                                placeholder="stock@example.com"
                                class="form-control @error('stock') is-invalid @enderror" 
                                name="stock"
                                value="{{ $product->stock }}">
                            <label for="floatingInput">Stock</label>
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label ms-2">Description</label>
                            <textarea class="form-control editor @error('img0') is-invalid @enderror" 
                                    id="description" 
                                    name="description">{{ $product->description }}
                            </textarea>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                          </div>
                        <hr>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="file" 
                                    class="form-control @error('img0') is-invalid @enderror" 
                                    id="img0" 
                                    name="img0" 
                                    accept=".jpg, .jpeg, .png"
                                    value="{{ old('description') }}">
                                <label class="input-group-text" for="img0">Image cover</label>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" 
                                    class="form-control  @error('img1') is-invalid @enderror" 
                                    id="img1" 
                                    name="img1" 
                                    accept=".jpg, .jpeg, .png"
                                    value="{{ old('description') }}">
                                <label class="input-group-text" for="img1">Image cover</label>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" 
                                    class="form-control  @error('img2') is-invalid @enderror" 
                                    id="img2" 
                                    name="img2" 
                                    accept=".jpg, .jpeg, .png"
                                    value="{{ old('description') }}">
                                <label class="input-group-text" for="img2">Image cover</label>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div>
                            <button class="btn btn-success">Update product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '.editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
@endpush