@extends('Admin_asstes.layouts.main')

@section('content')
    <section id="dashboard-ecommerce">


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


                <div class="col-12 col-md-2">


                    <div id="chart" class="input-group mb-3" style="bottom: 400px; position:inherit">
                        <div style="margin-bottom:20px" class="dropdown">
                            <button class="dropbtn">

                                {{ 'Temprature' }}

                            </button>
                            <div class="dropdown-content drop" style="    max-height: 250px !important;overflow: auto;">
                                <form method="POST">


                                </form>
                            </div>



                        </div>
                    </div>


                </div>

                <div class="col-md-3">
                    <div class="input-daterange">


                        <input type="date" name="start_date" id="start_date" class="form-control" />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input-daterange">
                        <input type="date" name="end_date" id="end_date" class="form-control" />
                    </div>
                </div>


                <div class="col-md-3">
                    <input type="submit" name="char" id="sub" value="Submit">
                </div>

                </form>
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
                                                            <select name="" id="">
                                                                <option value="">Select Sensor</option>
                                                                <option value="">Select Sensor</option>
                                                            </select>
                                                            <input type="submit" id="sub" name="update" value="update">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
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

    </section>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
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
                data: [{
                        name: "Myrtle Beach",
                        type: "spline",
                        yValueFormatString: "#0.## °C",
                        showInLegend: true,
                        dataPoints: [{
                                x: new Date(2017, 6, 24),
                                y: 31
                            },
                            {
                                x: new Date(2017, 6, 25),
                                y: 31
                            },
                            {
                                x: new Date(2017, 6, 26),
                                y: 29
                            },
                            {
                                x: new Date(2017, 6, 27),
                                y: 29
                            },
                            {
                                x: new Date(2017, 6, 28),
                                y: 31
                            },
                            {
                                x: new Date(2017, 6, 29),
                                y: 30
                            },
                            {
                                x: new Date(2017, 6, 30),
                                y: 29
                            }
                        ]
                    },
                    {
                        name: "Martha Vineyard",
                        type: "spline",
                        yValueFormatString: "#0.## °C",
                        showInLegend: true,
                        dataPoints: [{
                                x: new Date(2017, 6, 24),
                                y: 20
                            },
                            {
                                x: new Date(2017, 6, 25),
                                y: 20
                            },
                            {
                                x: new Date(2017, 6, 26),
                                y: 25
                            },
                            {
                                x: new Date(2017, 6, 27),
                                y: 25
                            },
                            {
                                x: new Date(2017, 6, 28),
                                y: 25
                            },
                            {
                                x: new Date(2017, 6, 29),
                                y: 25
                            },
                            {
                                x: new Date(2017, 6, 30),
                                y: 25
                            }
                        ]
                    },
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


    <script>

    </script>
@endsection
