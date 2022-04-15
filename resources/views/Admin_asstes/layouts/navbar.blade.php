<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <h3 class="m-auto">@yield('heading')</h3>
                    <h3 class="m-auto">
                    <p style="text-align: right">

                        <style>
                            .blue-color {
                                color:blueviolet;font-size:30px;
                            }
                            .dropdown-toggle:empty::after {
display:none;
                            }

                           </style>

                        @php
                        $msges=array();
                        @endphp
                        @foreach ($notify as $noti)
                        @php
                        $msges[]=$noti->msg;
                        @endphp
                        @endforeach








</p>









<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <div class="dropdown">
    @if (count($msges) >= 1)
<i id="notify_No" style="    position: absolute;
right: -24%;
background-color: red;
border-radius: 50%;
font-size: 13px;
color: white;
height: 17px;
width: 17px;
text-align:center">{{ count($msges) }}</i>
    @endif
        <span class="bi bi-bell blue-color dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>

    <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">

            @foreach ($notify as $notify)
            <a class="dropdown-item" href="#">{{ $notify->msg }}</a>
            @endforeach
<i id="notify_append"></i>
            @if (count($msges) >= 1)
            <a href="{{url('admin/notify_click/')}}" style="margin-left:30%" >Mark all Read</a>
            @endif


    </div>
  </div>











                    </h3>
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">

                        <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->name}}</span></div>





                        <span><img class="round" src="https://www.allthetests.com/quiz22/picture/pic_1171831236_1.png?1592828498" alt="avatar" height="40" width="40"></span>


                    </a>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('/admin/profile')}}"><i class="feather icon-user"></i> Edit Profile</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('/logout')}}"><i class="feather icon-power"></i> Logout</a>
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
