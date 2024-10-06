<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Fields\Enum;
use MoonShine\Fields\Text;
use MoonShine\Fields\Date;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    protected string $column = 'name';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Ismi', 'name'),
                Text::make('Email', 'email'),
                Enum::make('Jinsi', 'gender')->attach(Gender::class)->sortable(),
                Text::make('Telefon raqam', 'phone')->mask("+998(99)-999-99-99"),
                Date::make('Yaratilgan vaqt', 'created_at')->readonly(), // Use Date
                Date::make('Oʻzgartirilgan vaqt', 'updated_at')->readonly(), // Use Date
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
