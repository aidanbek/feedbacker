<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Заявки из обратной связи') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <table class="shadow-lg bg-white w-full">
                        <thead>
                        <tr>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Создано</th>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Тема</th>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Сообщение</th>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Вложение</th>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Имя клиента</th>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Email клиента</th>
                            <th class="bg-blue-100 border text-left px-8 py-4 text-center">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td class="border px-8 py-4 text-center">{{ $feedback->created_at->addHours(6) }}</td>
                                <td class="border px-8 py-4">{{ $feedback->subject }}</td>
                                <td class="border px-8 py-4">{{ $feedback->message }}</td>
                                <td class="border px-8 py-4 text-center">
                                    @if ($feedback->attachment_path)
                                        <a href="{{ route('manager.feedbacks.downloadAttachment', $feedback->id) }}">Скачать</a>
                                    @endif
                                </td>
                                <td class="border px-8 py-4">{{ $feedback->creationUser->name }}</td>
                                <td class="border px-8 py-4">{{ $feedback->creationUser->email }}</td>
                                <td class="border px-8 py-4 text-center">
                                    @if($feedback->answered)
                                        Ответ предоставлен
                                    @else
                                        <form action="{{ route('manager.feedbacks.markAsAnswered', $feedback->id) }}" method="POST">
                                            @csrf
                                            <x-primary-button>Отметить как отвеченную</x-primary-button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
