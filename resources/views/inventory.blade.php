@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Inventory</div>
               <div class="card-body">
                   <div class="table-responsive-sm">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <?php
                                    foreach ($columns as $col) {
                                        echo('<th scope="col">'. $col . "</th>");
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($invent as $row) {
                                        echo "<tr>";
                                                foreach ($row as $val) {
                                                    echo("<td>" . $val. "</td>");
                                                }
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection
