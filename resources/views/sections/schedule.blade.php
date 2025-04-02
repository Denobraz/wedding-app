@php
    use App\Models\Guest;
    /**
     * @var Guest $guest
     */
    $items = [
        [
            'time' => '10:00',
            'title' => 'ЗАГС',
            'description' => 'Торжественная регистрация брака <br> (по желанию)',
        ],
        [
            'time' => '11:00',
            'title' => 'Cтарый город',
            'description' => 'Фоткаемся с гостями  <br> (по желанию)',
        ],
        [
            'time' => '16:00',
            'title' => 'Бережки холл',
            'description' => 'Начало церемонии',
        ],
        [
            'time' => '17:00',
            'title' => 'Ресторан "Астерия"',
            'description' => 'Свадебный банкет',
        ]
    ];
@endphp
<section id="schedule" @class([
    'bg-orange-100 pb-12 px-4 text-black relative z-10',
    'pt-20 mt-[-2.5rem]' => $guest,
    'pt-12' => $guest === null,
])>
    <h3 class="text-4xl text-center text-handwriting mb-12">Расписание</h3>
    @foreach($items as $item)
        <div class="flex items-center gap-4 mb-8 max-w-[350px] mx-auto">
            <div class="flex-shrink-0 w-16 h-16 bg-black text-white rounded-full flex justify-center items-center">
                <span class="text-1xl">{!! $item['time'] !!}</span>
            </div>
            <div class="flex flex-col">
                <div class="font-semibold">{!! $item['title'] !!}</div>
                <div class="">{!! $item['description'] !!}</div>
            </div>
        </div>
    @endforeach
</section>
