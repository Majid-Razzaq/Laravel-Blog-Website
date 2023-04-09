@extends('layouts.master')

@section('title', 'Category')

@section('content')

    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Category</h4>
            </div>
            <div class="card-body">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/update-category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control m-2">
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" value="{{ $category->slug }}" name="slug" class="form-control m-2">
                    </div>


                    <div class="mb-3">
                        <label>Description</label>
                        <textarea id="summernote" name="description" rows="5" class="form-control">{{ $category->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control m-2">
                    </div>


                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" value="{{ $category->meta_title }}" name="meta_title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea rows="3" name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Meta keyword</label>
                        <textarea rows="3" name="meta_keyword" class="form-control">{{ $category->meta_keyword }}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Navbar Status </label>
                            <input type="checkbox" name="navbar_status"
                                {{ $category->navbar_status == '1' ? 'checked' : '' }} />
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Status </label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }} />
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>


                </form>



            </div>
        </div>

    </div>

@endsection
