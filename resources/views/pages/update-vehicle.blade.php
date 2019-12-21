<form role="form" action="{{action('VehicleController@update', $info->id)}}" method="POST" >
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" name="model" value="{{$info->model}}" placeholder="* Make/Model...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="color" value="{{$info->color}}" placeholder="* Color...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="type" value="{{$info->type}}" placeholder="* Body/type...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="plate_no" value="{{$info->plate_number}}" placeholder="* Plate Number...">
                    </div>
                   
                    </div>
                </div> 
            </div>            
            @method('PUT')                       
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbmit" class="btn btn-primary">Save changes</button>
    </div>
</form>
