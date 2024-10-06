<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

use MoonShine\Fields\Text;
use MoonShine\Fields\Date;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Status>
 */
class StatusResource extends ModelResource
{
    protected string $model = Status::class;

    protected string $title = 'Statuslar';

    protected string $column = 'name';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nomi', 'name'),
                Date::make('Yaratilgan vaqt', 'created_at')->readonly(), // Use Date
                Date::make('Oʻzgartirilgan vaqt', 'updated_at')->readonly(), // Use Date
            ]),
        ];
    }

    /**
     * @param Status $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
