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
                    <h4 class="text-themecolor">Edit Company</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item "><a href="{{ route('companies') }}">Companies</a> </li>
                            <li class="breadcrumb-item ">Edit Company </li>
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
                <form method="post" action="{{ route('update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Column Start -->
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                       <input type="hidden" name="id" value="{{$company->id}}">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name"> {{ __('Company Name') }}  </label>
                                                <input type="text" value="{{$company->name}}" name="name" class="form-control" placeholder="{{__('Please enter company name')}}">
                                                 @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email"> {{ __('Company Email') }}  </label>
                                                <input type="text" name="email" value="{{$company->email}}" class="form-control" placeholder="{{__('Please enter email')}}">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="registration_no"> {{ __('Company Registration#') }}  </label>
                                                <input type="text" value="{{$company->registration_no}}" name="registration_no" class="form-control" placeholder="{{__('Please enter company registration no')}}">
                                            </div>
                                            @error('registration_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="logo"> {{ __('Company Logs') }}  </label>
                                                <input type="file" class="form-control" name="logo" >
                                            </div>
                                            @error('logo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{ asset('storage/companies/'.$company->logo)}}" height="100px" width="100px" alt="Any alt text"/>
                                            <input type="hidden" name="old_logo" value="{{$company->logo}}">
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button class="btn btn-info"> Update </button>
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