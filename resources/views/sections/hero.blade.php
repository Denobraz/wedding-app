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
    @if($guest)
        <div class="flex flex-col relative justify-center items-center mb-8">
            <div class="bg-orange-100 mb-4 h-16 w-16 rounded-full overflow-hidden relative">
                @if($guest->image)
                    <img class="w-full h-full object-cover object-center" src="{{ url('storage/' . $guest->image) }}" alt="{{ $guest->displayName() }}">
                @endif
            </div>
            <div class="leading-5 text-center">
                <div class="font-semibold">{!! $guest->displayName() !!}</div>
                <div class="text-orange-100 hidden">{{ $guest->email }}</div>
            </div>
        </div>
    @endif
    <div class="flex flex-col sm:flex-row gap-4 relative justify-center">
        @if ($guest && !$guest->formIsSubmitted())
            <x-button size="lg" type="primary" tag="a" href="#form">Принять приглашение</x-button>
        @elseif ($guest && $guest->formIsSubmitted())
            <x-button size="lg" type="primary" tag="a" href="#form">Изменить решение</x-button>
        @endif
        <x-button size="lg" type="primary-outline" tag="a" href="{{ route('calendar') }}">Добавить в календарь</x-button>
    </div>
</section>
