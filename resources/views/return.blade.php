@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('msg'))
            <div class="alert alert-danger">
                <strong>{{ session()->get('msg') }}</strong>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>{{ session()->get('success') }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Return Item
                </div>
                <div class="card-body">
                    <form method="POST" action={{ route('return_item') }}>
                        @csrf
                        <div class="form-group">
                            <label for="itemSelect">Item</label>
                            <select id="itemSelect" class="form-control" name="itemSelect" required>
                                <?php
                                foreach ($items as $item) {
                                    echo("<option>" . $item . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="borrowerID">Borrower ID</label>
                            <input type="text" class="form-control" id="borrowerID" name="borrowerID" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="dateReturn">Date of Return</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="dateReturn" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
