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
                    <h3>Add Sensor Detail</h3>
                </div>
                <form action="{{url('admin/addsensordetail_form')}}" method="post">
                    @csrf
                <div class="row p-4">
                    <div class="col-md-6 col-12 pt-2">
                        <input type="hidden" name="sensor_id" value="{{$sensorid}}">
                        <label for=""><b>Temperature</b></label>
                        <input type="text" name="temp" class="form-control mt-1" placeholder="Temperature" required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Time</b></label>

                    <input type="time" class="form-control mt-1" name="Clock" required>


                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Date</b></label>
                        <input type="date" name="Date" class="form-control mt-1"  required>
                    </div>
                    <div class="col-md-6 col-12 pt-2">
                        <label for=""><b>Status</b></label>
                        <select name="status" class="form-control" id="" required>
                            <option value="ONLINE" selected>ONLINE</option>
                            <option value="OFFLINE">OFFLINE</option>

                        </select>

                    </div>
                    <div class="col-md-6 col-12 pt-2 d-none">
                        <label for=""><b>Search_time</b></label>
                        <input type="number" value="60" class="form-control" name="search_time" min="1" max="60">
                    </div>

                    <div class="col-12 pt-2">
                       <button class="btn btn-success form-control" type="submit">Add Sensor Detail</button>
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
