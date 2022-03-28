@extends('Admin_asstes.layouts.main')

@section('content')
    <section id="dashboard-ecommerce">

{{-- @dd($sens[0]->Sensorr_chart); --}}
        <div class="card">
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
            <div class="card-header  align-items-start p-2">
                <h3></h3>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="{{url('admin/chart_search')}}" method="post">
                        @csrf
                    <div class="row p-3">

                        <div class="col-md-4 col-12 pt-2">
                            <div class="dropdown" style="display: inline-block;">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    style="background: #275fa8;" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Temprature
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($sensors as $sensor)
                                        <a class="dropdown-item" href="#">

                                            @if (isset($sensor->Sensorr) && $sensor->Sensorr->tick == 1)
                                                <input type="hidden" value="{{ $sensor->id }}" name="sens_id[]" id="">
                                            @endif
                                            <input type="checkbox" @if (isset($sensor->Sensorr) && $sensor->Sensorr->tick == 1) checked @endif
                                                value="{{ $sensor->id }}" name="senID[]" id="">

                                            {{ $sensor->Sensor_Location }}

                                        </a>
                                    @endforeach
                                </div>
                            </div>
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
                </div>

            </div>



            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">

                        <div class="card-content">
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            <div class="row mt-5">
                                <div class="col-sm-12 col-md-12">


                                    <div class="container-fluid">
                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="white-box shadow p-2">

                                                    <div style="    margin: auto;text-align: end;">
                                                        <form method="post" action="" id="" style="    text-align: start;">
                                                            <input type="hidden" name="rec_id" value="">
                                                            <input type="number" style="    width: 35%;    height: 33px;"
                                                                min="5" max="60" class="numb" name="numb"
                                                                placeholder="Enter Minutes" id="">
                                                            <input type="submit" name="gethours" class="btn btn-primary"
                                                                value="Search">
                                                        </form>

                                                        <div style="display: inline-block;text-align: end;">

                                                            <i style="font-size:18px;display: inline-block; "
                                                                class="far fa-trash-alt second_div_icon alert-confirm"
                                                                onclick="  "></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div id="chartContainers" style="height: 300px; width: 100%;"></div>

                                                    </div>
                                                </div>
                                            </div>






                                            <!-- Modal -->

                                            <div class="col-md-6 col-12chartnew">
                                                <div class="white-box shadow">

                                                    <div class="table-responsive"
                                                        style="text-align: center;    padding: 22px;">

                                                        <img id="myBtn" src="{{ asset('image/plus.png') }}"
                                                            style="width: 107px;" data-toggle="modal"
                                                            data-target="#exampleModalLong">


                                                        {{-- <button type="button" class="btn btn-primary" >
                                                                Launch demo modal
                                                              </button> --}}


                                                    </div>
                                                </div>
                                            </div>



                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center" id="exampleModalLongTitle">
                                                                Add Sensor</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{url('admin/unable_sensor')}}" method="post">
                                                            @csrf

                                                            @if (isset($sens))

                                                            <select name="disable_sensor" class="form-control">
                                                             @foreach ($sens as $sensors)
                                                                 @if (isset($sensors->Sensorr2))
                                                                 <option value="{{$sensors->Sensorr2->id}}">{{$sensor->Sensor_Location}}</option>
                                                                 @endif
                                                             @endforeach


                                                            </select>
                                                            @endif



                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>




                                    <br>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        {{-- @dd($sensor->Sensorr_chart); --}}
    </section>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Climate Monitoring Chart (IDF)"
                },
                axisX: {
                    valueFormatString: "DD MMM,YY"
                },
                axisY: {
                    title: "Climate Monitoring Chart",
                    suffix: ""
                },
                legend: {
                    cursor: "pointer",
                    fontSize: 16,
                    itemclick: toggleDataSeries
                },
                toolTip: {
                    shared: true
                },
                data: [
                    @foreach ($sens as $sensor)
                    @if (isset($sensor->Sensorr_chart))
                {




                    name: "<?php echo $sensor->Sensor_Location; ?>",
                        type: "spline",
                        yValueFormatString: "#0.## °C",
                        showInLegend: true,



                        dataPoints: [
                            @foreach ($sensor->sensorDetail3 as $sensors1)
                            {
                                // x: new Date(2017, 6, 24),

                                x: new Date(<?php

                                    echo $sensors1->created_at->format('Y,m,d');
                                    ?>),



                                y: <?php

                                    echo $sensors1->temp;
                                    ?>
                            },
                            @endforeach

                            // {
                            //     x: new Date(2017, 6, 25),
                            //     y: 31
                            // },
                            // {
                            //     x: new Date(2017, 6, 26),
                            //     y: 29
                            // },
                            // {
                            //     x: new Date(2017, 6, 27),
                            //     y: 29
                            // },
                            // {
                            //     x: new Date(2017, 6, 28),
                            //     y: 31
                            // },
                            // {
                            //     x: new Date(2017, 6, 29),
                            //     y: 30
                            // },
                            // {
                            //     x: new Date(2017, 6, 30),
                            //     y: 29
                            // }
                        ],



                    },
                      @endif
                    @endforeach


                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }


            var chart1 = new CanvasJS.Chart("chartContainers", {
                animationEnabled: true,
                title: {
                    text: "Daily High Temperature at Different Beaches"
                },
                axisX: {
                    valueFormatString: "DD MMM,YY"
                },
                axisY: {
                    title: "Temperature (in °C)",
                    suffix: " °C"
                },
                legend: {
                    cursor: "pointer",
                    fontSize: 16,
                    itemclick: toggleDataSeries
                },
                toolTip: {
                    shared: true
                },
                data: [

                    {

                        name: "Nantucket",
                        type: "spline",
                        yValueFormatString: "#0.## °C",
                        showInLegend: true,
                        dataPoints: [{
                                x: new Date(2017, 6, 24),
                                y: 22
                            },
                            {
                                x: new Date(2017, 6, 25),
                                y: 19
                            },
                            {
                                x: new Date(2017, 6, 26),
                                y: 23
                            },
                            {
                                x: new Date(2017, 6, 27),
                                y: 24
                            },
                            {
                                x: new Date(2017, 6, 28),
                                y: 24
                            },
                            {
                                x: new Date(2017, 6, 29),
                                y: 23
                            },
                            {
                                x: new Date(2017, 6, 30),
                                y: 23
                            }
                        ]
                    }
                ]
            });
            chart1.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart1.render();
            }

        }
    </script>


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
