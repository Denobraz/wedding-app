<section id="hero" class="px-4 py-12 relative min-h-screen flex flex-col overflow-hidden rounded-bl-3xl rounded-br-3xl">
    <div class="absolute left-0 top-0 h-full w-full">
        <div class="absolute left-0 top-0 h-full w-full bg-black opacity-40"></div>
        <img class="w-full h-full object-cover" src="{{ asset('images/hero-bg.jpg') }}" alt="Фон">
        <div class="h-[50%] bottom-0 absolute left-0 w-full bg"></div>
    </div>
    <h1 class="text-center relative mt-2 mb-3">
        <span class="text-handwriting text-orange-100 text-5xl block mb-2">Свадьба</span>
        <span class="font-semibold text-3xl">Дениса и Марии</span>
    </h1>
    <p class="text-center text-orange-100 text-lg relative">
        07.06.2025
    </p>
    <div class="mt-auto"></div>
    <div class="flex flex-col relative justify-center items-center mb-8">
        <div class="bg-orange-100 mb-4 h-16 w-16 rounded-full overflow-hidden">

        </div>
        <div class="leading-5">
            <div class="font-semibold">Денис Шевченко</div>
            <div class="text-orange-100">denobraz@mail.ru</div>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row gap-4 relative justify-center">
        <x-button size="lg" type="primary" tag="a" href="#form">Принять приглашение</x-button>
        <x-button size="lg" type="primary-outline" tag="a" href="#calendar">Добавить а календарь</x-button>
    </div>
</section>
