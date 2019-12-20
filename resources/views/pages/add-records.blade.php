@extends('includes.layout')

@section('content')

    <br>
    <div class="container">
        <div class="title">
            <div class="float-right">
                <a href="/" class="btn btn-light">Go back..</a>
            </div>
            <h1>Add Vehicle Sticker Records</h1>
        </div>
        <br><br><br>
        <form role="form" action="{{action('OwnerController@store')}}" method="POST" >

            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="sticker-color">
                            <img  id="sticker-img" src="/storage/images/1.jpg" class="d-block w-100"  alt="">
                        </div>
                    </div>
                    
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
                <br>
                <div class="col-md-8">
                    
                        <div class="note">
                            <span><i>NOTE: All * symble are required!</i></span>
                        </div>
                        <br>
                        <div class="1st-part">
                            <div class="title">
                                <h3>Vehicle Owner Information</h3>
                            </div>
                            <div class="form-group">                   
                                <input type="text" class="form-control" name="surname" placeholder="* Surname...">
                            </div>
                            <div class="form-group">                  
                                <input type="text" class="form-control" name="firstname" placeholder="* Firstname...">
                            </div>
                            <div class="form-group">                  
                                <input type="text" class="form-control" name="midlename" placeholder="* Midlename...">
                            </div>
                            <div class="form-group">                  
                                <input type="text" class="form-control" name="address" placeholder="* Address...">
                            </div>
                            <div class="form-group">                  
                                <input type="text" class="form-control" name="contact_no1" placeholder="Contact No.1...">
                            </div>
                            <div class="form-group">                  
                                <input type="text" class="form-control" name="contact_no2" placeholder="Contact No.2...">
                            </div>
                        </div>                
                        <div class="2nd-part">
                            <div class="title">
                                <h3>Vehicle Discription</h3>
                            </div>
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
                        <div class="3rd-part">
                            <div class="title">
                                <h3>Applicant Category</h3>
                            </div>
                                                
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
                                <input type="text" id="others" name="others" class="form-control" placeholder="* Enter..." disabled>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline form-group">
                                <input type="radio" id="guardian" name="category" class="custom-control-input" value="Parents" onclick="enableInput(this.value);">
                                <label class="custom-control-label" for="guardian">Parent/Guardian (Indicate Name of AUP Student)</label>
                                <input type="text" id="parent" name="parent" class="form-control" placeholder="* Enter..." disabled>
                            </div>                               
                           
                        </div>
                        <br>
                        <div class="submit">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/" class="btn btn-danger">Back</a>
                        </div>
                        <br>
                    
                    
                </div>
            </div>
        </form>
    </div>

    <script>
        function getStickerColor(value){
            if(value == 'Blue'){
                // alert('Blue');
                document.getElementById("sticker-img").src='/storage/images/1.jpg';
            } else if(value == 'Green'){
                //alert('Green');
                document.getElementById("sticker-img").src='/storage/images/2.jpg';    
            } else {
                //alert('Yellow');
                document.getElementById("sticker-img").src='/storage/images/3.jpg';
            }
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

    </script>
@endsection
