<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use DateTime;
use DateTimeZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\CalendarLinks\Link;

class Controller
{
    public function home(): View
    {
        $guest = Guest::query()->where('uuid', request()->get('uuid'))->first();
        return view('home', [
            'guest' => $guest,
        ]);
    }

    public function calendar(): RedirectResponse
    {
        $from = DateTime::createFromFormat('Y-m-d H:i', '2025-06-07 16:00', new DateTimeZone('Europe/Moscow'));
        $to = DateTime::createFromFormat('Y-m-d H:i', '2025-06-07 23:00', new DateTimeZone('Europe/Moscow'));

        $link = Link::create('Свадьба Дениса и Маши', $from, $to)
            ->address('Бережки Холл: Касимовское ш., 45а, Егорьевск, Московская обл., Россия, 140304');

        return redirect($link->google());
    }
}
