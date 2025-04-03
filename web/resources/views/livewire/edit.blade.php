<div>
    <h1>Edit Staff Member</h1>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" wire:model="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Staff</button>
    </form>
    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif
</div>
