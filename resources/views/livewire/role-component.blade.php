<div class="flex flex-col items-center justify-center flex-1 space-y-20">
    <form wire:submit.prevent="save"
        class="flex flex-col items-center justify-center w-4/5 py-10 space-y-6 rounded-lg shadow-lg sm:w-3/5 md:w-2/5 lg:w-1/5 bg-bg-200 dark:shadow-bg-200">
        @csrf
        <label for="title" class="text-xl tracking-widest">Role Name:</label>
        <input type="text" wire:model="title" Placeholder="Enter the new role" label="title"
            class="w-2/3 px-4 py-2 rounded-lg bg-bg-300" />

        @error('title')
            <div class="-mt-6 text-xs font-bold text-red-600 ">
                <p>{{ $message }}</p>
            </div>
        @enderror

        <button type="submit"
            class="w-2/3 px-4 py-2 font-bold tracking-wider transition-all duration-300 rounded-lg cursor-pointer bg-accent-100 hover:bg-accent-100/60">Create
            Role</button>
    </form>

    @if ($roles->isEmpty())
        <div class="w-3/5">
            <h1>There are no Roles to display, create one</h1>
        </div>
    @else
        <div class="grid w-4/5 grid-cols-1 gap-2 lg:grid-cols-3 md:grid-cols-2">
            @foreach ($roles as $role)
                <article class="flex items-center justify-between w-full px-4 py-2 rounded-md shadow-lg bg-bg-300"
                    key={{ $role->id }}>
                    <p class="font-bold capitalize">{{ $role->name }}</p>
                    <button wire:click="delete({{ $role->id }})"
                        onclick="confirm('Are you sure you want to delete this role?') || event.stopImmediatePropagation()"
                        class="text-xs font-bold text-red-500 uppercase cursor-pointer">delete
                        role</button>
                </article>
            @endforeach
        </div>
    @endif
</div>
