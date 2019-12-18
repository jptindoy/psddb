@extends('includes.layout')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="title">
            <h1>Add Vehicle Sticker Records</h1>
        </div>
        <br><br><br>
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
                            <input type="radio" id="blue" name="stickercolor" class="custom-control-input" value="blue" checked="checked" onclick="getStickerColor(this.value);">
                            <label class="custom-control-label" for="blue">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="green" name="stickercolor" class="custom-control-input" value="green" onclick="getStickerColor(this.value);">
                            <label class="custom-control-label" for="green">Green</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="yellow" name="stickercolor" class="custom-control-input" value="yellow" onclick="getStickerColor(this.value);">
                            <label class="custom-control-label" for="yellow">Yellow</label>
                        </div>                        
                    </div>                    
                </div>
                <br>
                
                <div class="row ">
                   
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="* Sticker No...">
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="* Epiry Year...">
                    </div>               
                    
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
                        <input type="text" class="form-control" placeholder="* Surname...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" placeholder="* Firstname...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" placeholder="* Midlename...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" placeholder="* Address...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" placeholder="Contact No.1...">
                    </div>
                    <div class="form-group">                  
                        <input type="text" class="form-control" placeholder="Contact No.2...">
                    </div>
                </div>                
                <div class="2nd-part">
                    <div class="title">
                        <h3>Vehicle Discription</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="* Make/Model...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="* Color...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="* Body/type...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="* Plate Number...">
                    </div>
                </div>
                <div class="3rd-part">
                    <div class="title">
                        <h3>Applicant Category</h3>
                    </div>
                                         
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="aupstudent" name="category" class="custom-control-input" onclick="enableInput(this.value);">
                        <label class="custom-control-label" for="aupstudent">AUP Student</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="aupemployee" name="category" class="custom-control-input" onclick="enableInput(this.value);">
                        <label class="custom-control-label" for="aupemployee">AUP Employee</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline form-group">
                        <input type="radio" id="others" name="category" class="custom-control-input" value="others" onclick="enableInput(this.value);">
                        <label class="custom-control-label" for="others">Others </label>
                        <input type="text" id="other" class="form-control" placeholder="* Enter..." disabled>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline form-group">
                        <input type="radio" id="guardian" name="category" class="custom-control-input" value="parents" onclick="enableInput(this.value);">
                        <label class="custom-control-label" for="guardian">Parent/Guardian (Indicate Name of AUP Student)</label>
                        <input type="text" id="parent" class="form-control" placeholder="* Enter..." disabled>
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
    </div>

    <script>
        function getStickerColor(value){
            if(value == 'blue'){
                // alert('Blue');
                document.getElementById("sticker-img").src='/storage/images/1.jpg';
            } else if(value == 'green'){
                //alert('Green');
                document.getElementById("sticker-img").src='/storage/images/2.jpg';    
            } else {
                //alert('Yellow');
                document.getElementById("sticker-img").src='/storage/images/3.jpg';
            }
        }

        function enableInput(val){

            if (val == 'others'){
                document.getElementById("other").disabled = false;
                document.getElementById("parent").disabled = true;
                document.getElementById("parent").value = "";
            } else if (val == 'parents'){
                document.getElementById("other").disabled = true;
                document.getElementById("parent").disabled = false;
                document.getElementById("other").value = "";
            } else {
                document.getElementById("other").disabled = true;
                document.getElementById("parent").disabled = true;
                document.getElementById("parent").value = "";
                document.getElementById("other").value = "";
            }
                
        }

    </script>
@endsection
