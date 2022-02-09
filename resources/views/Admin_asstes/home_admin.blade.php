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
                    <div class="row mt-5 p-5">
                        <div class="col-sm-12 col-md-6">
                            <div class="white-box shadow">
                                <div class="table-responsive">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-7 first_div">
                                                <div class="input-group col-md-1 ">
                                                    <div class="input-group-prepend">
                                                        <span style="    padding-top: 10px;padding-right: 4px;padding-left: 4px;" class="input-group-text">Alarm Set
                                                            Point</span>
                                                    </div>
                                                    <input style="margin-top: 3px;" class="col-md-1 ms-1 form-control tempset8" id="TempSet" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="44">
                                                    <input class="col-md-1 ms-1 form-control" id="alarmp8" type="hidden" value="1">
                                                    <!--<button class="col-md-1 ms-1 form-control audio_btn" abc="8" id="audio_id_8" type="text"  ?>-->
                                                    <a> <button class="btn btn-primary mt-1 alarm_off_btn  ms-1 pause" abc="8" id="pausid8" style=" border-radius: 5px;font-size: 11px;padding: 4px;" type="button">Pause Alarm</button></a><br>



                                                </div>

                                            </div>

                                            <div class="col-md-5 second_div">

                                                <div class=" ms-1  mt-1" style="">
                                                    <span style="    font-size: 12px;width: fit-content;display: inline-block;" class="input-group-text second_div_span"><strong>IDF8                                                                            ROOM</strong></span>
                                                    <a type="button" style="vertical-align: -webkit-baseline-middle;" class="second_div_a">
                                                        <div style="display: inline-block;"><i style="font-size:18px;display: inline-block; " class="far fa-trash-alt second_div_icon alert-confirm" onclick="deleteAlert('disable.php?id=288')"></i></div>
                                                    </a>
                                                </div>


                                            </div>

                                        </div>

                                    </div>




                                    <br>

                                    <!-- <div class="input-group mb-3"> -->
                                    <div class="container-fluid">
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
                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>

        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</section>




@endsection
