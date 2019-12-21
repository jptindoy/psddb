@php
    $id = $_GET['id'];
@endphp
<form role="form" action="{{action('VehicleController@store')}}" method="POST" >
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <input type="hidden" value="{{$id}}" name="owner_id">
                <div class="form-group">
                    <input type="text" class="form-control" name="model" placeholder="* Make/Model...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="color" placeholder="* Color...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="type" placeholder="* Body/type...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="plate_no" placeholder="* Plate Number...">
                </div>
               
                </div>
            </div>                        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbmit" class="btn btn-primary">Save changes</button>
    </div>
</form>
