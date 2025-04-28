<div class="flex flex-col items-center justify-center flex-1 space-y-6">
    <div class="flex flex-col items-center justify-between w-4/5 mt-10 space-y-2 md:space-y-0 md:flex-row">
        <div class="w-32 p-2 uppercase rounded-lg md:p-6 bg-gradient-to-r from-primary-100 to-primary-200 md:w-52">
            <h3 class="text-[8px] font-bold md:text-sm">Total Users: </h3>
            <h1 class="font-light text-[10px] md:text-2xl">{{ $users->count() }}</h1>
        </div>
        @foreach ($roles as $statRole)
            <div class="w-32 p-2 uppercase rounded-lg md:p-6 bg-gradient-to-r from-primary-100 to-primary-200 md:w-52">
                <h3 class="w-full text-[8px] font-bold md:text-sm">Total {{ $statRole->name }}s:</h3>
                <h1 class="font-light text-[10px] md:text-2xl"> {{ $statRole->users->count() }}</h1>
            </div>
        @endForeach
    </div>
    <div class="flex flex-col items-start justify-between w-4/5 space-y-10 md:space-x-20 md:flex-row">
        <form wire:submit.prevent="save"
            class="flex flex-col items-center justify-center w-full py-4 space-y-6 rounded-lg md:py-10 md:shadow-lg sm:w-1/4 bg-bg-200 dark:shadow-bg-200">
            @csrf
            <div class="flex flex-col justify-center w-4/5 space-y-1">
                <label for="name" class="self-start text-xs tracking-widest md:text-xl">Enter your name:</label>
                <input type="text" wire:model="name" Placeholder="Enter your name" label="name"
                    class="px-2 py-1 rounded-lg md:px-4 md:py-2 bg-bg-300" />

                @error('name')
                    <div class="text-xs font-bold text-red-600 ">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="flex flex-col justify-center w-4/5 space-y-1">
                <label for="email" class="text-xs tracking-widest md:text-xl">Enter your e-mail:</label>
                <input type="email" wire:model="email" Placeholder="Enter users email" label="users email"
                    class="px-2 py-1 rounded-lg md:px-4 md:py-2 bg-bg-300" />

                @error('email')
                    <div class="text-xs font-bold text-red-600 ">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="flex flex-col justify-center w-4/5 space-y-1">
                <label for="password" class="text-xs tracking-widest md:text-xl">Enter your password:</label>
                <input type="password" wire:model="password" Placeholder="Enter your password" label="password"
                    class="px-2 py-1 rounded-lg md:px-4 md:py-2 bg-bg-300" />

                @error('password')
                    <div class="text-xs font-bold text-red-600 ">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="flex flex-col justify-center w-4/5 space-y-1">
                <label for="password_confirmation" class="text-xs tracking-widest md:text-xl">Confirm your
                    password:</label>
                <input type="password" wire:model="password_confirmation" Placeholder="Confirm your password"
                    label="password_confirmation" class="px-2 py-1 rounded-lg md:px-4 md:py-2 bg-bg-300" />
            </div>
            <div class="flex flex-col justify-center w-4/5 space-y-1">
                <label for="role" class="text-xs tracking-widest md:text-xl">Select your role:</label>
                <select class="px-2 py-1 rounded-lg md:px-4 md:py-2 bg-bg-300 " wire:model.blur="roleId" label="roleId">
                    <option value=""> </option>
                    @foreach ($roles as $singleRole)
                        <option value="{{ $singleRole->id }}">{{ $singleRole->name }}</option>
                    @endforeach
                </select>

                @error('roleId')
                    <div class="text-xs font-bold text-red-600 ">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <button type="submit"
                class="w-1/2 px-1 py-2 text-xs font-bold tracking-wider transition-all duration-300 rounded-lg cursor-pointer md:text-[15px] md:px-4 md:py-2 bg-accent-100 hover:bg-accent-100/60">Create
                New
                User</button>
        </form>

        @if ($users->isEmpty())
            <div class="flex-1 h-full">
                <h1>There are no users to display, create one !</h1>
            </div>
        @else
            <div class="flex-col items-start justify-start flex-1 w-full h-full space-y-2 ">
                <h1 class="font-bold md:text-2xl text-md">Users : </h1>
                <div class="grid w-full grid-cols-1 gap-2 mb-10 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($users as $user)
                        <article
                            class="flex items-center justify-between w-full px-4 py-2 rounded-md shadow-md bg-bg-200">
                            <div class="space-x-1">
                                <p class="inline-block text-xs font-bold capitalize md:text-lg">{{ $user->name }}</p>
                                <p class="text-[8px] md:text-[10px] text-text-100/80 capitalize inline-block">
                                    {{ $user->roles->pluck('name')->join(', ') }}</p>
                            </div>
                            <button wire:click="delete({{ $user->id }})"
                                onclick="confirm('Are you sure you want to delete this role?') || event.stopImmediatePropagation()"
                                class="text-xs font-bold text-red-500 uppercase cursor-pointer md:text-md"
                                title="delete user"><i class="fas fa-trash"></i></button>
                        </article>
                    @endforeach

                </div>
            </div>
        @endif
    </div>
</div>
