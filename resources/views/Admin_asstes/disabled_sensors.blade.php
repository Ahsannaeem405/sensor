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



            </div>

        </div>

        <div class="card">






            <div class="row">


                <div class="col-lg-12 col-12">
                    <div class="card">




                        <div class="card-content">
                            <div class="row mt-5">
                                <div class="col-sm-12 col-md-12">


                                    <div class="container-fluid">
                                        <div class="row">

@if (isset($sens))
<div class="col-12 text-center">

    <h5>No Disabled Sensor Found </h5>
</div>
@endif
                                            @foreach ($sens as $sensor)
                                            {{-- @dd($sensor->Alarm) --}}

                                            {{-- @if($sensor->act == 1) --}}
                                            @if (isset($sensor->Sensorr2))

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
                                                                disabled> &nbsp; <a href="{{url('admin/ablesensor/'.$sensor->Sensorr2->id)}}"> <i style="font-size:15px; "
                                                                    class="far fa-trash-alt second_div_icon alert-confirm pt-1"
                                                                    onclick="deleteAlert('{{url('admin/ablesensor/'.$sensor->Sensorr2->id)}}')"></i></a>

                                                        </div>
                                                        <div class="col-md-3 col-6 pt-2">
                                                            <label style="padding: 5px   border-radius: 10px"
                                                                class="border border-warning">Warning</label>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            @if ($sensor->sensorDetail2->temp<$sensor->point)
                                                            <p class="temperatureHigh col-form-label ms-1" id="updtext8"
                                                            style="margin: 0px;display: inline-block;">Temperature is
                                                            Low</p>
                                                            @elseif ($sensor->sensorDetail2->temp>$sensor->point)
                                                            <p class="temperatureHigh col-form-label ms-1" id="updtext8"
                                                            style="margin: 0px;display: inline-block;">Temperature is
                                                            High</p>
                                                            @else
                                                            <p class="temperatureHigh col-form-label ms-1" id="updtext8"
                                                            style="margin: 0px;display: inline-block;">Temperature is
                                                            Normal</p>
                                                            @endif

                                                        </div>
                                                        {{-- @dd($sensor->sensorDetail[0]->temp); --}}
                                                        <div class="col-md-3 col-6">
                                                            <label class=" ms-2 col-form-label karc"
                                                                style="color: green; font-size: 23px; font-weight: 900;"
                                                                id="realtemp" value=""><span id="value8">{{$sensor->sensorDetail2->temp}}</span>
                                                                °C</label>
                                                        </div>
                                                        <div class="col-md-3 col-6 pt-2">
                                                            @if ($sensor->Sensor_Status=="OFFLINE")
                                                            <lable style="
                                                            padding: 5px;
                                                        border-radius: 10px; color: red; border: 1px solid red;">
                                                            <span id="stat8">{{$sensor->Sensor_Status}}</span>

                                                        </lable>
                                                        @else
                                                        <lable style="
                                                        padding: 5px;
                                                    border-radius: 10px; color: green; border: 1px solid green;">
                                                        <span id="stat8">{{$sensor->Sensor_Status}}</span>

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


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


@endsection
