<!-- Button trigger show modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#c{{ $transaction->id }}">
    <p class="m-0 p-0 text-decoration-underline fw-bold link-info">{{ $transaction->uuid }}</p>
</button>

<div class="modal fade" id="c{{ $transaction->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2 ">
                <div class="modal-title ps-3 pt-3" id="{{ $transaction->name }}">
                    <h5 class="fw-bold link-info text-start">{{ $transaction->uuid }}</h5>
                    <p class="fst-italic">{{ $transaction->address }}</p>
                </div>
            </div>

            <div class="modal-body px-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-start">Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaction->products as $product)
                            <tr>
                                <td class="d-flex"><p>{{ $product->name }}</p></td>
                                <td>{{ $product->pivot->status }}</td>
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
                            </tr>
                        @empty
                            <p>None</p>
                        @endforelse
                      
                    </tbody>
                </table>
            </div>
                
            <div class="modal-footer me-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('transactions.edit', $transaction->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                <div class="flex justify-content-center">
                    <form action="{{ route('transactions.destroy', $transaction->id ) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                        @csrf
                        @method('delete')                                            
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                Delete transaction
                            </button>                                                                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- {{ dd($transaction->products->toArray()) }} --}}