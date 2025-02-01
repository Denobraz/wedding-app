@php
    $containerClasses = 'text-center';
    //$titleClasses = 'text-4xl mb-4 text-handwriting text-orange-100';
    $titleClasses = 'text-3xl font-semibold mb-4 text-orange-100';
    $textClasses = '';

    $items = [
        [
            'title' => 'Дорогие гости!',
            'text' => 'Мы рады сообщить Вам, что 07.06.2025 года состоится самое главное торжество в нашей жизни - день нашей свадьбы!'
        ],
        [
            'title' => 'Меню',
            'text' => 'Меню разнообразно, поэтому сообщите нам заранее, есть ли у вас есть какие-либо предпочтения по еде, аллергия на продукты или диетические ограничения. <br> После подтверждения вы сможете пройти опрос о своих вкусовых предпочтениях и напитках.'
        ],
        [
            'title' => 'Подарки',
            'text' => 'Ваше присутствие в день нашей свадьбы наиболее значимо для нас! <br> Однако, если вы желаете нам что-нибудь подарить, будем признательны за подарок в денежном эквиваленте :)',
        ],
        [
            'title' => 'Примечание',
            'text' => 'Будем благодарны, если вы воздержитесь активных и частых от криков "Горько" на празднике, ведь поцелуй — это искренний и сокральный знак выражения чувств.',
        ],
        [
            'title' => 'Подтверждение',
            'text' => 'Пожалуйста, подтвердите свое присутствие до 01.06.2025.',
        ],
        [
            'title' => 'Дресс-Код',
            'text' => 'Будем благодарны, если при выборе нарядов на наше торжество вы придержитесь следующей палитры (нежные, светлые, бежевые или розовые тона). Только не белый :)',
            'colors' => [
                '#f4b99b',
                '#fee9d3',
                '#f5d3d9',
                '#e3e4d0',
                '#333333'
            ]
        ],
    ];
@endphp
<section id="about" class="py-12 px-4">
    <div class="grid grid-cols-1 gap-12">
        @foreach($items as $item)
            <div @class([$containerClasses])>
                <p @class([$titleClasses])>{!! $item['title'] !!}</p>
                <p @class([$textClasses])>
                    {!! $item['text'] !!}
                </p>
                @if(isset($item['colors']))
                    <div class="flex justify-center gap-4 mt-6">
                        @foreach($item['colors'] as $color)
                            <div class="w-12 h-12 rounded-full" style="background-color: {{ $color }}"></div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    @if ($guest && !$guest->formIsSubmitted())
        <div class="mt-12">
            <x-button class="w-full" size="lg" type="primary" tag="a" href="#form">Принять приглашение</x-button>
        </div>
    @endif
</section>

