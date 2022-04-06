@extends('Admin_asstes.layouts.main')

@section('content')
    <style>
        a.canvasjs-chart-credit {
            display: none;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <section id="dashboard-ecommerce">


        <div class="row">

            <div class="col-12">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session()->get('error') }}
                    </div>
                @endif


                <div style="margin-bottom:20px" class="dropdown">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#exampleModal">
                                Disabled Sensors
                            </button>
                            {{-- <a href="{{url('admin/disabled_sensors')}}" class="btn btn-primary float-right">Disabled Sensors</a> --}}
                        </div>
                    </div>

                    <form method="POST" action="{{ url('admin/view/temp') }}">
                        @csrf
                        <div class="dropdown" style="display: inline-block;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    style="background: #275fa8;" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Temprature
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($sens as $sensor)
                                    <a class="dropdown-item" href="#">

                                        @if (isset($sensor->Sensorr) && $sensor->Sensorr->tick == 1)
                                            <input type="hidden" value="{{ $sensor->id }}" name="sens_id[]" id="">
                                        @endif
                                        <input type="checkbox"
                                               @if (isset($sensor->Sensorr) && $sensor->Sensorr->tick == 1) checked
                                               @endif
                                               value="{{ $sensor->id }}" name="senID[]" id="">

                                        {{ $sensor->Sensor_Location }}

                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div style="display: inline-block;">
                            <input type="submit"
                                   style="padding: 10px;margin-left: 12px;background-color: #4CAF50;color: white;border: none; "
                                   name="char" id="sub" value="Submit">

                        </div>

                    </form>
                </div>

            </div>

        </div>

        <div class="card">

            <div class="row">


                <div class="col-lg-12 col-12">
                    <div class="card">

                        <div class="card-content">
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            <div class="row mt-5">
                                <div class="col-sm-12 col-md-12">


                                    <div class="container-fluid">
                                        <div class="row" >


                                            @foreach ($sens as $sensor)
                                                {{-- @dd($sensor->Alarm) --}}

                                                {{-- @if($sensor->act == 1) --}}
                                                @if (!isset($sensor->Sensorr2) && isset($sensor->sensorDetail2->temp))

                                                    <div class="col-md-6 col-12" id="serser_show{{$sensor->id}}">
                                                        <div class="white-box shadow p-2">
                                                            <div class="row">
                                                                <div class="col-md-3 col-6">
                                                                    <input type="text" placeholder="Alarm Set Point"
                                                                           class="form-control" disabled>
                                                                </div>
                                                                <div class="col-md-2 col-6">
                                                                    <input type="number" value="{{$sensor->point}}"
                                                                           class="form-control">

                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <button class="btn btn-primary"
                                                                            style="width: 100%">Pause
                                                                    </button>

                                                                </div>
                                                                <div class="col-md-4 col-6 d-flex">
                                                                    <input type="text"
                                                                           placeholder="{{$sensor->Sensor_Location}}"
                                                                           class="form-control"
                                                                           disabled> &nbsp; <a
                                                                        href="{{url('admin/disablesensor/'.$sensor->id)}}">
                                                                        <i style="font-size:15px; "
                                                                           class="far fa-trash-alt second_div_icon alert-confirm pt-1"
                                                                           onclick="deleteAlert('{{url('admin/disablesensor/'.$sensor->id)}}')"></i></a>

                                                                </div>
                                                                <div class="col-md-3 col-6 pt-2">
                                                                    <label style="padding: 5px  ; border-radius: 10px"
                                                                           class="border border-warning">Warning</label>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    @if ($sensor->sensorDetail2->temp < $sensor->point)
                                                                        <p class="temperatureHigh col-form-label ms-1"
                                                                           id="updtext8"
                                                                           style="margin: 0px;display: inline-block;">
                                                                            Temperature is
                                                                            Normal</p>
                                                                    @elseif ($sensor->sensorDetail2->temp>$sensor->point)
                                                                        <p class="temperatureHigh col-form-label ms-1"
                                                                           id="updtext8"
                                                                           style="margin: 0px;display: inline-block;">
                                                                            Temperature is
                                                                            High</p>

                                                                    @endif

                                                                </div>
                                                                {{-- @dd($sensor->sensorDetail[0]->temp); --}}
                                                                <div class="col-md-3 col-6">
                                                                    <label class=" ms-2 col-form-label karc"
                                                                           style="color: green; font-size: 23px; font-weight: 900;"
                                                                           id="realtemp" value=""><span
                                                                            id="value8" class="sensorData{{$sensor->id}}">{{$sensor->sensorDetail2->temp}}</span>
                                                                        °C</label>
                                                                </div>
                                                                <div class="col-md-3 col-6 pt-2">

                                                                    @if ($sensor->sensorDetail2->status=="OFFLINE")
                                                                        <lable style="
                                                            padding: 5px;
                                                        border-radius: 10px; color: red; border: 1px solid red;">
                                                                            <span
                                                                                id="stat8">{{$sensor->sensorDetail2->status}}</span>

                                                                        </lable>
                                                                    @else
                                                                        <lable style="
                                                        padding: 5px;
                                                    border-radius: 10px; color: green; border: 1px solid green;">
                                                                            <span
                                                                                id="stat8">{{$sensor->sensorDetail2->status}}</span>

                                                                        </lable>
                                                                    @endif

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endforeach

                                        </div>

                                    </div>


                                    <br>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Disable Sensor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/unable_sensor')}}" method="post">
                        @csrf

                        @if (isset($sens->Sensorr2))
                            <div class="col-12 text-center">

                                <h5>No Disabled Sensor Found </h5>
                            </div>
                        @else
                            <select name="disable_sensor" class="form-control" id="" required>

                                @foreach ($sens as $sensor)

                                    @if (isset($sensor->Sensorr2))
                                        <option value="{{$sensor->Sensorr2->id}}">{{$sensor->Sensor_Location}}</option>

                                    @endif

                                @endforeach

                            </select>
                    @endif


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Unable Sensor</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<button class="btn btn-danger" id="hh">hehehehheheheheheheheheh
</button>













    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
    
    




var i=0;

  var ar=[];
    @foreach ($sens as $sensor)
        @if (isset($sensor->Sensorr))


      ar[i]={
          
          
          "y":<?php echo $sensor->Sensorr->Detail->temp; ?>,
          "lable":"<?php echo $sensor->Sensor_Location; ?>"
      

      };
     
      var i=i+1;

        @endif
    @endforeach







        window.onload = function () {
alert(ar[1]['lable']);
console.log(ar);


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Climate Monitoring Chart - IDF ROOMS"
                },
                axisY: {
                    title: "TEMP"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "IDF Rooms",
                    dataPoints: ar
                }]
            });
            chart.render();


        }


        $(document).ready(function () {


            $("#hh").click(function () {
                ar = [];
                ar[0]={
                        "y":27,
                        "lable":"tttee"
      };

                alert(ar[0]['lable']);
                console.log(ar);
            
            
	
      
      



	
	//	chart.options.data[0].dataPoints[0] = {y:27, lable:"tototo"};
		chart.render();    
		








            
            
            
            });

        });



    </script>
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: '{{env('PUSHER_APP_CLUSTER')}}'
        });

        var channel = pusher.subscribe('sensor');
        channel.bind('sensorEvent', function (response) {
            var sensor_id = response['sensor'].id;
            if(($('.sensorData'+sensor_id).length)==1)
            {
                alert('find');
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/last_senser/') }}" + '/' + sensor_id,
                    success: function (data) {
                        $('#serser_show'+sensor_id).empty().append(data);
                    }
                })
            }

        });
    </script>


@endsection
