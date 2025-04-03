<div>
    <h1>Staff Management</h1>
    <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">Add Staff</a>

    <div class="form-group">
        <label for="bus">Select Bus</label>
        <select id="bus" wire:model="selectedBus" class="form-control">
            <option value="">All Buses</option>
            @foreach($buses as $bus)
                <option value="{{ $bus->id }}">{{ $bus->name }}</option>
            @endforeach
        </select>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <a href="{{ route('admin.staff.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.staff.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
