@php
    use App\Models\User;
@endphp
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
                    <h4 class="text-themecolor">Edit user</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item ">Edit User</li>
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
                <form method="post" action="{{ route('updateUser') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Column Start -->
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                       <input type="hidden" name="id" value="{{$user->id}}">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name"> {{ __('Name') }}  </label>
                                                <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="{{__('Please enter name')}}">
                                                 @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email"> {{ __('Email') }}  </label>
                                                <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="{{__('Please enter email')}}">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="user_type"> {{ __('Type') }}  </label>
                                                <select name="user_type" id="" class="form-control">
                                                    @foreach (User::USERS_TYPES as $userType)
                                                    @php
                                                    if ($userType == $user->user_type){
                                                        $selectType = 'selected';
                                                    } else {
                                                        $selectType = '';
                                                    }
                                                    @endphp
                                                    <option value="{{ $userType }}" {{ $selectType }}>
                                                        {{ $userType }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('type')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="mobile"> {{ __('Mobile Number') }}  </label>
                                                <input type="text" value="{{$user->mobile}}" name="mobile" class="form-control" placeholder="{{__('Please enter mobile no')}}">
                                            </div>
                                            @error('mobile_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="profile"> {{ __('Profile Picture') }}  </label>
                                                <input type="file" class="form-control" name="profile" >
                                            </div>
                                            @error('profile')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            @if(!empty($user->profile))
                                                <img src="{{ asset('storage/users/'.$user->profile)}}" height="100px" width="100px" alt="Any alt text"/>
                                            @endif
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
