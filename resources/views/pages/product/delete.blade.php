<!-- Button trigger show modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#d{{ $product->id }}">
    <i class="fa fa-trash"></i>
</button>

<div class="modal fade" id="d{{ $product->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $product->name }}">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer">  
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ Route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger">Delete</i></button>                                
                </form>
            </div>
        </div>
    </div>
</div>