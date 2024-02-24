@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
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
        <section class="content" style="display: inline-block; width: 60vw!important;" >
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <a href="{{ route('product.edit', $product->id) }}"
                                   class="btn btn-primary ml-3">Edit</a>
                                <form action="{{ route('product.delete', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-3 mt-3 mb-3">Delete</button>
                                </form>
                                <tbody>
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $product->id }}</td>
                                <tr>
                                    <td>Title:</td>
                                    <td>{{ $product->title }}</td>
                                <tr>
                                    <td>Description:</td>
                                    <td>{{ $product->description }}</td>
                                <tr>
                                    <td>Content:</td>
                                    <td>{{ $product->content }}</td>
                                <tr>
                                    <td>Preview image:</td>
                                    <td><img style="width: 8vw;" src="{{ asset('storage/' . $product->preview_image) }}" alt="main_image"></td>
                                <tr>
                                    <td>Tags:</td>
                                    <td>
                                        @foreach($tags as $tag)
                                            <p class="tags-display">
                                                {{ $tag->title }}
                                            </p>
                                        @endforeach
                                    </td>
                                <tr>
                                    <td>Price:</td>
                                    <td>{{ $product->price }}</td>
                                <tr>
                                    <td>Count:</td>
                                    <td>{{ $product->count }}</td>
                                <tr>
                                    <td>Is published:</td>
                                    <td>{{ $product->is_published }}</td>
                                <tr>
                                    <td>Category:</td>
                                    <td>{{ $product->category->title }}</td>
                                <tr>
                                    <td>Colors:</td>
                                    <td>
                                        @foreach($colors as $color)
                                            <p class="colors-display" style="background-color:{{'#' . $color->title }};">
                                                {{ '#' . $color->title }}
                                            </p>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style>
        .tags-display {
            display: inline-block;
            background-color: #0c84ff;
            padding: 5px;
            border-radius: 8px;
            margin-left: 5px;
            color: white;
        }
        .colors-display{
            display: inline-block;
            padding: 5px;
            border-radius: 8px;
            margin-left: 5px;
            color: white;
        }
    </style>
@endsection
