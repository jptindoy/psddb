@extends('includes.layout')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="title">
            <div class="float-right">
                <a href="/owners" class="btn btn-light">Go back..</a>
            </div>
            <h1>{{$owner->surname}}, {{$owner->firstname}} {{$owner->midlename}}</h1>            
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="info">
                    <h3>Basic Information</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$owner->address}}</li>
                        <li class="list-group-item">{{$owner->contact_no1}} / {{$owner->contact_no1}}</li>
                        <li class="list-group-item">{{$owner->applicant_category}}</li>
                        <li class="list-group-item"><small><i>for others specify:</i></small><br>{{$owner->others}}</li>
                        <li class="list-group-item"><small><i>for Parent/Gurdian indicate Name of AUP Student:</i></small><br>{{$owner->parent}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="info">
                    <h3>Vehicle Information</h3>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Plate No.</th>
                            <th scope="col">Model</th>
                            <th scope="col">Color</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>     
                        </tbody>    
                    </table>
                    {{-- {{$records->links()}}             --}}
                </div>
            </div>
        </div>        
        <br>
        <div class="table">
            <h3>Sticker Information</h3>
            <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Plate No.</th>
                    <th scope="col">Sticker No.</th>
                    <th scope="col">Sticker Color</th>
                    <th scope="col">Expiry Year</th>
                    <th scope="col">OR Number</th>
                    <th scope="col">Date Issued</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>     
                </tbody>    
            </table>
            {{-- {{$records->links()}}             --}}
        </div>
    </div>
@endsection
