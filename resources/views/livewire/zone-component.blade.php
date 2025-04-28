<div x-data="{ showEditForm: false, editZoneId: null }" class="relative z-0 flex flex-col items-center justify-around flex-1">
    <form wire:submit.prevent="createZone"
        class="flex flex-col items-center justify-center w-4/5 p-10 space-y-6 rounded-lg shadow-md lg:w-1/5 md:w-2/5 dark:shadow-bg-200 bg-bg-200">
        @csrf
        <label for="name" class="text-xl tracking-widest">Zone name:</label>
        <input type="text" label="name" placeholder="Enter zone name" wire:model="name"
            class="w-full px-4 py-2 @error('name') border-1 border-red-500 @enderror rounded-lg bg-bg-300" required>
        @error('name')
            <span class="-mt-6 text-xs text-red-500">{{ $message }} </span>
        @enderror
        <button type="submit"
            class="px-4 py-2 tracking-wide uppercase transition-all duration-300 rounded-lg cursor-pointer bg-accent-100/80 hover:bg-accent-100"
            title="create new zone">create new zone</button>
    </form>
    @if ($zones->isEmpty())
        <div>
            <p>There is no zones yet, Create one! </p>
        </div>
    @else
        <div class="grid w-4/5 grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 ">
            @foreach ($zones as $zone)
                <div class="flex items-center justify-between w-full px-4 py-2 rounded-lg bg-bg-200">
                    <div class="space-x-1">
                        <p class="inline-block md:text-xl text-md">{{ $zone->name }}</p>
                        @if ($zone->updated_at != $zone->created_at)
                            <span class="inline-block text-[10px] text-text-200/40"> Edited</span>
                        @endif
                    </div>
                    <div class="flex items-center space-x-4">
                        <p class="text-xs text-text-200"> clients : {{ $zone->clients->count() }} </p>
                        <button class="font-bold uppercase cursor-pointer text-accent-200 text-md"
                            @click="showEditForm = true; editZoneId = {{ $zone->id }}"><i
                                class="transition-all duration-200 fas fa-pen hover:scale-110"
                                title="Update"></i></button>
                        <button class="font-bold text-red-500 uppercase cursor-pointer text-md"
                            wire:click="deleteZone({{ $zone->id }})"
                            onclick="confirm('Are you sure you want to delete this zone?') || event.stopImmediatePropagation()"><i
                                class="transition-all duration-200 fas fa-trash hover:scale-110"
                                title="delete"></i></button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div x-show="showEditForm" class="absolute inset-0 top-0 left-0 flex items-center justify-center bg-bg-200/90"
        @click="showEditForm=false">
        <div x-data="{ alpineZones: @js($zones) }"
            class="relative flex items-center justify-center py-6 rounded-lg shadow-lg md:p-10 md:w-2/5 4/5 bg-bg-300 dark:shadow-bg-300"
            @click.stop="showEditForm=true">
            <div @click.stop="showEditForm = false"
                class="absolute flex items-center justify-center w-4 text-[10px] text-white bg-red-500 rounded-full cursor-pointer top-2 right-2 aspect-square">
                <i class="fas fa-close"></i>
            </div>

            <template x-for="zoneEdit in alpineZones" :key="zoneEdit.id">
                <template x-if="zoneEdit.id === editZoneId">
                    <div class="flex flex-col w-4/5 space-y-4 md:space-y-6">
                        <h1 class="font-bold tracking-wide text-md md:text-xl">Edit zone :</h1>
                        <hr class="w-full border-bg-200">
                        <input x-model="zoneEdit.name" class="px-4 py-2 rounded-lg bg-bg-200"></input>
                        <button wire:click="editZone(zoneEdit.id,zoneEdit.name)" @click.stop="showEditForm = false"
                            class="px-4 py-2 text-xs font-bold tracking-wide uppercase transition-all duration-300 rounded-lg cursor-pointer md:text-md md:w-1/4 1/2 bg-accent-100 hover:bg-accent-100/80">Edit
                            zone</button>
                    </div>
                </template>
            </template>
        </div>
    </div>
</div>
