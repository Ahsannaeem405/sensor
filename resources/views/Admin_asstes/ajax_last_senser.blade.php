@foreach ($sens as $sensor)
                                                {{-- @dd($sensor->Alarm) --}}

                                                {{-- @if($sensor->act == 1) --}}
                                                @if (!isset($sensor->Sensorr2))


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
                                                                    <button class="btn btn-primary pause_audio"
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
<script>
$(document).ready(function () {
$("#hh").click();
});
</script>





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


                                                @endif
                                            @endforeach
