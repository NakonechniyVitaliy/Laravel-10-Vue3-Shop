@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tags</h1>
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
                            <a href="{{ route('tag.create') }}" class="btn btn-primary">Add tag</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th colspan="2" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td><a href="{{ route('tag.show', $tag->id) }}"><i class="fas fa-eye color" style="color: #0c84ff"></i></a></td>
                                        <td><a href="{{ route('tag.edit', $tag->id) }}"><i class="fas fa-edit" style="color: limegreen"></i></a></td>
                                        <td>
                                            <form action="{{ route('tag.delete', $tag->id) }}" method="post">
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
