<div class='flex flex-col items-center justify-around flex-1 pt-10 space-y-10'>
    <div
        class="flex flex-col items-center justify-center w-full space-x-0 space-y-4 md:space-x-2 lg:space-x-4 md:space-y-0 md:flex-row">
        <input type="text" wire:model.live.debounce.300ms="search"
            placeholder="Search some clients by name or company or phone..."
            class="w-4/5 px-4 py-2 rounded-lg md:w-1/3 border-1 border-bg-200" />
        <select wire:model.live.debounce.300="zoneSearch"
            class="w-4/5 px-4 py-2 rounded-lg md:w-1/6 border-1 border-bg-200 bg-bg-100">
            <option value=""> Zones </option>
            @foreach ($zones as $zoneSelect)
                <option value="{{ $zoneSelect->id }}">{{ $zoneSelect->name }}</option>
            @endforeach
        </select>
        <select wire:model.live.debounce.300="statusSearch"
            class="w-4/5 px-4 py-2 rounded-lg md:w-1/6 border-1 border-bg-200 bg-bg-100">
            <option value=""> Status </option>
            <option value="active" class="capitalize"> active </option>
            <option value="inactive" class="capitalize"> inactive </option>
            <option value="pending" class="capitalize"> pending </option>
        </select>
    </div>
    <div
        class="flex flex-col items-center justify-start flex-1 w-full space-x-0 space-y-6 md:px-10 md:items-start md:flex-row md:space-x-2 lg:space-x-4 md:space-y-0">
        <div class="px-4 py-6 space-y-2 rounded-lg shadow-lg w-9/10 md:w-1/4 bg-bg-200 dark:shadow-bg-200">
            <h1 class="text-lg font-bold capitalize">Create new client :</h1>
            <form wire:submit.prevent="createClient" class="flex flex-col space-y-4 text-text-100">
                <div class="flex flex-col space-y-1">
                    <label for="name" class="text-xs tracking-wide">Name : </label>
                    <input type="text" placeholder="Exp: Mokrani Djamel" wire:model="name" required
                        class=" {{ $errors->has('name') ? 'border-red-500' : 'border-bg-300' }}  border-1 py-1 px-2 rounded-lg w-full text-sm" />
                    @error('name')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="email" class="text-xs tracking-wide">Email ( optional ) : </label>
                    <input type="email" placeholder="Exp: clients@gmail.com" wire:model="email"
                        class=" {{ $errors->has('email') ? 'border-red-500' : 'border-bg-300' }}  border-1 py-1 px-2 rounded-lg w-full text-sm" />
                    @error('email')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="phone" class="text-xs tracking-wide">Phone ( optional ) : </label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Exp: 123-123-1234"
                        wire:model="phone"
                        class=" {{ $errors->has('phone') ? 'border-red-500' : 'border-bg-300' }}  border-1 py-1 px-2 rounded-lg w-full text-sm" />
                    @error('phone')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="company" class="text-xs tracking-wide">Company ( optional ) : </label>
                    <input type="text" placeholder="Exp : Ramy food company" wire:model="company_name"
                        class=" {{ $errors->has('company_name') ? 'border-red-500' : 'border-bg-300' }}  border-1 py-1 px-2 rounded-lg w-full text-sm" />
                    @error('company_name')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="notes" class="text-xs tracking-wide">Notes ( optional ) : </label>
                    <input type="text" placeholder="Exp : This is a new clients brother of..." wire:model="notes"
                        class=" {{ $errors->has('notes') ? 'border-red-500' : 'border-bg-300' }}  border-1 py-1 px-2 rounded-lg w-full text-sm" />
                    @error('notes')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="status" class="text-xs tracking-wide">Status : </label>
                    <select wire:model='status' class="px-2 py-1 text-xs rounded-lg border-bg-300 bg-bg-200 border-1">
                        <option value="">------</option>
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                        <option value="pending">pending</option>
                    </select>
                    @error('status')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="zone_id" class="text-xs tracking-wide">Zones : </label>
                    <select wire:model='zone_id' class="px-2 py-1 text-xs rounded-lg border-bg-300 bg-bg-200 border-1">
                        <option value="">------</option>
                        @foreach ($zones as $zone)
                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                        @endforeach
                    </select>
                    @error('zone_id')
                        <div>
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col w-1/2 mx-auto mt-4 md:w-1/3">
                    <button wire:submit="submit"
                        class="px-4 py-2 text-xs uppercase transition-all duration-100 rounded-lg cursor-pointer bg-accent-100/80 hover:bg-accent-100">
                        create client
                    </button>
                </div>
            </form>
        </div>
        <div class="md:flex-1">
            @if ($clients->isEmpty())
                <p> There is no clients to display, create one using the form </p>
            @else
                <div class="flex flex-col h-full space-y-5 md:min-h-150 ">
                    <table class="w-full text-sm text-left border-bg-300">
                        <thead class="rounded-lg text-text-100 bg-bg-200 border-1 border-bg-200">
                            <tr>
                                <th colspan="8" class="px-4 py-2 text-lg font-semibold">Clients :</th>
                            </tr>
                            <tr>
                                <th class="w-1/6 px-4 py-2 text-xs md:text-md lg:text-lg">Name</th>
                                <th class="hidden w-1/6 px-4 py-2 text-xs md:table-cell md:text-md lg:text-lg">Email
                                </th>
                                <th class="hidden w-1/6 px-4 py-2 text-xs md:table-cell md:text-md lg:text-lg">Phone
                                </th>
                                <th class="hidden w-1/6 px-4 py-2 text-xs md:table-cell md:text-md lg:text-lg">Company
                                </th>
                                <th class="w-1/6 px-4 py-2 text-xs md:text-md lg:text-lg">Status</th>
                                <th class="hidden w-1/6 px-4 py-2 text-xs md:table-cell md:text-md lg:text-lg">Notes
                                </th>
                                <th class="w-1/6 px-4 py-2 text-xs md:text-md lg:text-lg">Zone</th>
                                <th class="w-1/6 px-4 py-2 text-xs text-center md:text-md lg:text-lg"><i
                                        class="fas fa-cog"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="border-1 text-text-100 border-bg-200">
                            @foreach ($clients as $client)
                                <tr
                                    class="text-xs transition-all duration-200 border-t-2 border-bg-200 hover:bg-bg-300">
                                    <td class="px-4 py-2 text-xs md:text-md lg:text-[15px] capitalize ">
                                        {{ $client->name }}</td>
                                    <td
                                        class="hidden px-4 py-2 text-xs md:table-cell md:text-md lg:text-[15px] capitalize ">
                                        {{ $client->email ?? 'No email' }}</td>
                                    <td
                                        class="hidden px-4 py-2 text-xs md:table-cell md:text-md lg:text-[15px] capitalize ">
                                        {{ $client->phone == '' ? 'No phone number' : $client->phone }}
                                    </td>
                                    <td
                                        class="hidden px-4 py-2 text-xs md:table-cell md:text-md lg:text-[15px] capitalize ">
                                        {{ $client->company_name ?? 'No company' }}</td>
                                    <td
                                        class="px-4 py-2 capitalize  text-xs md:text-md lg:text-[15px] capitalize  {{ $client->status == 'active' ? 'text-green-600' : '' }}
                                    {{ $client->status == 'inactive' ? 'text-red-600' : '' }}
                                     {{ $client->status == 'pending' ? 'text-blue-600' : '' }}">
                                        {{ $client->status }}</td>
                                    <td
                                        class="hidden px-4 py-2 text-xs md:table-cell md:text-md lg:text-[15px] capitalize ">
                                        {{ $client->notes ?? 'No notes' }}</td>
                                    <td class="px-4 py-2 text-xs md:text-md lg:text-[15px] capitalize ">
                                        {{ $client->zone->name }}
                                    </td>
                                    <td
                                        class="flex items-center self-center justify-center md:mt-3 mt-5 md:space-x-3 lg:space-x-4 space-x-2 md:text-[16px] text-xs md:min-w-20">
                                        <i class="inline-block cursor-pointer text-accent-200 fas fa-pen"
                                            title="edit client"></i>
                                        <i class="inline-block text-red-500 cursor-pointer fas fa-trash"
                                            title="Delete client"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-auto">
                        {{ $clients->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
