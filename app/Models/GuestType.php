<?php

namespace App\Models;

enum GuestType: string
{
    case Person = 'person';
    case Group = 'group';

    public function name(): string
    {
        return match ($this) {
            self::Person => 'Человек',
            self::Group => 'Группа',
        };
    }

    public static function options(): array
    {
        return [
            self::Person->value => self::Person->name(),
            self::Group->value => self::Group->name(),
        ];
    }
}
