@extends('frontend.layouts.app')

@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">

                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="#!" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Continue buying</a></h5>
                  <hr>

                  {{-- <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1"> cart</p>
                      <p class="mb-0">You have 1 items in your cart</p>
                    </div>
                    <div>
                      <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                          class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                    </div>
                  </div> --}}

                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="{{ asset($propertie->image) }}"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 300px;">
                          </div>
                          <div class="ms-3">
                            <h5>{{$propertie->title }}</h5>
                            {{-- <p class="small mb-0">4 katha Independent House</p> --}}
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          {{-- <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">1</h5>
                          </div> --}}
                          <div style="width: 130px;">
                            <h5 class="mb-0">BDT {{  $propertie->price }}</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                            src="https://www.nsapropertiesltd.com/wp-content/uploads/2019/12/Front-view.jpg"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <h5>Ongoing – NSA Properties LTD </h5>
                            <p class="small mb-0">4 katha Independent House</p>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">1</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0">$900</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img3.webp"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <h5>Canon EOS M50</h5>
                            <p class="small mb-0">Onyx Black</p>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">1</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0">$1199</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3 mb-lg-0">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img4.webp"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <h5>MacBook Pro</h5>
                            <p class="small mb-0">1TB, Graphite</p>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">1</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0">$1799</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                </div>
                <div class="col-lg-5">

                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Card details:</h5>
                        <img src="{{ asset('images/logo/authorizenet.png') }}"
                          class="img-fluid rounded-3" style="width: 225px;" alt="Avatar">
                      </div>

                      {{-- <p class="small mb-2">Card type</p>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-visa fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-amex fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a> --}}

                      v
                        {{-- <div class="form-outline form-white mb-4">
                          <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                            placeholder="Cardholder's Name" />
                          <label class="form-label" for="typeName">Cardholder's Name</label>
                        </div> --}}

                        <div class="form-outline form-white mb-4">
                         <label class="form-label" for="typeText">Card Number:</label>
                          <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                            placeholder="1234 5678 9012 3457"  name="card" value="4716376247033021"/>

                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              {{-- <input type="text" id="typeExp" class="form-control form-control-lg"
                                placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" /> --}}
                              <label class="form-label" for="typeExp">Expiration Month</label>
                                <select name="expmonth"  class="form-control form-control-lg form-select" >
                                    <option value="01">January</option>
                                    <option value="02">February </option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05" selected >May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">Spetember</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                                <label class="form-label" for="typeText">Expiry Year</label>
                              <input type="text" id="typeText" class="form-control form-control-lg"
                                placeholder="2023" size="1" minlength="4" maxlength="4" name="expyear" value="2027"/>

                            </div>
                          </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal:</p>
                          <p class="mb-2">BDT {{ $propertie->price }}</p>
                        </div>

                        {{-- <div class="d-flex justify-content-between">
                          <p class="mb-2">Shipping</p>
                          <p class="mb-2">$20.00</p>
                        </div> --}}

                        {{-- <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total(Incl. taxes)</p>
                          <p class="mb-2">$4818.00</p>
                        </div> --}}
                        @if(Auth::user())
                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </button>
                        @else
                            <a href="" type="type" class="btn btn-info btn-block btn-lg" data-bs-toggle="modal" data-bs-target="#redirect-login-signup">
                                <div class="d-flex justify-content-between">
                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </a>
                        @endif
                      </form>
                    </div>
                  </div>

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
