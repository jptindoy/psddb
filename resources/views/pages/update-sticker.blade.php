<form role="form" action="{{action('StickerController@update', $info->id)}}" method="POST" >
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
                        <img  id="sticker-img" src="/storage/images/{{$info->sticker_color}}.jpg" class="mx-auto d-block w-50"  alt="">
                    </div>
                </div>
                <br>
                <div class="row">
                    @if ($info->sticker_color == 'Blue')
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
                    @elseif ($info->sticker_color == 'Green')
                        <div class="mx-auto">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="blue" name="sticker_color" class="custom-control-input" value="Blue"  onclick="getStickerColor(this.value);">
                                <label class="custom-control-label" for="blue">Blue</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="green" name="sticker_color" class="custom-control-input" value="Green" checked="checked" onclick="getStickerColor(this.value);">
                                <label class="custom-control-label" for="green">Green</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="yellow" name="sticker_color" class="custom-control-input" value="Yellow" onclick="getStickerColor(this.value);">
                                <label class="custom-control-label" for="yellow">Yellow</label>
                            </div>                        
                        </div> 
                    @else
                        <div class="mx-auto">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="blue" name="sticker_color" class="custom-control-input" value="Blue"  onclick="getStickerColor(this.value);">
                                <label class="custom-control-label" for="blue">Blue</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="green" name="sticker_color" class="custom-control-input" value="Green" onclick="getStickerColor(this.value);">
                                <label class="custom-control-label" for="green">Green</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="yellow" name="sticker_color" class="custom-control-input" value="Yellow" checked="checked" onclick="getStickerColor(this.value);">
                                <label class="custom-control-label" for="yellow">Yellow</label>
                            </div>                        
                        </div> 
                    @endif
                                   
                </div>
                <br>
                <div class="row">
                    @php
                        use App\Vehicle;
                        use App\Sticker;
                        
                        $rows = Vehicle::where('owner_id', $info->owner_id)->get();
                        
                    @endphp

                    <div class="form-group">
                        <label for="">Select Vehicle Plate Number</label>
                        <select name="vehicle_id" id="" class="form-control" name="vehicle_id" style="width:100%">
            
                            <option value="{{$info->vehicle_id}}">{{$info->vehicle_id}}</option>
                            
                            @foreach ($rows as $row)
                            <option value="{{$row->id}}">{{$row->plate_number}} &nbsp;&nbsp;&nbsp;{{$row->model}} &nbsp;{{$row->type}} &nbsp;{{$row->color}}</option>
                            @endforeach                   

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="text" name="status" class="form-control" value="{{$info->status}}" placeholder="Status...">
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group">
                        <input type="text" name="sticker_no" class="form-control" value="{{$info->sticker_no}}" placeholder="* Sticker No...">
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <input type="text" name="expiry_date" class="form-control"  value="{{$info->expiry_date}}" placeholder="* Epiry Year...">
                    </div>  
                    <div class="form-group">
                        <input type="text" name="or_number" class="form-control"  value="{{$info->or_number}}" placeholder="* OR Number...">
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <input type="date" name="date_issued" class="form-control"  value="{{$info->date_issued}}" placeholder="* Date Issued..." title="Date Issued...">
                    </div> 
                    
                </div>              
                @method('PUT')   
            </div>                     
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbmit" class="btn btn-primary">Save changes</button>
    </div>
</form>
