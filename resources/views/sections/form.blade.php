<section id="form" class="bg-white text-black rounded-3xl py-10 px-4 relative z-20 mt-[-2.5rem]">
    <p class="text-center text-lg font-bold mb-8">
        Пожалуйста, ответьте на вопросы, <br> которые для вас подготовили <br> Жених и Невеста
    </p>
    @if($guest && $guest->persons()->count())
        <p class="mb-8 bg-orange-100 p-4 text-black rounded-lg">
            Обратите внимание, что вы заполняете анкету за всех персон, а именно: <span class="font-semibold">{{ $guest->display_name }}</span>.
            Учтите это при ответе на вопросы.
        </p>
    @endif
    <livewire:wedding-form :guest="$guest" />
    <div class="text-danger-600"></div>
</section>
