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
                    <h3>Add Admin</h3>
                </div>
                <form action="{{url('admin/updateadmin')}}" method="post">
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
                    <div class="col-12 pt-2">
                       <button class="btn btn-success form-control" type="submit">Update Admin</button>
                    </div>
                </div>
            </form>

            </div>



    </div>


</section>

@endsection
