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
                    <h3>Sensor Detail</h3>

                    <a href="{{url('admin/addsensordetail/'.$sensorid)}}" class="btn btn-primary">Add SensorDetail</a>
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
                                <th scope="col">Sensor_id</th>

                                <th scope="col">Temperature</th>


                                <th scope="col">Time</th>
                                <th scope="col">Date</th>
                                <th scope="col">Clock</th>
                                <th scope="col">Status</th>
                                <th scope="col">Search_time</th>




                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($sensor_detail as $admin )
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$admin->sensor_id}}</td>
                                    <td>{{$admin->temp}}</td>

                                    <td>{{$admin->time}}</td>
                                    <td>{{$admin->Date}}</td>
                                    <td>{{$admin->Clock}}</td>
                                    <td>{{$admin->status}}</td>
                                    <td>{{$admin->search_time}}</td>



                                    <td><a href="{{url('admin/editsensor_detail/'.$admin->id)}}"><i class="far fa-edit"></i></a> &nbsp; <a href="{{url('admin/deletesensor_detail/'.$admin->id)}}" style="color: red"><i class="far fa-trash-alt"></i></a> </td>


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
