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
                    <h4 class="text-themecolor">Vehicles</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item ">Vehicles </li>
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
                                                    <th>Registration Number</th>
                                                    <th>Vehicle Name</th>
                                                    <th>Vehicle Model</th>
                                                    <th>Leased Vehicle</th>
                                                    <th>Company Name</th>
                                                    <th>Vehicle Color</th>
                                                    <th>Vehicle Brand</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($vehicles))
                                                @foreach($vehicles as $vehicle)
                                                @php

                                                if($vehicle->is_leased==1){

                                                    $leased="Yes";
                                                    $company_name=$vehicle->leased_company_name;
                                                }else
                                                {
                                                    $leased="No";
                                                    $company_name='--';
                                                }
                                                
                                                @endphp
                                                <tr>
                                                    <td>{{ $vehicle->reg_no }}</td>
                                                    <td>{{ $vehicle->vehicle_name }}</td>
                                                    <td>{{ $vehicle->vehicle_model }}</td>
                                                    <td>{{ $leased }}</td>
                                                    <td>{{ $company_name }}</td>
                                                    <td>{{ $vehicle->vehicle_color }}</td>
                                                    <td>{{ $vehicle->vehicle_brand }}</td>
                                                    <td><img src="{{ asset('storage/vehicles/'.$vehicle->vehicle_image)}}" height="100px" width="100px" alt="Any alt text"/></td>
                                                    
                                                    <td>
                                                        <a href=" {{route('editVehicle', ['id' => $vehicle->id])}}" class="btn btn-info">Edit</a>

                                                        <a href=" {{route('del_vehicle', ['id' => $vehicle->id])}}" class="btn btn-danger">Delete</a>
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


@section('scripts')
@endsection
