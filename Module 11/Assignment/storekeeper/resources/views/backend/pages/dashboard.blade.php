@extends('backend.layout.app')

@section('dashboard')

<div class="row">
              <div class="col">
                <div class="h-100">
                  

                  <div class="row">
                    <div class="col-xl-3 col-md-6">
                      <!-- card -->
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                              <p
                                class="text-uppercase fw-medium text-muted text-truncate mb-0"
                              >
                                Total Product
                              </p>
                            </div>
                            <div class="flex-shrink-0">
                              <h5 class="text-success fs-14 mb-0">
                                <i
                                  class="ri-arrow-right-up-line fs-13 align-middle"
                                ></i>
                                {{$total}}
                              </h5>
                            </div>
                          </div>
                          <div
                            class="d-flex align-items-end justify-content-between mt-4"
                          >
                            <div>
                              <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span
                                  class="counter-value"
                                  data-target="{{$total}}"
                                  >0</span
                                > Items
                              </h4>
                              
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                              <span
                                class="avatar-title bg-primary-subtle rounded fs-3"
                              >
                                <i class="bx bx-dollar-circle text-primary"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- end card body -->
                      </div>
                      <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-md-6">
                      <!-- card -->
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                              <p
                                class="text-uppercase fw-medium text-muted text-truncate mb-0"
                              >
                                Today products
                              </p>
                            </div>
                            <div class="flex-shrink-0">
                              <h5 class="text-danger fs-14 mb-0">
                                <i
                                  class="ri-arrow-right-down-line fs-13 align-middle"
                                ></i>
                                {{$today}}
                              </h5>
                            </div>
                          </div>
                          <div
                            class="d-flex align-items-end justify-content-between mt-4"
                          >
                            <div>
                              <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{$today}}"
                                  >0</span
                                >
                              </h4>
                              
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                              <span
                                class="avatar-title bg-primary-subtle rounded fs-3"
                              >
                                <i class="bx bx-shopping-bag text-primary"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- end card body -->
                      </div>
                      <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-md-6">
                      <!-- card -->
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                              <p
                                class="text-uppercase fw-medium text-muted text-truncate mb-0"
                              >
                                Yesterday Products
                              </p>
                            </div>
                            <div class="flex-shrink-0">
                              <h5 class="text-success fs-14 mb-0">
                                <i
                                  class="ri-arrow-right-up-line fs-13 align-middle"
                                ></i>
                                {{$yesterday}}
                              </h5>
                            </div>
                          </div>
                          <div
                            class="d-flex align-items-end justify-content-between mt-4"
                          >
                            <div>
                              <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{$yesterday}}"
                                  >0</span
                                >
                              </h4>
                              
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                              <span
                                class="avatar-title bg-primary-subtle rounded fs-3"
                              >
                                <i class="bx bx-user-circle text-primary"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- end card body -->
                      </div>
                      <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-md-6">
                      <!-- card -->
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                              <p
                                class="text-uppercase fw-medium text-muted text-truncate mb-0"
                              >
                                This Month Products
                              </p>
                            </div>
                            <div class="flex-shrink-0">
                              <h5 class="text-muted fs-14 mb-0">{{$month}}</h5>
                            </div>
                          </div>
                          <div
                            class="d-flex align-items-end justify-content-between mt-4"
                          >
                            <div>
                              <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span
                                  class="counter-value"
                                  data-target="{{$month}}"
                                  >0</span
                                >
                              </h4>
                              
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                              <span
                                class="avatar-title bg-primary-subtle rounded fs-3"
                              >
                                <i class="bx bx-wallet text-primary"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- end card body -->
                      </div>
                      <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-md-6">
                      <!-- card -->
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                              <p
                                class="text-uppercase fw-medium text-muted text-truncate mb-0"
                              >
                                Last Month Products
                              </p>
                            </div>
                            <div class="flex-shrink-0">
                              <h5 class="text-muted fs-14 mb-0">{{$lastmonth}}</h5>
                            </div>
                          </div>
                          <div
                            class="d-flex align-items-end justify-content-between mt-4"
                          >
                            <div>
                              <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span
                                  class="counter-value"
                                  data-target="{{$lastmonth}}"
                                  >0</span
                                >
                              </h4>
                              
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                              <span
                                class="avatar-title bg-primary-subtle rounded fs-3"
                              >
                                <i class="bx bx-wallet text-primary"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- end card body -->
                      </div>
                      <!-- end card -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row-->

                  <!-- end card-->
                </div>
                <!-- end .rightbar-->
              </div>
              <!-- end col -->
            </div>

@endsection