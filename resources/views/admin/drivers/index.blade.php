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
                    <h4 class="text-themecolor">Drivers</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item ">Drivers </li>
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
            
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row"> 

                    <!-- Column Start -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Number</th>
                                                    <th>image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($drivers))
                                                @foreach($drivers as $driver)
                                                <tr>
                                                    <td>{{ $driver->driver_name }}</td>
                                                    <td>{{ $driver->driver_email }}</td>
                                                    <td>{{ $driver->driver_number }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/drivers/'.$driver->profile_img)}}" height="100px" width="100px" alt="Any alt text"/>
                                                    </td>
                                                    <td>
                                                         <a href=" {{route('edit_driver', ['id' => $driver->id])}}" class="btn btn-info">Edit</a>

                                                        <a href=" {{route('del_driver', ['id' => $driver->id])}}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">No, Record found!!</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>




                            </div>
                        </div>
                    </div>
                </div>
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