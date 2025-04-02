<x-layouts.app :title="__('Users | Show')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">


    <div class="container">
        <h2>User Details</h2>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Roles:</strong> {{ $user->roles->pluck('name')->implode(', ') }}</p>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </div>



    </div>
</x-layouts.app>
