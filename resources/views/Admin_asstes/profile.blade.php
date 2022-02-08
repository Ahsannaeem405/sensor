@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')

        <div class="card">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session()->get('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session()->get('error')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="card-content">
                <form action="{{url('admin/updateprofile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                 <div class="row p-3">


                     <div class="col-lg-6 col-12 mt-2">
                         <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Name">
                     </div>

                    <div class="col-lg-6 col-12 mt-2">
                        <input type="text" value="{{$user->phone}}" name="phone" class="form-control" placeholder="Number">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="email" value="{{$user->email}}" name="email"  class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="password" name="oldpassword" class="form-control" placeholder="Old Password">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="password" name="newpassword" class="form-control" placeholder="New Password">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>
                    {{-- <div class="col-lg-6 col-12 mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div> --}}
                    <div class="col-lg-12 col-12 mt-2">
                        <button class="btn btn-dark" type="submit" style="float: right;">Update</button>
                    </div>

                 </div>
                </form>

            </div>
        </div>






<script>
    $('.dropify').dropify();
</script>
@endsection
