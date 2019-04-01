@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header"><h3>Issued Items</h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="dark">
                                <tr>
                                    <th>Issue ID</th>
                                    <th>Item Description</th>
                                    <th>Borrower ID</th>
                                    <th>Quantity Issued</th>
                                    <th>Issue Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($issued as $req)
                                    <tr>
                                        <td>{{ $req->id }}</td>
                                        <td>{{ $req->Item_Description }}</td>
                                        <td>{{ $req->Borrower_ID }}</td>
                                        <td>{{ $req->Quantity_Issued }}</td>
                                        <td>{{ $req->Issue_Date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                    <div class="card-header"><h3>Current Stocks</h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="dark">
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Description</th>
                                        <th>Current Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items_danger as $item)
                                        <tr class="table-danger">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->Item_Description }}</td>
                                            <td>{{ $item->Current_Stock }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($items_warning as $item)
                                        <tr class="table-warning">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->Item_Description }}</td>
                                            <td>{{ $item->Current_Stock }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
