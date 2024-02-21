@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Main</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" value="{{ $user->name }}" class="form-control" name="name" placeholder="Name">
                        </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <input type="text" value="{{ $user->surname }}" class="form-control" name="surname" placeholder="Surname">
                        </div>
                        @error('surname')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <input type="text" value="{{ $user->patronymic }}" class="form-control" name="patronymic" placeholder="Patronymic">
                        </div>
                        @error('patronymic')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <input type="number" value="{{ $user->age }}" class="form-control" name="age" placeholder="Age">
                        </div>
                        @error('age')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <input type="text" value="{{ $user->address }}" class="form-control" name="address" placeholder="Address">
                        </div>
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <select class="custom-select form-control-border" name="gender">
                                <option disabled selected>Gender</option>
                                <option {{ $user->gender == 1  || old('gender') == 1 ? 'selected' : '' }} value="1">Male</option>
                                <option {{ $user->gender == 2 || old('gender') == 2 ? 'selected' : '' }} value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection
