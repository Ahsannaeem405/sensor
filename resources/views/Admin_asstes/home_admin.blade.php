@extends('Admin_asstes.layouts.main')

<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Simple Column Chart with Index Labels"
        },
          axisY: {
          includeZero: true
        },
        data: [{
            type: "column", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#5A5757",
              indexLabelFontSize: 16,
            indexLabelPlacement: "outside",
            dataPoints: [
                { x: 10, y: 71 },
                { x: 20, y: 55 },
                { x: 30, y: 50 },
                { x: 40, y: 65 },
                { x: 50, y: 92, indexLabel: "\u2605 Highest" },
                { x: 60, y: 68 },
                { x: 70, y: 38 },
                { x: 80, y: 71 },
                { x: 90, y: 54 },
                { x: 100, y: 60 },
                { x: 110, y: 36 },
                { x: 120, y: 49 },
                { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
            ]
        }]
    });
    chart.render();

    }
    </script>
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
                    <h3>HOME</h3>
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
                                                <div class="row">
                                                    <div class="col-md-3 col-6">
                                                        <input type="text" placeholder="Alarm Set Point" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-md-2 col-6">
                                                        <input type="number" value="44" class="form-control">

                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <button class="btn btn-primary" style="width: 100%">Pause</button>

                                                    </div>
                                                    <div class="col-md-4 col-6 d-flex">
                                                        <input type="text" placeholder="IDF" class="form-control" disabled> &nbsp; <a href="#"> <i style="font-size:15px; " class="far fa-trash-alt second_div_icon alert-confirm pt-1" onclick="deleteAlert('disable.php?id=288')"></i></a>

                                                    </div>
                                                    <div class="col-md-3 col-6 pt-2">
                                                        <label style="padding: 5px   border-radius: 10px" class="border border-warning">Warning</label>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <p class="temperatureHigh col-form-label ms-1" id="updtext8" style="margin: 0px;display: inline-block;">Temperature is Normal</p>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <label class=" ms-2 col-form-label karc" style="color: green; font-size: 23px; font-weight: 900;" id="realtemp" value=""><span id="value8">15.5</span>
                                                            °C</label>
                                                    </div>
                                                    <div class="col-md-3 col-6 pt-2">

                                                        <lable style="
                                                    padding: 5px;
                                                border-radius: 10px; color: green; border: 1px solid green;"><span id="stat8">ONLINE</span>

                                                                                                                                </lable>
                                                    </div>

                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="white-box shadow p-2">
                                                <div class="row">
                                                    <div class="col-md-3 col-6">
                                                        <input type="text" placeholder="Alarm Set Point" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-md-2 col-6">
                                                        <input type="number" value="44" class="form-control">

                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <button class="btn btn-primary" style="width: 100%">Pause</button>

                                                    </div>
                                                    <div class="col-md-4 col-6 d-flex">
                                                        <input type="text" placeholder="IDF" class="form-control" disabled> &nbsp; <a href="#"> <i style="font-size:15px; " class="far fa-trash-alt second_div_icon alert-confirm pt-1" onclick="deleteAlert('disable.php?id=288')"></i></a>

                                                    </div>
                                                    <div class="col-md-3 col-6 pt-2">
                                                        <label style="padding: 5px   border-radius: 10px" class="border border-warning">Warning</label>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <p class="temperatureHigh col-form-label ms-1" id="updtext8" style="margin: 0px;display: inline-block;">Temperature is Normal</p>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <label class=" ms-2 col-form-label karc" style="color: green; font-size: 23px; font-weight: 900;" id="realtemp" value=""><span id="value8">15.5</span>
                                                            °C</label>
                                                    </div>
                                                    <div class="col-md-3 col-6 pt-2">

                                                        <lable style="
                                                    padding: 5px;
                                                border-radius: 10px; color: green; border: 1px solid green;"><span id="stat8">ONLINE</span>

                                                                                                                                </lable>
                                                    </div>

                                                </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>




                                    <br>

                                    <!-- <div class="input-group mb-3"> -->
                                    {{-- <div class="container-fluid">
                                        <div class="row">
                                            <!-- <div class="input-group-prepend" id="temperatureH"> -->

                                            <div class="col-md-7" style="padding: 0px;">
                                                <label style="    padding: 5px   border-radius: 10px" class="mt-5 ms-2 border border-warning">Warning</label>


                                                <p class="temperatureHigh col-form-label ms-1" id="updtext8" style="margin: 0px;display: inline-block;">Temperature is Normal</p>
                                            </div>
                                            <div class="col-md-2" style="padding: 0px;">
                                                <label class=" ms-2 col-form-label karc" style="color: green; font-size: 23px; font-weight: 900;" id="realtemp" value=""><span id="value8">15.5</span>
                                                    °C</label>



                                            </div>

                                            <div class="col-md-3 my-auto">

                                                                                                                    <lable style="
                                    padding: 5px;
                                border-radius: 10px; color: green; border: 1px solid green;" class=" ms-2"><span id="stat8">ONLINE</span>

                                                                                                                </lable></div>










                                        </div>
                                    </div> --}}







                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>

        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</section>




@endsection
