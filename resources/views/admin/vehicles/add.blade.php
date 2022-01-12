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
                    <h4 class="text-themecolor">Add Vehicle</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item "><a href="{{ route('vehicles') }}">Vehicles</a> </li>
                            <li class="breadcrumb-item ">Add Vehicle </li>
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
                <form method="post" action="{{ route('addVehicle') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Column Start -->
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                       
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="reg_no"> {{ __('Vehicle Registration Number') }}  </label>
                                                <input type="text" name="reg_no" class="form-control" placeholder="{{__('Please enter Vehicle Registration No')}}">
                                                 @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="vehicle_name"> {{ __('Vehicle Name') }}  </label>
                                                <input type="text" name="vehicle_name" class="form-control" placeholder="{{__('Please enter Vehicle Name')}}">
                                                @error('vehicle_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="vehicle_model"> {{ __('Vehicle Model') }}  </label>
                                                <input type="text" name="vehicle_model" class="form-control" placeholder="{{__('Please enter Vehicle Model')}}">
                                                 @error('vehicle_model')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="vehicle_color"> {{ __('Vehicle Color') }}  </label>
                                                <input type="text" name="vehicle_color" class="form-control" placeholder="{{__('Please enter Vehicle Color')}}">
                                            </div>
                                            @error('vehicle_color')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="vehicle_brand"> {{ __('Vehicle Brand') }}  </label>
                                                <input type="text" name="vehicle_brand" class="form-control" placeholder="{{__('Please enter Vehicle Brand')}}">
                                            </div>
                                            @error('vehicle_brand')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="is_leased"> {{ __('Leased Vehicle') }}  </label>
                                                <select class="form-control" name="is_leased" id="is_leased">
                                                    <option value="">Select Type</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <!--input type="text"  class="form-control" placeholder="{{__('Please enter Leased Vehicle')}}"-->
                                            </div>
                                            @error('is_leased')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12" id="leased_company_name" style="display:none">
                                            <div class="form-group">
                                                <label for="leased_company_name"> {{ __('Vehicle Leased Compnay Name') }}  </label>
                                                <input type="text" name="leased_company_name" class="form-control" placeholder="{{__('Please enter Vehicle Leased Compnay Name')}}">
                                            </div>
                                            @error('leased_company_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="vehicle_image"> {{ __('Vehicle Image') }}  </label>
                                                <input type="file" class="form-control" name="vehicle_image" >
                                            </div>
                                            @error('vehicle_image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
