<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            タスク編集
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('todo.edit', ['id' => $todo->id]) }}">
        @csrf

        <!-- タイトル -->
        <div>
            <x-input-label for="title">
                <span>タイトル</span>
                <span class="bg-red-100 text-red-800 text-xs font-medium ms-2 px-2 rounded dark:bg-red-900 dark:text-red-300">必須</span>
            </x-input-label>
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ? old('title') : $todo->title" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- 詳細 -->
        <div class="mt-4">
            <x-input-label for="description">
                詳細
            </x-input-label>
            <x-textarea id="description" class="block mt-1 w-full" name="description">{{ old('description') ? old('description') : $todo->description }}</x-textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- 期日 -->
        <div class="mt-4">
            <x-input-label for="deadline">
                <span>期日</span>
                <span class="bg-red-100 text-red-800 text-xs font-medium ms-2 px-2 rounded dark:bg-red-900 dark:text-red-300">必須</span>
            </x-input-label>
            <x-text-input id="deadline" class="block mt-1 w-full" type="datetime-local" name="deadline" :value="old('deadline') ? old('deadline') : $todo->deadline" required autocomplete="deadline" />
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                更新する
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
