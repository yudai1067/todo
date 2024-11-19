<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            削除済みタスク一覧
        </h2>
    </x-slot>
    <x-alert />
    @if ($todos->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">削除済みのタスクはありません</p>
    @else
        @foreach ($todos as $todo)
            <div class="mb-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $todo->title }}</h5>
                @if ($todo->description)
                    <p class="mb-2 font-normal text-gray-700 dark:text-gray-400 whitespace-pre-wrap">{{ $todo->description }}</p>
                @endif
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-200">期日：{{ $todo->deadline }}</p>
                <div class="flex justify-between">
                    <x-primary-button-link href="{{ route('todo.delete.undo', ['id' => $todo->id]) }}">
                        元に戻す
                    </x-primary-button-link>
                    <x-danger-button-link href="{{ route('todo.delete.force', ['id' => $todo->id]) }}">
                        完全に削除する
                    </x-danger-button-link>
                </div>
            </div>
        @endforeach
    @endif
</x-app-layout>
