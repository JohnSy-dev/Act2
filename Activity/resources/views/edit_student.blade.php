@extends('base')
@section('title', 'Edit Student')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Student</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('std.update', $student->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="stdName" class="form-control" value="{{ $student->name }}">
                        </div>
                        <div class="mb-3">
                            <label>Age</label>
                            <input type="text" name="stdAge" class="form-control" value="{{ $student->age }}">
                        </div>
                        <div class="mb-3">
                            <label>Gender</label>
                            <input type="text" name="stdGender" class="form-control" value="{{ $student->gender }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success ">Update</button>
                            <a href="{{ url()->previous() }}" class="btn btn-dark ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>