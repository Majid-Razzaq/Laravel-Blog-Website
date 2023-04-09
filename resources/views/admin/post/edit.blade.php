@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">

            <div class="card-header">
                <h4>Edit Post
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif


                <form action="{{ url('admin/update-post/' . $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" required class="form-control">
                            <option value="">-- select Category --</option>
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}" {{ $post->category_id ? 'selected' : '' }}>
                                    {{ $cateitem->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input value="{{ $post->name }}" type="text" name="name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input value="{{ $post->slug }}" type="text" name="slug" class="form-control" />
                    </div>



                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea id="summernote" name="description" class="form-control">{{ $post->description }}</textarea>

                    </div>

                    <div class="mb-3">
                        <label for="">YouTube Iframe Link</label>
                        <input value="{{ $post->yt_iframe }}" type="text" name="yt_iframe" class="form-control" />
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input value="{{ $post->meta_title }}" type="text" name="meta_title" class="form-control" />
                    </div>


                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <input value="{{ $post->meta_description }}" type="text" name="meta_description"
                            class="form-control" />
                    </div>


                    <div class="mb-3">
                        <label for="">Meta keyword</label>
                        <input value="{{ $post->meta_keyword }}" type="text" name="meta_keyword" class="form-control" />
                    </div>

                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }}>

                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">update post</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
