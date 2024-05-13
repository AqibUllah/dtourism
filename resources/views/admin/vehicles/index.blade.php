@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Vehicles</h1>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add New Vehicle</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Model</th>
                    <!-- Add more table headings as needed -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <!-- Add more table cells as needed -->
                        <td>
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
