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
                    <h3>Edit Sensor</h3>
                </div>
                <form action="{{url('admin/updatesensor')}}" method="post">
                    @csrf
                <div class="row p-4">
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor Location</b></label>
                        <input type="hidden" name="id" value="{{$sensor->id}}">
                        <input type="text" name="Sensor_Location" class="form-control mt-1" placeholder="Sensor Location" value="{{$sensor->Sensor_Location}}" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor_IP</b></label>

                    <input type="text" class="form-control mt-1" name="Sensor_IP" placeholder="Sensor_IP" value="{{$sensor->Sensor_IP}}" required autocomplete="email" autofocus>


                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor Subnet</b></label>
                        <input type="text" name="Sensor_Subnet" class="form-control mt-1" value="{{$sensor->Sensor_Subnet}}" placeholder="Sensor Subnet" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor_GW</b></label>
                        <input type="text" name="Sensor_GW" class="form-control mt-1" value="{{$sensor->Sensor_GW}}" placeholder="Sensor_GW" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor_DNS1</b></label>
                        <input type="text" name="Sensor_DNS1" class="form-control mt-1" value="{{$sensor->Sensor_DNS1}}" placeholder="Sensor_DNS1" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor_MAC</b></label>
                        <input type="text" name="Sensor_MAC" class="form-control mt-1" value="{{$sensor->Sensor_MAC}}" placeholder="Sensor_MAC" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor_Status</b></label>
                        <input type="text" name="Sensor_Status" class="form-control mt-1" value="{{$sensor->Sensor_Status}}" placeholder="Sensor_Status" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Sensor_Restart</b></label>
                        <input type="text" name="Sensor_Restart" class="form-control mt-1" value="{{$sensor->Sensor_Restart}}" placeholder="Sensor_Restart" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Select Admin</b></label>

                        <select class="form-control mt-1" name="user_id" id="exampleFormControlSelect1" required>
                            @foreach ($users as $user )

                            <option @if ($user->id==$sensor->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach



                          </select>
                    </div>
                    <div class="col-12 pt-2">
                       <button class="btn btn-success form-control" type="submit">Update Sensor</button>
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
