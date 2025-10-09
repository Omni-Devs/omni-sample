@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="permission-name">Permission *</label>
                    <input type="text" name="name" id="permission-name" class="form-control" placeholder="Enter Permission Name" required>
                </div>
                <div class="col-md-12 mt-3">
                    <label for="permission-description">Permission Description</label>
                    <textarea name="description" id="permission-description" class="form-control" placeholder="Enter Permission Description"></textarea>
                </div>
            </div>

            <hr>
            <label>Permissions *</label>

            @foreach($permissions->chunk(3) as $chunk)
                <div class="row">
                    @foreach($chunk as $permission)
                        <div class="col-md-4 mb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}" class="custom-control-input">
                                <label class="custom-control-label" for="perm_{{ $permission->id }}">
                                    <strong>{{ ucfirst(str_replace('view ', '', $permission->name)) }}</strong>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">
                <i class="i-Yes me-2 font-weight-bold"></i> Submit
            </button>
        </form>
    </div>
</div>
@endsection
