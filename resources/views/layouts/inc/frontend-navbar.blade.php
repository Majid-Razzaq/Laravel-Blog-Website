        <div class="global-navbar bg-white">
            <div class="container">
                <div class="row">

                    {{-- d-none d-sm-none --}}
                    <div class="col-md-3 col-sm-3 d-md-inline">

                        @php
                            $setting = App\Models\Setting::find(1);
                        @endphp
                        @if ($setting)
                            <div class="logo-img">
                                <img class="logo-img" src="{{ asset('uploads/settings/' . $setting->logo) }}"
                                    height="100%" width="100%">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9 my-auto">
                        <div class="border text-center p-2">
                            <h5>Advertise Here</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <div class="sticky-top">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">

                    {{-- <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">
                <img src="{{ asset('public/assets/images/logo.jpg') }}" width="140px" height="140px">
            </a> --}}

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>


                            {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                            @php
                                $categories = App\Models\Category::where('navbar_status', '0')
                                    ->where('status', '0')
                                    ->get();
                            @endphp
                            @foreach ($categories as $cateitem)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ url('tutorial/' . $cateitem->slug) }}">{{ $cateitem->name }}</a>
                                </li>
                            @endforeach


                        </ul>


                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                @if (Auth::check())
                            <li>

                                <a class="nav-link btn-danger float-end ml-auto" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a class="nav-link btn-danger" href="{{ route('login') }}">
                                    Login
                                </a>
                            </li>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
