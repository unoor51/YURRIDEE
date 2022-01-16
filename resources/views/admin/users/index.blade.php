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
                    <h4 class="text-themecolor">Users</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item ">Users </li>
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

                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Profile</th>
                                                    <th>Cnic</th>
                                                    <th>Verified</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($users))
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if(!empty($user->profile))
                                                            <img src="{{ asset('storage/users/'.$user->profile)}}" height="100px" width="100px" alt="Any alt text"/>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($user->cnic))
                                                            <img src="{{ asset('storage/users/'.$user->cnic)}}" height="100px" width="100px" alt="Any alt text"/>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($user->status == 1 )
                                                            <span class="label label-success">yes</span>
                                                        @else
                                                            <span class="label label-danger">No</span>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($user->status == 0)
                                                            <a href="{{route('verifyUser',encrypt($user->id)) }}" class="btn btn-success">Verify</a>
                                                        @endif
                                                       <a href="{{route('editUser',encrypt($user->id)) }}" class="btn btn-info">Edit</a>
                                                       <a href="{{route('deleteUser',encrypt($user->id)) }}" class="btn btn-danger" onclick="return confirm('Are you sure? You want to delete this user!');" >Delete</button>
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
