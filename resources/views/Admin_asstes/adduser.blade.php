@extends('Admin_asstes.layouts.main')


@section('content')
<section id="dashboard-ecommerce">


            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{session()->get('success')}}
                </div>

                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible">
                    {{session()->get('error')}}
                </div>

                @endif
                <div class="card-header  align-items-start p-2">
                    <h3>Add User</h3>
                </div>
                <form action="{{url('admin/adduser_form')}}" method="post">
                    @csrf
                <div class="row p-4">
                    <div class="col-12 pt-2">
                        <label for=""><b>Name</b></label>
                        <input type="text" name="name" class="form-control mt-1" placeholder="Name" required>
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Email</b></label>
                        {{-- <input type="email" name="email" class="form-control mt-1" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Phone Number</b></label>
                        <input type="text" name="phone" class="form-control mt-1" placeholder="Phone Number" required>
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Password</b></label>
                        <input type="password" name="password" class="form-control mt-1" placeholder="Password" required>
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Confirm Password</b></label>
                        <input type="password" name="Cpassword" class="form-control mt-1" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="addsensor" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Add sensors</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="deletesensor" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Delete sensors</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="updatesensor" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Update Sensors list</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="graph" class="custom-control-input" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">Choose for graph Bar</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="search" class="custom-control-input" id="customCheck5">
                            <label class="custom-control-label" for="customCheck5">Search on the tables</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="changechart" class="custom-control-input" id="customCheck6">
                            <label class="custom-control-label" for="customCheck6">Change the chart curve</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="sp" class="custom-control-input" id="customCheck7">
                            <label class="custom-control-label" for="customCheck7">Edit Set Point</label>
                          </div>
                    </div>
                    <div class="col-12 pt-2">
                       <button class="btn btn-success form-control" type="submit">Add User</button>
                    </div>
                </div>
            </form>

            </div>



    </div>

    {{-- <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>Recent Users</h4>

                </div>
                <div class="card-content">
                    <div class="table-responsive p-2">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Mark@gmail.com</td>
                                <td>xxxxxxxxxxx</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Mark</td>
                                <td>Mark@gmail.com</td>
                                <td>xxxxxxxxxxx</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Mark</td>
                                <td>Mark@gmail.com</td>
                                <td>xxxxxxxxxxx</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>Packages</h4>

                </div>
                <div class="card-content">
                    <div class="table-responsive p-2">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Package Name</th>
                                <th scope="col">Package Cost</th>
                                <th scope="col">Number Of Days</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Bussiness</td>
                                <td>$1000</td>
                                <td>20 /Days</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Bussiness</td>
                                <td>$1000</td>
                                <td>20 /Days</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Bussiness</td>
                                <td>$1000</td>
                                <td>20 /Days</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>


    </div> --}}
</section>

@endsection
