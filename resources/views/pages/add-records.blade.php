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
                <div class="sticker-color">
                        <img src="/storage/images/1.jpg" class="d-block w-100"  alt="">
                </div>
                <div class="row mx-auto">
                    <div class="form-check form-check inline">
                        <input class="form-check-input" type="radio"  name="inlineRadioOptions">
                        <label for="Blue">Blue</label>
                    </div>
                    <div class="form-check form-check inline">
                        <input class="form-check-input" type="radio"  name="inlineRadioOptions">
                        <label for="Blue">Green</label>
                    </div>
                    <div class="form-check form-check inline">
                        <input class="form-check-input" type="radio"  name="inlineRadioOptions">
                        <label for="Blue">Yellow</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-8">
                
            </div>
        </div>
    </div>


@endsection
