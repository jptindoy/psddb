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
                @guest
                    <a href="/owners" class="btn btn-light btn-lg">Show Records</a>
                    <button class="btn btn-light btn-lg" data-toggle="modal" data-target="#login">Add New Record</button>
                @else    
                    <a href="/owners" class="btn btn-light btn-lg">Show Records</a>
                    <a href="/add" class="btn btn-light btn-lg">Add New Record</a>
                @endguest
                
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
                                <div class="card" style="opacity:0.8;">
                                    <h3 style="color:black; margin-top:10px;"><b>In-campus Sticker</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/storage/images/2.jpg" class="d-block w-100" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="card" style="opacity:0.8;">
                                    <h3 style="color:black; margin-top:10px;"><b>Off-campus Sticker</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="storage/images/3.jpg" class="d-block w-100" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="card" style="opacity:0.8;">
                                    <h3 style="color:black; margin-top:10px;"><b>Faculty Sticker</b></h3>
                                </div>
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
                    <input type="text" class="form-control" onkeyup="searchData(this.value);"  placeholder="Search...">
                </div>
                <br>
                <div class="result" id="result">
                    
                </div>
            </div>
        </div>
    </div>

    <!--Login Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="/storage/images/logo.png" class="img-fluid" style="width:40%;" alt="">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <script>
        function searchData(val){

            $.ajax({
                url : "/search/{id}",
                type : "GET",
                data : {id : val},
                success:function(data){//200 response comes here
                    document.getElementById('result').innerHTML = data;
                }, 
                error:function(e){
                //Error handling
                }
            })              
           

            // document.getElementById('result').innerHTML = '<h3 style="color:red;">No record found!</h3> <button class="btn btn-success">Add new record</button>';

        }
    </script>
@endsection
