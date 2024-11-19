@if (session('message_info'))
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        {{ session('message_info') }}
    </div>
@endif
@if (session('message_danger'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        {{ session('message_danger') }}
    </div>
@endif
