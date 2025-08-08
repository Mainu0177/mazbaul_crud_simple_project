@extends('layout.app')
@section('content')

    <!-- Edit Modal HTML -->
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
                    <a href="{{route('employee.index')}}" type="button" class="btn btn-success">Back</a>
                </div>
                <form action="{{route('employee.updates', $employee->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <label class="form-label">Employee Name *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$employee->name}}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Employee Email *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$employee->email}}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Employee Phone *</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$employee->phone}}">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
