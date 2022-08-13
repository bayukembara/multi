@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('admin.create') }}" class="btn btn-primary shadows rounded mb-2"><i class="fas fa-plus"></i>
                    Add Staff</a>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="fw-bold">
                            List of Staff
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Staff Id</th>
                                    <th scope="col">Staff Name</th>
                                    <th scope="col">Department Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Resume</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->staffname }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->position }}</td>
                                        <td>{{ $data->number }}</td>
                                        <td>{{ $data->currency }}</td>
                                        <td>{{ $data->salary }}</td>
                                        <td>
                                            <a href="{{ route('admin.download', $data->id) }}"
                                                download="{{ $data->resume }}">{{ $data->resume }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit', $data->id) }}" title="edit"
                                                class="btn btn-success btn-sm ms-2">
                                                <i class="fas fa-pen"></i></a>
                                            <a href="{{ route('admin.delete', $data->id) }}" title="delete"
                                                class="btn btn-danger btn-sm ms-2">
                                                <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">{{ $staffs->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
