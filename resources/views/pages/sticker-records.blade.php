@extends('includes.layout')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="title">            
            <div class="float-right">
                <a href="/" class="btn btn-light">Go back..</a>
            </div>
            <h1>Vehicle Sticker Records</h1>
        </div>
        <br>
        <div class="table"> 
            @php
                $total = count($records);
            @endphp
            <div class="total-racord">
                <h4>Total Records: {{$total}}</h4>
            </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Plate No.</th>
                    <th scope="col">Sticker No.</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($records) > 0)
                       @php
                           $row = 1;
                       @endphp
                        @foreach ($records as $record)
                            <tr>
                                <td>{{$row}}</td>
                                <td>{{$record->surname}}, {{$record->firstname}}</td>
                                <td>{{$record->plate_number}}</td>
                                <td>{{$record->sticker_no}}</td>
                            <td><a href="/owners/{{$record->owner_id}}" class="btn btn-success btn-sm">Details</a></td>
                            </tr>
                           @php
                               $row++;
                           @endphp
                        @endforeach
                    @else
                        <tr>
                            <td>No records...</td>
                        </tr>
                    @endif
                    <tr>

                    </tr>
                </tbody>    
            </table>
            {{$records->links()}}            
        </div>
    </div>
@endsection
