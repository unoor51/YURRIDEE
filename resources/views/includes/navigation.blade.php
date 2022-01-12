<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ @Auth::user()->name }}  <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
                                <!-- text-->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                     <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark @if($active == 'dashboard') active @endif " href="{{ route('dashboard') }}" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard </span></a>
                            
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark @if($active == 'users') active @endif""  href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('users') }}">Users </a></li>
                                <li><a href="#">Add User</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark @if($active == 'routes')active @endif" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-car"></i><span class="hide-menu">Routes </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Routes </a></li>
                                <li><a href="#">Add Route</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark @if($active == 'drivers') active @endif" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Drivers  </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Drivers </a></li>
                                <li><a href="#">Add Driver</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark @if($active == 'drivers') active @endif" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Rides  </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Completed Rides </a></li>
                                <li><a href="#">Cancelled Rides</a></li>
                                <li><a href="#">Schedule  Rides</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->