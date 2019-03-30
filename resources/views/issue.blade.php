@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Issue Item
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="itemSelect">Item</label>
                            <select id="itemSelect" class="form-control">
                                <?php
                                foreach ($items as $item) {
                                    echo("<option>" . $item . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="borrowerID">Borrower ID</label>
                            <input type="text" class="form-control" id="borrowerID">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity">
                        </div>
                        <div class="form-group">
                            <label for="dateIssue">Date of Issue</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea rows="8" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
