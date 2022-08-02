<div>
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="bg-white px-4 py-5 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Events</h3>
                </div>
                <div class="ml-4 mt-2 flex-shrink-0">
                    <a href="{{ route('events.create')  }}" type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create new Event
                    </a>
                </div>
            </div>
        </div>
    </div>
    <ul role="list" class="pt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($events as $event)
            <livewire:events.event-card :event="$event"></livewire:events.event-card>
        @endforeach
    </ul>
</div>
