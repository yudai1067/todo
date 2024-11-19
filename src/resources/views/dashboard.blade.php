<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-alert />
    <x-primary-button-link href="{{ route('todo.create') }}" class="mb-5">
        タスクを追加する
    </x-primary-button-link>
    @if ($todos->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">未完了のタスクはありません</p>
    @else
        <h5 class="text-xl font-bold dark:text-white mb-2">タスク一覧</h5>
        @foreach ($todos as $todo)
            <div class="mb-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if (Illuminate\Support\Carbon::parse($todo->deadline)->lt(Illuminate\Support\Carbon::now()))
                    <div class="flex mb-2 text-sm text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">期日を超過しています</span>
                        </div>
                    </div>
                @endif
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $todo->title }}</h5>
                @if ($todo->description)
                    <p class="mb-2 font-normal text-gray-700 dark:text-gray-400 whitespace-pre-wrap">{{ $todo->description }}</p>
                @endif
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-200">期日：{{ $todo->deadline }}</p>
                <div class="flex justify-between">
                    <div class="inline">
                        <x-primary-button-link href="{{ route('todo.complete', ['id' => $todo->id]) }}">
                            完了する
                        </x-primary-button-link>
                        <x-primary-button-link href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="ms-2">
                            編集する
                        </x-primary-button-link>
                    </div>
                    <x-danger-button-link href="{{ route('todo.delete', ['id' => $todo->id]) }}">
                        削除する
                    </x-danger-button-link>
                </div>
            </div>
        @endforeach
    @endif
</x-app-layout>
