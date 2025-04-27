<div class="flex flex-col items-center justify-center flex-1 space-y-20">
    <form wire:submit.prevent="save"
        class="flex flex-col items-center justify-center w-4/5 py-10 space-y-6 rounded-lg shadow-lg sm:w-3/5 md:w-2/5 lg:w-1/5 bg-bg-200 dark:shadow-bg-200">
        @csrf
        <div class="flex flex-col justify-center w-4/5 space-y-1">
            <label for="name" class="self-start text-xl tracking-widest">Enter your name:</label>
            <input type="text" wire:model="name" Placeholder="Enter your name" label="name"
                class="px-4 py-2 rounded-lg bg-bg-300" />

            @error('name')
                <div class="text-xs font-bold text-red-600 ">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center w-4/5 space-y-1">
            <label for="email" class="text-xl tracking-widest">Enter your e-mail:</label>
            <input type="email" wire:model="email" Placeholder="Enter users email" label="users email"
                class="px-4 py-2 rounded-lg bg-bg-300" />

            @error('email')
                <div class="text-xs font-bold text-red-600 ">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center w-4/5 space-y-1">
            <label for="password" class="text-xl tracking-widest">Enter your password:</label>
            <input type="password" wire:model="password" Placeholder="Enter your password" label="password"
                class="px-4 py-2 rounded-lg bg-bg-300" />

            @error('password')
                <div class="text-xs font-bold text-red-600 ">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center w-4/5 space-y-1">
            <label for="password_confirmation" class="text-xl tracking-widest">Confirm your password:</label>
            <input type="password" wire:model="password_confirmation" Placeholder="Confirm your password"
                label="password_confirmation" class="px-4 py-2 rounded-lg bg-bg-300" />
        </div>
        <div class="flex flex-col justify-center w-4/5 space-y-1">
            <label for="role" class="text-xl tracking-widest">Select your role:</label>
            <select class="px-4 py-2 rounded-lg bg-bg-300 " wire:model.blur="roleId" label="roleId">
                <option value=""> </option>
                @foreach ($roles as $singleRole)
                    <option value="{{ $singleRole->id }}">{{ $singleRole->name }} {{ $singleRole->id }}</option>
                @endforeach
            </select>

            @error('roleId')
                <div class="text-xs font-bold text-red-600 ">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <button type="submit"
            class="w-2/3 px-4 py-2 font-bold tracking-wider transition-all duration-300 rounded-lg cursor-pointer bg-accent-100 hover:bg-accent-100/60">Create
            New
            User</button>
    </form>

    @if ($users->isEmpty())
        <div class="w-3/5">
            <h1>There are no users to display, create one !</h1>
        </div>
    @else
        <div class="grid w-4/5 grid-cols-1 gap-2 lg:grid-cols-3 md:grid-cols-2">
            @foreach ($users as $user)
                <article class="flex items-center justify-between w-full px-4 py-2 rounded-md shadow-lg bg-bg-300">
                    <p class="font-bold capitalize">{{ $user->name }}</p>
                    <p class="font-bold capitalize">{{ $user->roles->pluck('name')->join(', ') }}</p>
                    <button wire:click="delete({{ $user->id }})"
                        onclick="confirm('Are you sure you want to delete this role?') || event.stopImmediatePropagation()"
                        class="text-xs font-bold text-red-500 uppercase cursor-pointer">delete
                        user</button>
                </article>
            @endforeach
        </div>
    @endif
</div>
