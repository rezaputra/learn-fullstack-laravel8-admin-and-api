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
                                  <option selected value="0">All transaction</option>
                                  <option value="0">New one</option>
                                  <option value="1">On progress</option>
                                  <option value="2">Succes</option>
                                  <option value="4">Failed</option>
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
                                <th>Phone number</th>
                                <th class="text-center">Total product</th>
                                <th class="text-center">Id Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->name }}</td>
                                    <td>{{ $transaction->number }}</td>
                                    <td class="text-center">{{ count($transaction->products) }}</td>
                                    <td class="text-center py-1">
                                        @include('pages.transaction.show')
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

{{-- {{ dd($transaction->products->toArray()) }} --}}