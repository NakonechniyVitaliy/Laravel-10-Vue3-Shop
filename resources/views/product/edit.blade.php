@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit product</h1>
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


        <section class="content" style="display: inline-block; width: 60vw!important;">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <form action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PATCH')
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $product->id }}</td>
                                <tr>
                                    <td>Title:</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{ $product->title }}"
                                                   name="title" placeholder="Title">
                                        </div>
                                    </td>
                                <tr>
                                    <td>Description:</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{ $product->description }}"
                                                   name="description" placeholder="Description">
                                        </div>
                                    </td>
                                <tr>
                                    <td>Content:</td>
                                    <td>
                                        <div class="form-group">
                                            <textarea cols="50" class="form-control" name="content"
                                                      placeholder="Content" rows="5">{{ $product->content }}</textarea>
                                        </div>
                                    </td>
                                <tr>
                                    <td>Preview image:</td>
                                    <td>
                                        <img style="width: 8vw;" src="{{ asset('storage/' . $product->preview_image) }}"
                                             alt="main_image">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Preview_image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="preview_image" type="file" class="custom-file-input"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <tr>
                                <tr>
                                    <td>Tags:</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="tags" name='tag_ids[]' multiple="multiple"
                                                    data-placeholder="Select tags"
                                                    style="width: 100%;">
                                                @foreach($tags as $tag)
                                                    <option
                                                        {{ is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                <tr>
                                    <td>Price:</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="{{ $product->price }}"
                                                   name="price"
                                                   placeholder="Price">
                                        </div>
                                    </td>
                                <tr>
                                    <td>Count:</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="{{ $product->count }}"
                                                   name="count"
                                                   placeholder="Count">
                                        </div>
                                    </td>
                                <tr>
                                    <td>Is published:</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{ $product->is_published }}"
                                                   name="is_published" placeholder="Is_published">
                                        </div>
                                    </td>
                                <tr>
                                    <td>Category:</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="custom-select rounded-0" name="category_id">
                                                <option
                                                    value="{{$product->category->id}}">{{ $product->category->title }}</option>
                                                @foreach($categories as $category)
                                                    @if($category->id != $product->category->id)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                <tr>
                                    <td>Colors:</td>
                                    <td>
                                        <select class="colors" name='color_ids[]' multiple="multiple"
                                                data-placeholder="Select colors" style="width: 100%;">
                                            @foreach($colors as $color)
                                                <option
                                                    {{ is_array($product->colors->pluck('id')->toArray()) && in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }}
                                                    value="{{ $color->id }}">{{ '#' . $color->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
