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
                    <h3>Search</h3>
                </div>


    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                {{-- @if (!isset($sensor_list)) --}}


                <form action="{{url('admin/search_sensor')}}" method="post">
                    @csrf
                <div class="row p-3">

                    <div class="col-md-4 col-12 pt-2">
                        <select name="sensor" class="form-control" required>
                            @foreach ($sensors as $sensor )
                            @if (isset($sensor_list))
                            <option value="{{$sensor->id}}"
                            @isset($sensor_list[0])
                                @if ($sensor_list[0]->sensor_id==$sensor->id)
                                selected

                            @endif
                            @endisset >{{$sensor->Sensor_Location}}</option>
                            @else
                            <option value="{{$sensor->id}}">{{$sensor->Sensor_Location}}</option>
                            @endif

                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-4 col-12 pt-2">
                        <div class="input-daterange">
                            <input type="text" name="start_date" id="start_date" autocomplete="off" class="form-control" @if (isset($start))
                               value="{{$start}}"
                            @endif required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 pt-2 d-flex justify-content-between">
                        <div class="input-daterange">
                            <input type="text" name="end_date" id="end_date" class="form-control" autocomplete="off"  @if (isset($end))
                            value="{{$end}}"
                         @endif required>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>
                        </div>

                </div>
            </form>
            {{-- @endif --}}

                <div class="card-content">
                    {{-- <div class="table-responsive p-2">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Temp</th>

                                <th scope="col">Time</th>
                                <th scope="col">Date</th>

                                <th scope="col">Clock</th>
                                <th scope="col">Status</th>


                              </tr>
                            </thead>
                            <tbody>
                                @if (isset($sensor_list))

                                @foreach ($sensor_list as $sensor )
                                <tr>
                                    <th scope="row">{{$sensor->id}}</th>
                                    <td>{{$sensor->sensorDetail2->temp}}</td>
                                    <td>{{$sensor->sensorDetail2->time}}</td>

                                    <td>{{$sensor->sensorDetail2->Date}}</td>
                                    <td>{{$sensor->sensorDetail2->Clock}}</td>
                                    <td>{{$sensor->sensorDetail2->status}}</td>


                                  </tr>
                                @endforeach

                                @endif





                            </tbody>
                          </table>
                    </div> --}}

                    <div class="table-responsive p-2">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Temp</th>

                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>

                                    <th scope="col">Clock</th>
                                    <th scope="col">Status</th>



                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($sensor_list))

                                @foreach ($sensor_list as $sensor )
                                <tr>
                                    <td>{{$sensor->id}}</td>
                                    <td>{{$sensor->temp}}</td>
                                    <td>{{date('H:i A', strtotime($sensor->time))}}</td>

                                    <td>{{$sensor->Date}}</td>
                                    <td>{{$sensor->Clock}}</td>
                                    <td>{{$sensor->status}}</td>


                                  </tr>
                                @endforeach

                                @endif


















                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                <th scope="col">Temp</th>

                                <th scope="col">Time</th>
                                <th scope="col">Date</th>

                                <th scope="col">Clock</th>
                                <th scope="col">Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {


        $('.input-daterange').datepicker({



            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true
        });





        // $('#search').click(function() {


        //     var start_date = $('#start_date').val();
        //     var end_date = $('#end_date').val();

        //     var mytableselect = $('#mytableselect').val();

        //     $.ajax({
        //         type: 'post',
        //         url: 'fetchdata.php',

        //         data: {
        //             'start_date': start_date,
        //             'end_date': end_date,
        //             'mytableselect': mytableselect
        //         },



        //         success: function(data) {


        //             $('#attach').empty();
        //             console.log(data);

        //             $('#attach').append(data);



        //         },


        //     });
        // });
    });
</script>

@endsection
