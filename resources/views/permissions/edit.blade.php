<x-layout>
<div class="container">
    <h1>Edit Permission</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Permission Form -->
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specify that this is an update request -->

        <div class="form-group">
            <label for="name">Permission Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control" 
                value="{{ $permission->name }}" 
                placeholder="Enter Permission Name" 
                required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Permission</button>
    </form>
</div>
</x-layout>
