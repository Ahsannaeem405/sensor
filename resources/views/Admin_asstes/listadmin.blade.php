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
                    <h3>Admin List</h3>
                </div>


    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">

                <div class="card-content">
                    <div class="table-responsive p-2">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Admin Id</th>

                                <th scope="col">Admin Name</th>
                                <th scope="col">Password</th>

                                <th scope="col">Role</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($admins as $admin )
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->name}}</td>

                                    <td>{{$admin->password2}}</td>
                                    <td>{{$admin->role}}</td>
                                    <td><a href="{{url('admin/editadmin/'.$admin->id)}}"><i class="far fa-edit"></i></a> &nbsp; <a href="{{url('admin/deleteadmin/'.$admin->id)}}" style="color: red"><i class="far fa-trash-alt"></i></a></td>


                                  </tr>
                                @endforeach



                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

@endsection
