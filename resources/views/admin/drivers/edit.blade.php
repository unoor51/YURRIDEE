@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Edit Driver</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item "><a href="{{ route('drivers') }}">Drivers</a> </li>
                            <li class="breadcrumb-item ">Edit Driver </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
        </div>
         <!-- ============================================================== -->
            <!-- Container-->
            <!-- ============================================================== -->
            <div class="container-fluid"> 
                <!-- ============================================================== -->
                <!-- Info box Content -->
                <!-- ============================================================== -->
                <form method="post" action="{{ route('update_driver') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Column Start -->
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                       <input type="hidden" name="id" value="{{$driver->id}}">
                                       <input type="hidden" name="user_id" value="{{$driver->user_id}}">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="driver_name"> {{ __('Driver Name') }}  </label>
                                                <input type="text" name="driver_name" value="{{$driver->driver_name}}" class="form-control" placeholder="{{__('Please enter driver name')}}">
                                                 @error('driver_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="driver_email"> {{ __('Driver Email') }}  </label>
                                                <input type="text" name="driver_email" value="{{$driver->driver_email}}" class="form-control" placeholder="{{__('Please enter email')}}">
                                                @error('driver_email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="driver_number"> {{ __('Driver Phone') }}  </label>
                                                <input type="text" name="driver_number" value="{{$driver->driver_number}}" class="form-control" placeholder="{{__('Please enter driver phone')}}">
                                            </div>
                                            @error('driver_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="profile_img"> {{ __('Driver Image') }}  </label>
                                                <input type="file" class="form-control" name="profile_img" >
                                            </div>
                                            @error('profile_img')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{ asset('storage/drivers/'.$driver->profile_img)}}" height="100px" width="100px" alt="Any alt text"/>
                                            <input type="hidden" name="old_image" value="{{$driver->profile_img}}">
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button class="btn btn-info"> Save </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column End -->


                    </div>
                </form>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

@endsection