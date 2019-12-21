@php
    $id = $_GET['id'];
@endphp
<form role="form" action="{{action('StickerController@store')}}" method="POST" >
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> 
        </div>
        <div class="modal-body">
            
            <div class="container">
                <div class="row">
                    <div class="sticker-color">
                        <img  id="sticker-img" src="/storage/images/Blue.jpg" class="d-block w-100"  alt="">
                    </div>
                </div>
                <input type="hidden" value="{{$id}}" name="owner_id">
                <br>
                <div class="row">
                    <div class="mx-auto">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="blue" name="sticker_color" class="custom-control-input" value="Blue" checked="checked" onclick="getStickerColor(this.value);">
                            <label class="custom-control-label" for="blue">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="green" name="sticker_color" class="custom-control-input" value="Green" onclick="getStickerColor(this.value);">
                            <label class="custom-control-label" for="green">Green</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="yellow" name="sticker_color" class="custom-control-input" value="Yellow" onclick="getStickerColor(this.value);">
                            <label class="custom-control-label" for="yellow">Yellow</label>
                        </div>                        
                    </div>                    
                </div>
                <br>
                <div class="col-12">
                    @php
                        use App\Vehicle;

                        $rows = Vehicle::where('owner_id', $id)->get();
                    @endphp

                    <div class="form-group">
                        <label for="">Select Vehicle Plate Number</label>
                        <select name="vehicle_id" id="" class="form-control" name="vehicle_id" style="width:100%">
                            @foreach ($rows as $row)
                            <option value="{{$row->id}}">{{$row->plate_number}} &nbsp;&nbsp;&nbsp;{{$row->model}} &nbsp;{{$row->type}} &nbsp;{{$row->color}}</option>
                            @endforeach                   

                        </select>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group">
                        <input type="text" name="sticker_no" class="form-control" placeholder="* Sticker No...">
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <input type="text" name="expiry_date" class="form-control" placeholder="* Epiry Year...">
                    </div>  
                    <div class="form-group">
                        <input type="text" name="or_number" class="form-control" placeholder="* OR Number...">
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <input type="date" name="date_issued" class="form-control" placeholder="* Date Issued..." title="Date Issued...">
                    </div>  
                    <input type="hidden" name="status" value="Active">           
                    
                    
                </div>
                
                
            </div>                     
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbmit" class="btn btn-primary">Save changes</button>
    </div>
</form>
