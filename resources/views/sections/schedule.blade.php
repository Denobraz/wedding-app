@php
    use App\Models\Guest;
    /**
     * @var Guest $guest
     */
    $items = [
        [
            'time' => '10:00',
            'title' => 'Коломенский ЗАГС',
            'description' => 'Торжественная регистрация брака <br> (по желанию)',
        ],
        [
            'time' => '11:00',
            'title' => 'Cтарая Коломна',
            'description' => 'Катаемся и фоткаемся с гостями  <br> (по желанию)',
        ],
        [
            'time' => '15:00',
            'title' => 'Трансфер из Старой Коломны <br> в Бережки-Холл',
            'description' => ''
        ],
        [
            'time' => '16:00',
            'title' => 'Бережки-Холл, г. Егорьевск',
            'description' => 'Начало церемонии',
        ],
        [
            'time' => '17:00',
            'title' => 'Ресторан "Астерия"',
            'description' => 'Свадебный банкет',
        ],
        [
            'time' => '24:00',
            'title' => 'Трансфер обратно в Коломну',
            'description' => '',
        ],
    ];
@endphp
<section id="schedule" @class([
    'bg-orange-100 py-12 px-4 text-black relative z-10 rounded-3xl',
    'pb-20' => $guest,
])>
    <h3 class="text-4xl text-center text-handwriting mb-12">Расписание</h3>
    <div class="max-w-[350px] mx-auto relative">
        <div class="absolute left-[30px] w-1 bg-black top-[20px] h-[calc(100%-20px)] transform"></div>
        <div class="relative z-20">
            @foreach($items as $item)
                <div class="flex items-center gap-4 mb-8">
                    <div class="flex-shrink-0 w-16 h-16 bg-black text-white rounded-full flex justify-center items-center border-4 border-orange-100">
                        <span class="text-1xl">{!! $item['time'] !!}</span>
                    </div>
                    <div class="flex flex-col">
                        <div class="font-semibold">{!! $item['title'] !!}</div>
                        <div class="">{!! $item['description'] !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
