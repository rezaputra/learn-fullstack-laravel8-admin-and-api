@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card pt-3">
                <div class="card-header mx-3">
                    <div class="col-lg-3 col-sm-4">
                        <form action="">
                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="type">
                                  <option selected value="0">New arrival</option>
                                  <option value="1">Best seller</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">Select</button>
                              </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>Rp {{ number_format($product->price,2,',','.') }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-evenly">
                                        <div class="">                                                                                       
                                            <!-- Modal show detail-->
                                            @include('pages.product.show')
                                        </div>
                                        <div class="">
                                            <a href="{{ Route('products.edit', $product->id) }}"><button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></a>
                                        </div>
                                        <div class="">
                                            @include('pages.product.delete')
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <div class="col">
                                    <strong>No data</strong>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection