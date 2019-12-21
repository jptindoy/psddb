<form role="form" action="{{action('OwnerController@update', $infos->id)}}" method="POST" >
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">                   
                        <input type="text" class="form-control" name="surname" value="{{$infos->surname}}" placeholder="* Surname...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" name="firstname" value="{{$infos->firstname}}" placeholder="* Firstname...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" name="midlename" value="{{$infos->midlename}}" placeholder="* Midlename...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" name="address" value="{{$infos->address}}" placeholder="* Address...">
                    </div>
                    {{-- <input type="text" value="{{$infos->id}}"> --}}
                    
                </div>
                <div class="col-sm-12 col-md-6">

                    <div class="form-group">                  
                        <input type="text" class="form-control" name="contact_no1" value="{{$infos->contact_no1}}" placeholder="Contact No.1...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" name="contact_no2" value="{{$infos->contact_no2}}" placeholder="Contact No.2...">
                    </div>

                    {{-- radio button pre-selected --}}
                    @if ($infos->applicant_category == 'AUP Student')
                        
                        <div class="radio-buton">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupstudent" name="category" class="custom-control-input" value="AUP Student" checked="checked" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupstudent">AUP Student</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupemployee" name="category" class="custom-control-input" value="AUP Employee" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupemployee">AUP Employee</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="other" name="category" class="custom-control-input" value="Others" value="Others" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="other">Others </label>
                                <input type="text" id="others" name="others" class="form-control" style="" placeholder="* Enter..." disabled>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="guardian" name="category" class="custom-control-input" value="Parents" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="guardian">Parent/Guardian (Indicate Name of AUP Student)</label>
                                <input type="text" id="parent" name="parent" class="form-control" placeholder="* Enter..." disabled>
                            </div>  
                        </div>

                    @elseif($infos->applicant_category == 'AUP Employee')

                        <div class="radio-buton">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupstudent" name="category" class="custom-control-input" value="AUP Student" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupstudent">AUP Student</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupemployee" name="category" class="custom-control-input" value="AUP Employee" checked="checked" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupemployee">AUP Employee</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="other" name="category" class="custom-control-input" value="Others" value="Others" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="other">Others </label>
                                <input type="text" id="others" name="others" class="form-control" style="" placeholder="* Enter..." disabled>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="guardian" name="category" class="custom-control-input" value="Parents" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="guardian">Parent/Guardian (Indicate Name of AUP Student)</label>
                                <input type="text" id="parent" name="parent" class="form-control" placeholder="* Enter..." disabled>
                            </div>  
                        </div>
                    
                    @elseif($infos->applicant_category == 'Others')

                        <div class="radio-buton">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupstudent" name="category" class="custom-control-input" value="AUP Student" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupstudent">AUP Student</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupemployee" name="category" class="custom-control-input" value="AUP Employee" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupemployee">AUP Employee</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="other" name="category" class="custom-control-input" value="Others" value="Others" checked="checked" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="other">Others </label>
                                <input type="text" id="others" name="others" value="{{$infos->others}}" class="form-control" style="" placeholder="* Enter...">
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="guardian" name="category" class="custom-control-input" value="Parents" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="guardian">Parent/Guardian (Indicate Name of AUP Student)</label>
                                <input type="text" id="parent" name="parent" class="form-control" placeholder="* Enter..." disabled>
                            </div>  
                        </div>

                    @else

                        <div class="radio-buton">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupstudent" name="category" class="custom-control-input" value="AUP Student" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupstudent">AUP Student</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aupemployee" name="category" class="custom-control-input" value="AUP Employee" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="aupemployee">AUP Employee</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="other" name="category" class="custom-control-input" value="Others" value="Others" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="other">Others </label>
                                <input type="text" id="others" name="others" class="form-control" style="" placeholder="* Enter..." disabled>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="guardian" name="category" class="custom-control-input" value="Parents" checked="checked" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="guardian">Parent/Guardian (Indicate Name of AUP Student)</label>
                                <input type="text" id="parent" name="parent" value="{{$infos->parent}}" class="form-control" placeholder="* Enter...">
                            </div>  
                        </div>
                        
                    @endif
                    
                    @method('PUT')
                </div>
            </div>                        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbmit" class="btn btn-primary">Save changes</button>
    </div>
</form>
