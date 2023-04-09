@extends('layouts.app')

@section('title', "$setting->meta_title")

@section('meta_description', " $setting->meta_description")

@section('meta_keyword', " $setting->meta_keyword")

@section('content')

    <style>
        .cont {
            background: url("public/assets/images/blog_bg.jpg");
            height: 100%;
            width: 100%;
            background-size: cover;
        }

        .owl-nav button.owl,
        .owl-nav button.owl-prev {
            color: #000000 !important;
            margin-left: 10px;
            background-color: orange !important;
            border: none !important;
            outline: none;
            font-size: 50px !important;
            width: 38px !important;
            height: 55px;
        }

        .owl-nav button.owl-next {
            color: #000000 !important;
            margin-left: 10px;
            background-color: orange !important;
            border: none !important;
            outline: none;
            font-size: 50px !important;
            height: 55px;
            width: 38px !important;
        }
    </style>

    <div class="cont py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">

                        @foreach ($all_categories as $all_cate_item)
                            <div class="items">
                                <a href="{{ url('tutorial/' . $all_cate_item->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('upload/category/' . $all_cate_item->image) }}" alt="image">
                                        <div class="card-body text-center">
                                            <h5 class="text-dark">{{ $all_cate_item->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1 bg-gray">
        <div class="container">
            <div class="border text-center p-3 ">
                <h3>Advertise here</h3>
            </div>
        </div>
    </div>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>AssistU Blog</h4>
                    <div class="underline"></div>
                    <p>Are you struggling with coding in multiple languages like Laravel, PHP, and Javascript? Look no
                        further than AssitU Blog Website! Our website is designed to provide assistance to coders of all
                        levels, from beginners to experts, with a wide range of programming challenges.
                        <br>
                        With AssitU Blog Website, you can easily access a vast library of code snippets, tutorials, and
                        examples in multiple languages. Whether you need help with front-end development using HTML, CSS,
                        and Javascript or back-end development with PHP and Laravel, we've got you covered. We also offer
                        guidance on popular frameworks like React, Vue, and Angular.
                        <br>
                        Our website is user-friendly and easy to navigate, with a search function that allows you to quickly
                        find the information you need. Our team of experienced developers is constantly updating the website
                        with new content, so you'll always have access to the latest tools and techniques.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Categories</h4>
                    <div class="underline"></div>
                </div>
                @foreach ($all_categories as $all_cate_item)
                    <div class="col-md-3">
                        <div class="card card-body">
                            <a href="{{ url('tutorial/' . $all_cate_item->slug) }}" class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{ $all_cate_item->name }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts</h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-8">
                    @foreach ($latest_post as $latest_post_item)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a
                                href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{ $latest_post_item->name }}</h5>
                            </a>
                            <h6>Posted On: {{ $latest_post_item->created_at->format('d-m-Y') }}</h6>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border text-center p-3">
                        <h3>Advertise here</h3>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
