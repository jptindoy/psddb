@extends('includes.layout')

@section('content')
    
    <div class="title-header">
        <div class="text-center">
            <br>
            <h1>Adventist University of the Philippines</h1>
            <h2 style="font-family: Stencil">Public Safety Department</h2>
            <br>

            <div class="page-title">
                <h1><strong>VEHICLE STICKER RECORDS</strong></h1>
            </div>

            <div class="option">
                <a href="#"><h4>All Records</h4></a>
                <a href="/add"><h4>Add New Record</h4></a>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="psdcarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/storage/images/1.jpg" class="d-block w-100"  alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>In-campus Sticker</h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/storage/images/2.jpg" class="d-block w-100" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Off-campus Sticker</h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="storage/images/3.jpg" class="d-block w-100" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Faculty&Staff Sticker</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-lg">
                    <div class="note">
                        <span><i>*NOTE: You can search either Name, Sticker No. or Plate Number.</i></span>
                    </div>
                    <input type="text" class="form-control" style="width:50%" placeholder="Search...">
                </div>
            </div>
        </div>
    </div>

@endsection
