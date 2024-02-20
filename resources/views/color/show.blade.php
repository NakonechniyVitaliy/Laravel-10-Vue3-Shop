@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Color</h1>
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
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Color</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th colspan="1" >Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->title }}</td>
                                        <td><i class="fas fa-square-full ml-2" style="color: {{'#' . $color->title }}"></i></td>
                                        <td>{{ $color->created_at }}</td>
                                        <td>{{ $color->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('color.edit', $color->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('color.delete', $color->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    <!-- ./col -->

@endsection
