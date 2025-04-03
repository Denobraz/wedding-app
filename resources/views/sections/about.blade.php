@php
    $containerClasses = 'text-center';
    //$titleClasses = 'text-4xl mb-4 text-handwriting text-orange-100';
    $titleClasses = 'text-3xl font-semibold mb-4 text-orange-100';
    $textClasses = '';

    $items = [
        [
            'title' => 'Уважаемые гости!',
            'text' => 'Мы рады сообщить Вам, что 07.06.2025 года состоится самое главное торжество в нашей жизни - день нашей свадьбы!'
        ],
        [
            'title' => 'Меню',
            'text' => 'Меню разнообразно, поэтому сообщите нам заранее, есть ли у вас есть какие-либо предпочтения по еде, аллергия на продукты или диетические ограничения. <br> Далее вы сможете пройти опрос о своих вкусовых предпочтениях и напитках.'
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
            'text' => 'Пожалуйста, подтвердите свое присутствие до 20.05.2025.',
        ],
        [
            'title' => 'Дресс-Код',
            'text' => 'Будем благодарны, если при выборе нарядов на наше торжество вы придержитесь следующей палитры (нежные, светлые, бежевые или розовые тона). Только не белый :)',
            'colors' => [
                '#f4b99b',
                '#fee9d3',
                '#f5d3d9',
                '#a1a473',
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
    @if ($guest)
        <div class="mt-6">
            <x-button class="w-full flex items-center justify-center" size="lg" type="telegram" tag="a" href="https://t.me/+so5cBc4qNo8wNzY6" target="_blank">
                <svg class="mr-3" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z" fill="#FFFFFF"/>
                </svg>
                Телеграм-чат свадьбы
            </x-button>
        </div>
    @endif
</section>

