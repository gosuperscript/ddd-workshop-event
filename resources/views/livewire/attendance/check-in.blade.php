<div>
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="bg-white px-4 py-5 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Check in guests for {{$event->name}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="@if($error) bg-red-600 @else bg-white @endif overflow-hidden shadow rounded-lg divide-y divide-gray-200 py-6 px-6 mt-6">
        @if($message)
            <span class="text-3xl @if($error) text-white @endif">{{$message}}</span>
        @else
        <form class="space-y-8 divide-y divide-gray-200" wire:submit.prevent="checkIn">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="guestId" class="block text-sm font-medium text-gray-700">Guest ID @error('name') <span class="text-red-500">{{ $message }}</span> @enderror</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input wire:model="guestId" type="text" name="guestId" id="guestId" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Check in
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>
    <div>
        @if($message)
            <button class="mt-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="nextCheckin()">Next</button>
        @endif
    </div>
</div>
