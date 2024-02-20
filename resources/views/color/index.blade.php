@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Colors</h1>
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
                        <div class="card-header">
                            <a href="{{ route('color.create') }}" class="btn btn-primary">Add color</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Color</th>
                                    <th colspan="2" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $color)
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->title }}</td>
                                        <td><i class="fas fa-square-full ml-2" style="color: {{'#' . $color->title }}"></i></td>
                                        <td><a href="{{ route('color.show', $color->id) }}"><i class="fas fa-eye color" style="color: #0c84ff"></i></a></td>
                                        <td><a href="{{ route('color.edit', $color->id) }}"><i class="fas fa-edit" style="color: limegreen"></i></a></td>
                                        <td>
                                            <form action="{{ route('color.delete', $color->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent"><i class="fas fa-trash" style="color: darkred"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
