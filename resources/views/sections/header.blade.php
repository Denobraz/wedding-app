@if($guest && $guest->isAccepted())
    <header class="p-4 text-white bg-green-400 text-center font-semibold">
        <p>Спасибо, что приняли приглашение!</p>
    </header>
@endif
@if($guest && $guest->isDeclined())
    <header class="p-4 text-white bg-red-500 text-center font-semibold">
        <p>Вы отказались от приглашения :(</p>
    </header>
@endif
