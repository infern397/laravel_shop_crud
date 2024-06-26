@extends('layouts.admin')

@section('title', 'Главная')

@section('content')
    <div class="page-heading">
        <h3>User</h3>
    </div>
    <div class="page-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
        <section class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User: {{ $user->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>FIELD</th>
                                        <th>VALUE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-bold-500">ID</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Firstname</td>
                                        <td>{{ $user->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Lastname</td>
                                        <td>{{ $user->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Address</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">CREATED AT</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">UPDATED AT</td>
                                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
