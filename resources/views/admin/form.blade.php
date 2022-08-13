@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-md-8 align-self-center">
                    <h4 class="card-title text-light mx-auto">Staff Form</h4>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-sm text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fas fa-trash fa-lg"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route($url, $staff->id ?? '') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($staff))
                    @method('put')
                @endif
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name="staffname"
                                placeholder="Test" value="{{ old('staffname') ?? ($staff->staffname ?? '') }}"> <label
                                for="floatingInput">Staff
                                Name</label>
                        </div>
                        @error('staffname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name="department"
                                placeholder="Test" value="{{ old('staffname') ?? ($staff->department ?? '') }}"> <label
                                for="floatingInput">Department Name</label>
                        </div>
                        @error('department')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name="position" placeholder="Test"
                                value="{{ old('staffname') ?? ($staff->position ?? '') }}"> <label
                                for="floatingInput">Position</label>
                        </div>
                        @error('position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" id="floatingInput" name="number" placeholder="Test"
                                value="{{ old('staffname') ?? ($staff->number ?? '') }}">
                            <label for="floatingInput">Phone Number</label>
                        </div>
                        @error('number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="currency">
                            <option selected>Select Currency</option>
                            <option value="IDR" {{ $staff->currency == 'IDR' ? 'selected' : '' }}>IDR</option>
                            <option value="USD" {{ $staff->currency == 'USD' ? 'selected' : '' }}>USD</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" id="floatingInput" name="salary" placeholder="Test"
                                value="{{ old('staffname') ?? ($staff->salary ?? '') }}">
                            <label for="floatingInput">Salary</label>
                        </div>
                        @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="custom-file">
                            <label for="resume" class="form-label">Resume</label>
                            <input type="file" name="file" class="form-control" value="old('resume')">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> {{ $button }}</button>
                <button type="button" class="btn btn-danger" onclick="window.history.back()"> <i class="fas fa-xmark"></i>
                    Cancel</button>
            </form>
        </div>
    </div>

    @if (isset($staff))
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus user</p>
                    </div>

                    <div class="modal-footer">
                        <form action="{{ route('admin.delete', $staff->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
