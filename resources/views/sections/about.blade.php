@php
    $containerClasses = 'text-center';
    $titleClasses = 'text-3xl font-semibold mb-4 text-orange-100';
    $textClasses = '';

    $displayName = 'Уважаемые гости!';
    if ($guest) {
        $displayName = $guest->displayName();
    }
    if ($guest && $guest->persons()->count()) {
        $displayName = 'Дорогие <br>' . $guest->displayName();
    }

    $items = [
        [
            'title' => $displayName,
            'text' => 'Мы рады сообщить Вам, что 07.06.2025 состоится самое главное торжество в нашей жизни - день нашей свадьбы!'
        ],
        [
            'title' => 'Меню',
            'text' => 'Меню разнообразно, поэтому сообщите нам заранее, если у вас есть какие-либо предпочтения по еде, аллергия на продукты или диетические ограничения. Далее вы сможете пройти опрос о своих вкусовых предпочтениях и напитках.'
        ],
        [
            'title' => 'Подарки',
            'text' => 'Самый главный подарок для нас - это ваше присутствие и позитивный настрой! Однако, если вы желаете нам что-нибудь подарить, будем признательны за подарок в денежном эквиваленте :)',
        ],
        [
            'title' => 'Примечание',
            'text' => 'Будем благодарны, если вы воздержитесь от частых криков "Горько" на празднике, ведь поцелуй — это искренний и сакральный знак выражения чувств.',
        ],
        [
            'title' => 'Подтверждение',
            'text' => 'Пожалуйста, подтвердите свое присутствие до <span class="text-red-400 font-semibold">20.05.2025</span>.',
        ],
        [
            'title' => 'Дресс-Код',
            'text' => 'Будем благодарны, если при выборе нарядов на наше торжество вы придержитесь следующей палитры (нежные, светлые, бежевые или розовые тона). Только не белый.',
            'colors' => [
                '#fee9d3',
                '#f5d3d9',
                '#a1a473',
                '#333333'
            ]
        ],
    ];
@endphp
<section id="about" class="py-12 px-4">
    @if($guest && $guest->image)
        <div class="flex flex-col relative justify-center items-center mb-0">
            <div class="bg-orange-100 mb-4 h-16 w-16 rounded-full overflow-hidden relative">
                <img class="w-full h-full object-cover object-center" src="{{ url('storage/' . $guest->image) }}" alt="{{ $guest->displayName() }}">
            </div>
        </div>
    @endif
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
</section>

