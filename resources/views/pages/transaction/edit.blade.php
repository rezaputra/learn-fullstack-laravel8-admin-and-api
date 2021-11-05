@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header mt-3 mx-3">
                    <h5 class="text-center">Edit Transaction</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('transactions.update', $transaction->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" 
                                placeholder="name@example.com"
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ $transaction->name }}">
                            <label for="floatingInput">Name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" 
                                placeholder="number@example.com"
                                class="form-control @error('number') is-invalid @enderror" 
                                name="number" 
                                value="{{ $transaction->number }}">
                            <label for="floatingInput">Number</label>
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label ms-2">Address</label>
                            <textarea class="form-control editor @error('img0') is-invalid @enderror" 
                                    id="address" 
                                    name="address"> {{ $transaction->address }}
                            </textarea>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                    <hr>

                    <h5 class="text-center mt-4">List Product</h5>
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Quantity</th>
                                    <th>Payout</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaction->products as $product)
                                    <tr>
                                        <td class="d-flex"><p>{{ $product->name }}</p></td>
                                        <td class="text-center">{{ $product->pivot->total }}</td>
                                        <td>Rp {{ number_format($product->pivot->total * $product->price,2,',','.')  }}</td>
                                        <td>
                                            @switch($product->pivot->status)
                                                @case('0')
                                                    <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="On the way">
                                                        <i class="fas fa-shipping-fast"></i>
                                                    </button>
                                                    
                                                    @break
                                                @case('1')
                                                    <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Success">
                                                        <i class="fas fa-clipboard-check"></i>
                                                    </button>
                                                    @break                                        
                                                @case('2')
                                                    <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Failed">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                    @break
                                                @default                                          
                                                    
                                            @endswitch
                                        </td>
                                        <td>
                                            <form action="{{ route('product_transactions.destroy', $product->pivot->id ) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                                @csrf
                                                @method('delete')                                            
                                                    <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>                                                                            
                                            </form>
                                        </td>                
                                    </tr>
                                @empty
                                    <p>None</p>
                                @endforelse
                              
                            </tbody>
                        </table>                        
                </div>
            </div>
            <div class="d-flex mt-4 ms-4">
                <a href="{{ route('transactions.index', $transaction->id) }}"><button type="button" class="btn btn-secondary">Cencel</button></a>
            </div>
        </div>
    </div>
@endsection


{{-- {{ dd($transaction) }} --}}