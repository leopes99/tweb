@extends('layouts.homepageLayout')

@section('register')

<!-- register section starts -->
<section class="find_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="form_tab_container">
          <div class="tab-content text-center">
            <div class="tab-pane active" id="rent">
              <div class="Rent_form find_form">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  {{ $error }}<br>
                  @endforeach
                </div>
                @endif
                <form method="POST" action="register">
                  @csrf
                  <div class="form-row"> <!-- Nome e Cognome -->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                            </div>
                          </div>
                          <input type="text" name="nome" class="form-control" placeholder="Nome"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                            </div>
                          </div>
                          <input type="text" name="cognome" class="form-control" placeholder="Cognome"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row"> <!-- Username e Email-->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/user.png') }}" alt="User Image" />
                            </div>
                          </div>
                          <input type="text" name="username"class="form-control" placeholder="Username"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/email.png') }}" alt="Email Image" />
                            </div>
                          </div>
                          <input type="email" name="email" class="form-control" id="inputRentDestination" placeholder="E-mail"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row"> <!-- Username e Email-->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/pass.png') }}" alt="Password image"/>
                            </div>
                          </div>
                          <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/pass.png') }}" alt="Password image"/>
                            </div>
                          </div>
                          <input type="text" name="conferma_password" class="form-control" placeholder="Conferma password" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row"> <!-- Data di nascità e Codice Fiscale-->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/calendario.png') }}" alt="Calendar Image" />
                            </div>
                          </div>
                          <input type="date" name="data_nascita" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                              <img src="{{ URL('images/icon/genere.png') }}" alt="Gender Image" max width="26"/>
                            </div>
                          </div>
                          <select name="tipo" class="form-control" required>
                            <option value="" disabled selected>Genere</option>
                            <option value="maschio">Maschio</option>
                            <option value="femmina"> Femmina </option>
                            <option value="non_specificato"> Non specificato </option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <center>
                    <div class="form-row"> <!-- Prefisso e Telefono-->
                      <div class="col-md-6_2 px-02">
                        <div class="form-group ">
                          <div class="input-group">
                            <input type="text" name="prefisso" class="form-control" placeholder="Prefisso" size="3"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/phone.png') }}" alt="Phone Image" />
                              </div>
                            </div>
                            <input type="text" name="numero" class="form-control" placeholder="Telefono" maxlength="10"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </center>
                  <div class="btn-box">
                    <button type="submit">
                      <span>
                        REGISTRATI
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
<!-- register section ends -->

@endsection

