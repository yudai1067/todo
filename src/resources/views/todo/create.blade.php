<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            タスク新規登録
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('todo.create') }}">
        @csrf

        <!-- タイトル -->
        <div>
            <x-input-label for="title">
                タイトル
            </x-input-label>
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- 詳細 -->
        <div class="mt-4">
            <x-input-label for="description">
                詳細
            </x-input-label>
            <x-textarea id="description" class="block mt-1 w-full" name="description">{{ old('description') }}</x-textarea>
            <x-input-error :messages="$errors->get('textarea')" class="mt-2" />
        </div>

        <!-- 期日 -->
        <div class="mt-4">
            <x-input-label for="deadline">
                期日
            </x-input-label>
            <x-text-input id="deadline" class="block mt-1 w-full" type="datetime-local" name="deadline" required
                autocomplete="deadline" />
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                作成する
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
