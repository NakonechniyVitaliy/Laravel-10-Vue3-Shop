@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create product</h1>
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
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                        </div>
                        <div class="form-group">
                                <textarea cols="50" class="form-control" name="content" placeholder="Content" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Preview_image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="count" placeholder="Count">
                        </div>
                        <div>
                            <div class="form-group">
                                <select class="tags" name='tag_ids[]' multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <select class="colors" name='color_ids[]' multiple="multiple" data-placeholder="Select colors" style="width: 100%;">
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="is_published" placeholder="Is_published">
                        </div>
                        <div class="form-group">
                            <select class="custom-select rounded-0" name="category_id">
                                <option disabled selected>Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
