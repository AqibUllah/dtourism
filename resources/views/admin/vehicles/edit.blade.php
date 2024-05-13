@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Vehicle</h1>
        
        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $vehicle->name }}" placeholder="Enter vehicle name">
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}" placeholder="Enter vehicle model">
            </div>
            <!-- Add more input fields for other vehicle attributes as needed -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
