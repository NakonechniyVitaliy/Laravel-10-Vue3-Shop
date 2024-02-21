@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary ml-3">Edit</a>

                                        <form action="{{ route('user.delete', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ml-3 mt-3 mb-3">Delete</button>
                                        </form>

                                <tbody>
                                    <tr>
                                        <td>ID:</td>
                                        <td>{{ $user->id }}</td><tr>
                                        <td>Name:</td>
                                        <td>{{ $user->name }}</td><tr>
                                        <td>Email:</td>
                                        <td>{{ $user->email }}</td><tr>
                                        <td>Surname:</td>
                                        <td>{{ $user->surname }}</td><tr>
                                        <td>Patronymic:</td>
                                        <td>{{ $user->patronymic }}</td><tr>
                                        <td>Age:</td>
                                        <td>{{ $user->age }}</td><tr>
                                        <td>Address:</td>
                                        <td>{{ $user->address }}</td><tr>
                                        <td>Gender:</td>
                                        <td>{{ $user->getGenderTitleAttribute() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- ./col -->
    </div>
@endsection
