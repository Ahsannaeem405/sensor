@extends('Admin_asstes.layouts.main')

@section('content')
    <style>
        a.canvasjs-chart-credit {
            display: none;
        }

    </style>
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
                                        <input type="checkbox" @if (isset($sensor->Sensorr) && $sensor->Sensorr->tick == 1) checked @endif
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
                                        <div class="row">

                                            @foreach ($sens as $sensor)
                                            @dd($sensor->Alarm)

                                            @if($sensor->act == 1)

                                            <div class="col-md-6 col-12">
                                                <div class="white-box shadow p-2">
                                                    <div class="row">
                                                        <div class="col-md-3 col-6">
                                                            <input type="text" placeholder="Alarm Set Point"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <div class="col-md-2 col-6">
                                                            <input type="number" value="44" class="form-control">

                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <button class="btn btn-primary"
                                                                style="width: 100%">Pause</button>

                                                        </div>
                                                        <div class="col-md-4 col-6 d-flex">
                                                            <input type="text" placeholder="IDF" class="form-control"
                                                                disabled> &nbsp; <a href="#"> <i style="font-size:15px; "
                                                                    class="far fa-trash-alt second_div_icon alert-confirm pt-1"
                                                                    onclick="deleteAlert('disable.php?id=288')"></i></a>

                                                        </div>
                                                        <div class="col-md-3 col-6 pt-2">
                                                            <label style="padding: 5px   border-radius: 10px"
                                                                class="border border-warning">Warning</label>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="temperatureHigh col-form-label ms-1" id="updtext8"
                                                                style="margin: 0px;display: inline-block;">Temperature is
                                                                Normal</p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <label class=" ms-2 col-form-label karc"
                                                                style="color: green; font-size: 23px; font-weight: 900;"
                                                                id="realtemp" value=""><span id="value8">15.5</span>
                                                                °C</label>
                                                        </div>
                                                        <div class="col-md-3 col-6 pt-2">

                                                            <lable style="
                                                                padding: 5px;
                                                            border-radius: 10px; color: green; border: 1px solid green;">
                                                                <span id="stat8">ONLINE</span>

                                                            </lable>
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


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
        window.onload = function() {

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
                    dataPoints: [

                        @foreach ($sens as $sensor)
                            @if (isset($sensor->Sensorr))
                                { y: <?php

                                    echo $sensor->Sensorr->Detail->temp;
                                    ?>,
                                label: "<?php echo $sensor->Sensor_Location; ?>" },
                            @endif
                        @endforeach

                    ]
                }]
            });
            chart.render();

        }
    </script>
@endsection
