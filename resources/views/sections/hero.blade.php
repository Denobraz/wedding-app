@php
    use App\Models\Guest;
    /**
     * @var Guest $guest
     */
@endphp
<section id="hero" class="px-4 py-12 relative min-h-[90vh] flex flex-col overflow-hidden rounded-bl-3xl rounded-br-3xl">
    <div class="absolute left-0 top-0 h-full w-full">
        <div class="absolute left-0 top-0 h-full w-full bg-black opacity-40"></div>
        <img class="w-full h-full object-cover" src="{{ asset('images/hero-bg.jpg') }}" alt="Фон">
        <div class="h-[50%] bottom-0 absolute left-0 w-full bg"></div>
    </div>
    <h1 class="text-center relative mt-2 mb-2">
        <span class="text-handwriting text-orange-100 text-5xl block mb-2">Свадьба</span>
        <span class="font-semibold text-3xl">Дениса и Марии</span>
    </h1>
    <p class="text-center text-orange-100 text-lg relative">
        07.06.2025
    </p>
    <div class="mt-auto"></div>
    <div class="flex flex-col gap-4 relative justify-center">
        @if($guest)
            <x-button class="w-full flex items-center justify-center" size="lg" type="telegram" tag="a" href="https://t.me/+tsiXVZd24305MTFi" target="_blank">
                <svg class="mr-3" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z" fill="#FFFFFF"/>
                </svg>
                Телеграм-чат свадьбы
            </x-button>
        @endif
        <x-button size="lg" type="primary" tag="a" href="{{ route('calendar') }}">Добавить в календарь</x-button>
        @if ($guest && $guest->formIsSubmitted())
            <x-button size="lg" type="primary-outline" tag="a" href="#form">Изменить решение</x-button>
        @endif
    </div>
</section>
