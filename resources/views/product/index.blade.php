@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Add product</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Colors</th>
                                    <th>Tags</th>
                                    <th>Count</th>
                                    <th>Is_published</th>
                                    <th>Category_id</th>
                                    <th colspan="2" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                <i class="fas fa-square-full ml-2" style="color: {{'#' . $color->title }};border:2px solid black;box-sizing:border-box;"></i>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                {{$tag->title}}
                                            @endforeach
                                        </td>
                                        <td>{{ $product->count }}</td>
                                        <td>{{$product->is_publish == '1' ? 'No' : 'Yes'}}</td>
                                        <td>{{ $product->category->title }}</td>
                                        <td><a href="{{ route('product.show', $product->id) }}"><i class="fas fa-eye color" style="color: #0c84ff"></i></a></td>
                                        <td><a href="{{ route('product.edit', $product->id) }}"><i class="fas fa-edit" style="color: limegreen"></i></a></td>
                                        <td>
                                            <form action="{{ route('product.delete', $product->id) }}" method="post">
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
