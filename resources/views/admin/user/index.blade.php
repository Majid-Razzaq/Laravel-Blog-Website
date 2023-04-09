@extends('layouts.master')

@section('title', 'View Users')

@section('content')

    <div class="container-fluid px-4">
        <div class="card">

            <div class="card-header">
                <h4>View Users
                    <!-- <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a> -->
                </h4>
            </div>
            <div class="card-body">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role_as == '1' ? 'Admin' : 'User' }}</td>
                                    <td>
                                        <a href="{{ url('admin/user/' . $item->id) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/user-delete/' . $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>


            </div>
        </div>
    </div>

@endsection
