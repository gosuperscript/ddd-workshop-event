<div>
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="bg-white px-4 py-5 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Create new event</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 py-6 px-6 mt-6">
        <form class="space-y-8 divide-y divide-gray-200" wire:submit.prevent="createEvent">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Event</h3>
                        <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="username" class="block text-sm font-medium text-gray-700"> event name @error('name') <span class="text-red-500">{{ $message }}</span> @enderror</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input wire:model="name" type="text" name="eventname" id="eventname" autocomplete="eventname" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity @error('capacity') <span class="text-red-500">{{ $message }}</span> @enderror</label>
                            <div class="mt-1">
                                <input wire:model="capacity" type="number" name="capacity" id="capacity" autocomplete="family-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="date" class="block text-sm font-medium text-gray-700"> Date (dd-mm-yyyy) @error('date') <span class="text-red-500">{{ $message }}</span> @enderror</label>
                            <div class="mt-1">
                                <input wire:model="date" type="text" name="date" id="date" autocomplete="family-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="location" class="block text-sm font-medium text-gray-700"> Location @error('location') <span class="text-red-500">{{ $message }}</span> @enderror</label>
                            <div class="mt-1">
                                <input wire:model="location" type="text" name="location" id="location" autocomplete="family-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{route('events.list')}}" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
