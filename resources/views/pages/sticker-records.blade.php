@extends('includes.layout')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="title">
            <h1>Vehicle Sticker Records</h1>
            <a href="/">Back</a>
        </div>
        <br><br><br>
        <div class="row">
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
                                <td></td>
                            <td><a href="/owners/{{$record->id}}" class="btn btn-success btn-sm">Details</a></td>
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
