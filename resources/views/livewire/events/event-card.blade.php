<li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
    <div class="flex-1 flex flex-col p-8">
        <h3 class="mt-6 text-gray-900 text-sm font-medium">{{$event->name}}</h3>
        <dl class="mt-1 flex-grow flex flex-col justify-between">
            <dd class="text-gray-500 text-sm">{{$event->location}}</dd>
            <dd class="text-gray-500 text-sm">{{$event->date}}</dd>
            <dt class="sr-only">Role</dt>
            <dd class="mt-3">
                @if($event->isPublished())
                    <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">Published</span>
                @else
                    <span class="px-2 py-1 text-orange-800 text-xs font-medium bg-orange-100 rounded-full">Draft</span>
                @endif
            </dd>
        </dl>
    </div>
    <div>
        <div class="-mt-px flex divide-x divide-gray-200">
            <div class="w-0 flex-1 flex">
                <a href="#" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    <span class="ml-3">Edit</span>
                </a>
            </div>
            <div class="-ml-px w-0 flex-1 flex">
                <a href="#" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                    </svg>
                    <span class="ml-3">Go to page</span>
                </a>
            </div>
        </div>
    </div>
</li>
