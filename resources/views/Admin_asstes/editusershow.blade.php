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
                    <h3>Edit User</h3>
                </div>
                <form action="{{url('admin/updateuser')}}" method="post">
                    @csrf
                <div class="row p-4">
                    <div class="col-12 pt-2">
                        <input type="hidden" name="id" value="{{$admin->id}}">
                        <label for=""><b>Name</b></label>
                        <input type="text" name="name" value="{{$admin->name}}" class="form-control mt-1" placeholder="Name" required>
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Email</b></label>
                        <input type="email" name="email" value="{{$admin->email}}"  class="form-control mt-1" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Phone Number</b></label>
                        <input type="text" name="phone" value="{{$admin->phone}}"  class="form-control mt-1" placeholder="Phone Number" required>
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Password</b></label>
                        <input type="password" name="password" value="{{$admin->password2}}"  class="form-control mt-1" placeholder="Password" required>
                    </div>
                    <div class="col-12 pt-2">
                        <label for=""><b>Confirm Password</b></label>
                        <input type="password" name="Cpassword" class="form-control mt-1" placeholder="Confirm Password" >
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="addsensor" class="custom-control-input" id="customCheck1" @if ($admin->addsensor=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck1">Add sensors</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="deletesensor" class="custom-control-input" id="customCheck2" @if ($admin->deletesensor=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck2">Delete sensors</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="updatesensor" class="custom-control-input" id="customCheck3" @if ($admin->updatesensor=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck3">Update Sensors list</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="graph" class="custom-control-input" id="customCheck4" @if ($admin->graph=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck4">Choose for graph Bar</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="search" class="custom-control-input" id="customCheck5" @if ($admin->search=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck5">Search on the tables</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="changechart" class="custom-control-input" id="customCheck6" @if ($admin->changechart=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck6">Change the chart curve</label>
                          </div>
                    </div>
                    <div class="col-md-4 col-6 pt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="sp" class="custom-control-input" id="customCheck7" @if ($admin->sp=="1") checked

                            @endif>
                            <label class="custom-control-label" for="customCheck7">Edit Set Point</label>
                          </div>
                    </div>
                    <div class="col-12 pt-2">
                       <button class="btn btn-success form-control" type="submit">Update User</button>
                    </div>
                </div>
            </form>

            </div>



    </div>


</section>

@endsection
