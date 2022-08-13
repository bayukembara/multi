@extends('layouts.app')

@section('content')
    <div class="container">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">{{ $staffs->links() }}</div>
            </div>
        </div>
    </div>
@endsection
