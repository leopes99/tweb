@extends('layouts.homepageLayout')

@section('login')

<!-- login section starts -->

<section class="find_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="form_tab_container">
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="rent">
                            <div class="Rent_form find_form">
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <form method="POST" action="user">
                                    @csrf
                                    <center>
                                        <div class="col-md-6 px-0">
                                            <div class="form-group ">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <img src="{{ URL('images/icon/user.png') }}"
                                                                 alt="User Image"/>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="username" class="form-control"
                                                           id="inputRentDestination" placeholder="Username"/>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                    <center>
                                        <div class="col-md-6 px-0">
                                            <div class="form-group ">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <img src="{{ URL('images/icon/pass.png') }}"
                                                                 alt="Password image"/>
                                                        </div>
                                                    </div>
                                                    <input type="password" name="password" class="form-control"
                                                           id="inputRentPropery" placeholder="Password"/>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                    <center>
                                        <a href="{{ route('register') }}">Non hai un account? Registrati ora<a>
                                    </center>
                                    <div class="btn-box">
                                        <button type="submit">
                        <span>
                          LOG IN
                        </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- login section ends -->

@endsection

