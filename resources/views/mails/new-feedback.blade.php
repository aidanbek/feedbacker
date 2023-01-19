<?php /** @var App\Models\Feedback $feedback */ ?>

<p><b>Имя клиента:</b> {{ $feedback->creationUser->name }} </p>
<p><b>Email клиента:</b> {{ $feedback->creationUser->email }} </p>
<p><b>Тема:</b> {{ $feedback->subject }}</p>
<p><b>Сообщение:</b> {{ $feedback->message }} </p>
<p><b>Создан:</b> {{ $feedback->created_at }} </p>
