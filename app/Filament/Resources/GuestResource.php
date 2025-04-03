<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Filament\Resources\GuestResource\RelationManagers;
use App\Filament\Widgets\GuestCounts;
use App\Models\Guest;
use App\Models\GuestType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $pluralLabel = 'Гости';

    protected static ?string $navigationLabel = 'Гости';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Основная информация')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Имя')
                                ->required(),
                            Forms\Components\TextInput::make('display_name')
                                ->label('Отображаемое имя')
                                ->hint('Это имя будет отображаться для пользователя'),
                            Forms\Components\TextInput::make('email')
                                ->label('Email'),
                            Forms\Components\Select::make('type')
                                ->label('Тип')
                                ->options(GuestType::options())
                                ->live()
                                ->required(),
                            Forms\Components\Repeater::make('persons')
                                ->label('Персоны')
                                ->relationship('persons')
                                ->addActionLabel('Добавить персону')
                                ->minItems(1)
                                ->simple(Forms\Components\TextInput::make('name')->label('Имя'))
                                ->visible(fn (Get $get): bool => $get('type') == GuestType::Group->value),

                        ]),
                    Forms\Components\Section::make('Форма')
                        ->visibleOn(['edit'])
                        ->schema([
                        Forms\Components\KeyValue::make('form')->label(false)->disabled()
                    ])->headerActions([
                        Forms\Components\Actions\Action::make('clear')
                            ->label('Очистить')
                            ->action(function (Guest $record) {
                                $record->clear();
                            })
                            ->requiresConfirmation()
                            ->button()
                    ])
                ])->columnSpan(2),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('')->schema([
                        Forms\Components\TextInput::make('uuid')
                            ->label('UUID')
                            ->readOnly(),
                    ])->visibleOn(['edit']),
                    Forms\Components\Section::make('')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->disk('public')
                            ->directory('guests')
                            ->image()
                            ->label('Фото'),
                    ]),
                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label(false)
                    ->height(50)
                    ->width(50)
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Имя')
                    ->description(fn (Guest $record) => $record->display_name),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('display_name')
                    ->label('Статус')
                    ->icon(function (Guest $record) {
                        if ($record->isAccepted()) {
                            return 'heroicon-s-check-circle';
                        } elseif ($record->isDeclined()) {
                            return 'heroicon-s-x-circle';
                        }
                        return 'heroicon-s-question-mark-circle';
                    })
                    ->iconColor(function (Guest $record) {
                        if ($record->isAccepted()) {
                            return 'success';
                        } elseif ($record->isDeclined()) {
                            return 'danger';
                        }
                        return 'warning';
                    })
                    ->formatStateUsing(function (Guest $record) {
                        return $record->acceptedPersonsCount() . ' / ' . $record->personsCount();
                    })
                    ->visible(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->formatStateUsing(function (Guest $record) {
                        return $record->type->name();
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
