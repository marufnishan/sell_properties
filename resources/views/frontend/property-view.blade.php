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
                  <h5 class="mb-3"><a href="#!" class="text-body">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>Property view</a>
                  </h5>
                  <hr>
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset($propertie->image) }}" class="img-fluid rounded-3" alt="Shopping item" style="width: 575px;" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p class="text-justify"><span class="fw-bolder">Title:</span> {{$propertie->title }}</p>
                    <p class="text-justify"><span class="fw-bolder">Description:</span>: {{$propertie->description }}</p>
                  </div>
                </div>
                <div class="col-lg-5 mt-5">
                  <div class="card  rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Details:</h5>
                      </div>
                            <p class="text-muted"><i class="fa fa-home fa-1x text-primary"></i> {{ $propertie->property_type }}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><i class="fa fa-bed"></i> {{ $propertie->bedrooms }} Bedrooms</p>
                                </div>
                                <div class="col-md-4">
                                    <p style="margin-left: -4px;"><i class="fa fa-bath"></i> {{ $propertie->bathrooms }} Bathrooms</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fa fa-map"></i> {{ $propertie->balconies }} Balconies</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><i class="fa fa-expand"></i> {{ $propertie->size_sqft }} sqft</p>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="fa fa-map-marker"></i> {{ $propertie->location }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p>Price: {{ $propertie->price }}</p>
                                </div>
                                <div class="col-md-6">
                                    @if ($propertie->old_price)
                                     <p class="text-muted">Old Price:<del style="color:red;"> {{ $propertie->old_price }}</del></p>
                                     @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Contact Number: {{ $propertie->contact_number }}</p>
                                </div>
                                <div class="col-md-6">
                                     <p class="">Contact Email: {{ $propertie->contact_email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Contact Address: {{ $propertie->contact_address }}</p>
                                </div>
                            </div>

                      <a href="{{ route('propertyPurchase',["id"=> $propertie->id]) }}" class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                          <span>Buy <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                     </a>

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
