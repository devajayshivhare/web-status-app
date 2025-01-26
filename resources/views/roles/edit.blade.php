<x-layout>
<h1>Edit Role: {{ $role->name }}</h1>
<form action="{{ route('roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Role Name</label>
        <input type="text" name="name" value="{{ $role->name }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<h2>Assign Permissions</h2>
<form action="{{ route('roles.permissions.assign', $role) }}" method="POST">
    @csrf
    <div class="form-group">
        @foreach($permissions as $permission)
        <div>
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
            {{ $permission->name }}
        </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-success">Update Permissions</button>
</form>
</x-layout>