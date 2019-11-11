<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Davidpiesse\NovaToggle\Toggle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Timothyasp\Color\Color;

class Design extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Design';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            TextWithSlug::make('Name')->slug('slug'),
            Image::make('Thumbnail Image', 'image_thumb')
                ->disk('public')
                ->path('/img/design/_thumb')
                ->storeAs(function (Request $request) {
                    return ($request->slug ?? Str::slug($request->name)) . '.' . $request->image_thumb->extension();
                }),
            Image::make('Image')
                ->disk('public')
                ->path('/img/design')
                ->storeAs(function (Request $request) {
                    return ($request->slug ?? Str::slug($request->name)) . '.' . $request->image->extension();
                })
                ->hideFromIndex(),
            Slug::make('Slug')->hideFromIndex(),
            ID::make()->sortable(),
            Select::make('Template')->options([
                'Portrait' => 'Portrait',
                'Landscape' => 'Landscape',
                'Square' => 'Square',
            ]),
            Color::make('Color'),
            Toggle::make('Visible', 'is_visible'),
            Toggle::make('Featured', 'is_featured'),
            Number::make('order'),
            Text::make('Client')->hideFromIndex(),
            Text::make('Type')->hideFromIndex(),
            Text::make('Category')->hideFromIndex(),
            Textarea::make('Credit')->rows(3)->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
