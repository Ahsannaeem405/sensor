
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head id="Head1" runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/images2.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/pages/data-list-view.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/dropify/css/dropify.min.css') }}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin/app-assets/css/custom.css') }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/plugins/forms/wizard.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" href="{{asset('datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('datepicker.js')}}">



















    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>






    <style>
        div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate {
    text-align: right !important;
}

.btn-primary{
    background-color: #7367F0 !important;
}
.btn-danger{
    background:#EA5455 !important;
}
div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    -webkit-justify-content: right !important;

    /* justify-content: center; */
}
    </style>
    <!-- END: Page CSS-->
    @yield('css')

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @if (Auth()->User()->role == "admin")
    <input type="hidden" id="u_id" value="{{Auth()->User()->id}}">
    @else
    <input type="hidden" id="u_id" value="{{Auth()->User()->admin_id}}">
    @endif




<!-- BEGIN: Navbar-->
@include('Admin_asstes.layouts.navbar')
<!--End: Navbar-->

<!-- BEGIN: Sidebar-->
@include('Admin_asstes.layouts.sidebar')
<!-- END: Sidebar-->



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="{{asset('admin/admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/js/scripts/datatables/datatable.js') }}"></script>




<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>


<script src="{{ asset('admin/admin/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ asset('admin/admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin/admin/app-assets/js/core/app.js') }}"></script>
{{--    <script src="{{ asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>--}}
<script src="{{asset('admin/admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin/admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{ asset('admin/admin/app-assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('admin/admin/app-assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/admin/app-assets/js/scripts/ui/data-list-view.js') }}"></script>
<script src="{{ asset('admin/admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
{{--    <script src="{{ asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script><!-- javascript -->



<script src="{{asset('admin/admin/app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script src="{{asset('admin/admin/app-assets/js/scripts/forms/wizard-steps.js')}}"></script>
<script src="{{asset('admin/admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>

<script>
    $(document).ready(function(){
        $(function () {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
                startDate: '-0m',
                minDate: 0,
            });
        });
        var deleteID = document.querySelectorAll(".alert-confirm");
        deleteID.forEach(function(e) {
            e.addEventListener("click", function(event) {
                event.preventDefault();
                $url=$(this).attr("href");
                swal({
                    title: 'Are you sure?',
                    text: 'You want be to do this?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = $url;
                        }

                    });
            });
        });
    });
</script>
<script>
    @if(session('message'))
    toastr.success("{{ session('message') }}");
    @elseif(session('error'))
    toastr.error("{{ session('error') }}");
    @endif

</script>
<script>
    function deleteAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to update this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update attendance it!'
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    }
    function unblockAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Activate!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, activate it!'
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    }
</script>


@yield('js')









































<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: '{{env('PUSHER_APP_CLUSTER')}}'
    });

    var channel = pusher.subscribe('sensor');
    channel.bind('sensorEvent', function (response) {










        var user_id= document.getElementById('u_id').value;

        var sensor_id = response['sensor'].id;
        var senser_user_id = response['sensor'].user_id;
var a=response['sensor'].point;
var b=response['sensorDetail'].temp;

if(response['sensorDetail'].temp > response['sensor'].point){
alert('greater');
}


        console.log(response['sensor'].point);
        if(senser_user_id == user_id){
        if(($('.sensorData'+sensor_id).length)==1)
        {


            $.ajax({
                type: "get",
                url: "{{ url('admin/last_senser/') }}" + '/' + sensor_id,
                success: function (data) {
                    $('#serser_show'+sensor_id).empty().append(data);





    $.ajax({
        type: "get",
        url: "{{ url('admin/get_all_senser/') }}" + '/' + user_id,
        success: function (data) {
            console.log(data);
            chart.options.data[0].dataPoints = data;
            chart.render();
        }
    })










                }
            })
        }
    }
    });






    var channel = pusher.subscribe('sensor');
    channel.bind('notify', function (response) {
var user_id= document.getElementById('u_id').value;
   if(response['u_id'] == user_id){
       alert('yes');
       var div = document.getElementById("notify_No");
       const num = parseInt(div.innerHTML);


       //increments the number
div.innerHTML = num + 1;


       $('#notify_append').append('<a class="dropdown-item" href="#">'+response['msg']+'</a>');
   }

    });










</script>























































</body>
<!-- END: Body-->

</html>
