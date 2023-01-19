<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Форма обратной связи') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <form method="post" action="{{ route('client.feedback.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="name" :value="__('Тема')" />
                            <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" required autofocus autocomplete="subject" />
                            <x-input-error class="mt-2" :messages="$errors->get('subject')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Сообщение')" />
                            <x-textarea id="message" name="message" type="text" class="mt-1 block w-full" required autocomplete="message" />
                            <x-input-error class="mt-2" :messages="$errors->get('message')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Вложение')" />
                            <x-text-input id="attachment" name="attachment" type="file" class="mt-1 block w-full" autocomplete="attachment" />
                            <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Отправить') }}</x-primary-button>

                            @if (Session::has('success'))
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('Сохранено') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
