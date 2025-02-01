<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $email
 * @property string $type
 * @property array $form
 *
 * @property Collection|GuestPerson[] $persons
 */
class Guest extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::creating(function (Guest $guest) {
            $guest->uuid = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'image',
        'name',
        'display_name',
        'email',
        'type',
        'form'
    ];

    protected $casts = [
        'form' => 'array',
        'type' => GuestType::class,
    ];

    public function persons(): HasMany
    {
        return $this->hasMany(GuestPerson::class);
    }

    public function displayName(): string
    {
        return $this->display_name ?? $this->name;
    }

    public function formIsSubmitted(): bool
    {
        return !empty($this->form);
    }

    public function isAccepted(): bool
    {
        return $this->formIsSubmitted() && $this->form['accept'] === true;
    }

    public function isDeclined(): bool
    {
        return $this->formIsSubmitted() && $this->form['accept'] === false;
    }

    public function acceptedPersonsCount(): int
    {
        if ($this->isAccepted()) {
            return $this->type === GuestType::Person
                ? 1
                : count($this->form['persons']);
        }
        return 0;
    }

    public function declinedPersonsCount()
    {
        if ($this->isDeclined()) {
            return $this->type === GuestType::Person
                ? 1
                : $this->persons->count();
        }
        if ($this->isAccepted() && $this->type === GuestType::Group) {
            return $this->persons->count() - count($this->form['persons']);
        }
        return 0;
    }

    public function personsCount(): int
    {
        return $this->type === GuestType::Person
            ? 1
            : $this->persons->count();
    }

    public function submit(array $data): void
    {
        $this->form = [
            'accept' => true,
            ...$data
        ];
        $this->save();
    }

    public function decline(): void
    {
        $this->form = [
            'accept' => false
        ];
        $this->save();
    }

    public function clear(): void
    {
        $this->form = [];
        $this->save();
    }

    public function personalUrl(): string
    {
        return route('home', ['uuid' => $this->uuid]);
    }
}
