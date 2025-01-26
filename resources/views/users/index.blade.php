<x-layout>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
            <td>
                <form action="{{ route('users.roles.assign', $user) }}" method="POST">
                    @csrf
                    <select name="roles[]" multiple>
                        @foreach($roles as $role)
                        {{-- <option value="{{ $role->name }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option> --}}
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Assign Roles</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-layout>