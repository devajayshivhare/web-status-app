<x-layout>
<div class="container">
    <h1>Create a New Permission</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Permission Form -->
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Permission Name" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Permission</button>
    </form>
</div>
</x-layout>
