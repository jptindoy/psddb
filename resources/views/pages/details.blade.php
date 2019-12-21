@extends('includes.layout')

@section('content')
    <div class="container">
        @guest
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Note: Login first before you can update or add information to this records!    
            </div>    
        @endguest
        <br>
        <br>
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
                    <div class="float-right">
                        @guest
                            <button title="Login first before you can update..." disabled data-toggle="modal" data-target="#update" id="owner_id" onclick="updateInfo(this.value);" value="{{$owner->id}}" class="btn btn-outline-success btn-sm">Update</button>
                        @else
                            <button data-toggle="modal" data-target="#update" id="owner_id" onclick="updateInfo(this.value);" value="{{$owner->id}}" class="btn btn-outline-success btn-sm">Update</button>
                        @endguest
                        
                    </div>
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
                    <div class="float-right">
                        @guest
                            <button title="Login first before you can add record..." disabled type="submit" data-toggle="modal" data-target="#update" onclick="addVehicle(this.value);" value="{{$owner->id}}" class="btn btn-outline-primary btn-sm">Add Vehicle</button>
                         @else
                            <button type="submit" data-toggle="modal" data-target="#update" onclick="addVehicle(this.value);" value="{{$owner->id}}" class="btn btn-outline-primary btn-sm">Add Vehicle</button>
                        @endguest
                        
                    </div>
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
                            @php
                                
                                use App\Vehicle;
                                $query = Vehicle::where('owner_id', '=', $owner->id)->paginate(5);
                                
                            @endphp
                            @foreach ($query as $vehicle)
                                <tr>
                                    <td>{{$vehicle->plate_number}}</td>
                                    <td>{{$vehicle->model}}</td>
                                    <td>{{$vehicle->color}}</td>
                                    <td>{{$vehicle->type}}</td>
                                    @guest
                                        <td><button title="Login first before you can update..." disabled class="btn btn-outline-success btn-sm" data-toggle="modal" id="vehicle-update" onclick="updateVehicle(this.value);" value="{{$vehicle->id}}" data-target="#update">Update</button></td>
                                    @else
                                        <td><button class="btn btn-outline-success btn-sm" data-toggle="modal" id="vehicle-update" onclick="updateVehicle(this.value);" value="{{$vehicle->id}}" data-target="#update">Update</button></td>
                                    @endguest
                                    
                                </tr> 
                            @endforeach                                
                        </tbody>    
                    </table>
                    {{$query->links()}}            
                </div>
            </div>
        </div>        
        <br>
        <div class="table">
            <div class="float-right">
                @guest
                    <button title="Login first before you can add record..." disabled type="submit" data-toggle="modal" data-target="#update" onclick="addSticker(this.value);" value="{{$owner->id}}" class="btn btn-outline-primary btn-sm">Add Sticker</button>
                @else
                    <button type="submit" data-toggle="modal" data-target="#update" onclick="addSticker(this.value);" value="{{$owner->id}}" class="btn btn-outline-primary btn-sm">Add Sticker</button>
                @endguest
                
            </div>
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
                    @php
                        use App\Sticker;

                        $stickers = Sticker::join('vehicles', 'stickers.vehicle_id', 'vehicles.id')->where('stickers.owner_id', '=', $owner->id)
                                        ->select('vehicles.plate_number','stickers.*')
                                        ->orderBy('date_issued', 'desc')->paginate(10);
                    @endphp
                    @foreach ($stickers as $sticker)
                        <tr>
                            <td>{{$sticker->plate_number}}</td>
                            <td>{{$sticker->sticker_no}}</td>
                            <td>{{$sticker->sticker_color}}</td>
                            <td>{{$sticker->expiry_date}}</td>
                            <td>{{$sticker->or_number}}</td>
                            <td>{{$sticker->date_issued}}</td>
                            <td>{{$sticker->status}}</td>
                            @guest
                                <td><button title="Login first before you can update..." disabled class="btn btn-outline-success btn-sm" data-toggle="modal" id="sticker-update" onclick="updateSticker(this.value);" value="{{$sticker->id}}" data-target="#update">Update</button></td>
                            @else
                                <td><button class="btn btn-outline-success btn-sm" data-toggle="modal" id="sticker-update" onclick="updateSticker(this.value);" value="{{$sticker->id}}" data-target="#update">Update</button></td>
                            @endguest
                            
                        </tr>  
                    @endforeach                       
                </tbody>    
            </table>
            {{$stickers->links()}} 
        </div>
    </div>

    <!-- Modal for update -->
    <div class="modal fade bd-example-modal-lg" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" id="update-form">
                
            </div>
        </div>
    </div>


    <script>
        function updateInfo(val){
            //alert(val);

            $.ajax({
                url : "/owners/{{$owner->id}}/edit",
                type : "GET",
                data : {id : val},
                success:function(data){//200 response comes here
                    document.getElementById('update-form').innerHTML = data;
                }, 
                error:function(e){
                //Error handling
                }
            })    
        }

        function addVehicle(val){
            //alert(val);

            $.ajax({
                url : "/vehicles",
                type : "GET",
                data : {id : val},
                success:function(data){//200 response comes here
                    document.getElementById('update-form').innerHTML = data;
                }, 
                error:function(e){
                //Error handling
                }
            })    
        }

        function updateVehicle(val){
            //alert(val);

            $.ajax({
                url : "/vehicles/{{$owner->id}}/edit",
                type : "GET",
                data : {id : val},
                success:function(data){//200 response comes here
                    document.getElementById('update-form').innerHTML = data;
                }, 
                error:function(e){
                //Error handling
                }
            })    
        }
 
        function addSticker(val){
            //alert(val);

            $.ajax({
                url : "/stickers",
                type : "GET",
                data : {id : val},
                success:function(data){//200 response comes here
                    document.getElementById('update-form').innerHTML = data;
                }, 
                error:function(e){
                //Error handling
                }
            })    
        }

        function updateSticker(val){
            //alert(val);

            $.ajax({
                url : "/stickers/{{$owner->id}}/edit",
                type : "GET",
                data : {id : val},
                success:function(data){//200 response comes here
                    document.getElementById('update-form').innerHTML = data;
                }, 
                error:function(e){
                //Error handling
                }
            })    
        }

        function enableInput(val){
           
           if (val == 'Others'){
               document.getElementById("others").disabled = false;
               document.getElementById("parent").disabled = true;
               document.getElementById("parent").value = "";
           } else if (val == 'Parents'){
               document.getElementById("others").disabled = true;
               document.getElementById("parent").disabled = false;
               document.getElementById("others").value = "";
           } else {
               document.getElementById("others").disabled = true;
               document.getElementById("parent").disabled = true;
               document.getElementById("parent").value = "";
               document.getElementById("others").value = "";
           }
               
       }

       function getStickerColor(value){
            if(value == 'Blue'){
                // alert('Blue');
                document.getElementById("sticker-img").src='/storage/images/Blue.jpg';
            } else if(value == 'Green'){
                //alert('Green');
                document.getElementById("sticker-img").src='/storage/images/Green.jpg';    
            } else {
                //alert('Yellow');
                document.getElementById("sticker-img").src='/storage/images/Yellow.jpg';
            }
        }
    </script>

@endsection


