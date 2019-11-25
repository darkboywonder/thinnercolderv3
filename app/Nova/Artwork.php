<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Davidpiesse\NovaToggle\Toggle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Timothyasp\Color\Color;

class Artwork extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Artwork';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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
            HasMany::make('Specifications'),

            TextWithSlug::make('Name')->slug('slug'),
            Image::make('Thumbnail Image', 'image_thumb')
                ->disk('public')
                ->path('/img/artwork/_thumb')
                ->storeAs(function (Request $request) {
                    return ($request->slug ?? Str::slug($request->name)) . '.' . $request->image_thumb->extension();
                }),
            Image::make('Main Image', 'image')
                ->disk('public')
                ->path('/img/artwork')
                ->storeAs(function (Request $request) {
                    return ($request->slug ?? Str::slug($request->name)) . '.' . $request->image->extension();
                })
                ->hideFromIndex(),
            Image::make('High Resolution Image', 'image_hi_res')
                ->disk('public')
                ->path('/img/artwork/_2x')
                ->storeAs(function (Request $request) {
                    return ($request->slug ?? Str::slug($request->name)) . '.' . $request->image_hi_res->extension();
                })
                ->hideFromIndex(),
            Slug::make('Slug')->hideFromIndex(),
            ID::make()->sortable(),
            Select::make('Template')->options([
                'Custom'=> 'Custom',
                'Portrait' => 'Portrait',
                'Landscape' => 'Landscape',
                'Square' => 'Square',
            ]),
            Color::make('Color'),
            Toggle::make('Visible', 'is_visible'),
            Toggle::make('Featured', 'is_featured'),
            Toggle::make('For Sale', 'is_sellable'),
            Number::make('order'),
            Text::make('Method')->hideFromIndex(),
            Text::make('Dimensions')->hideFromIndex(),
            Text::make('Thickness')->hideFromIndex(),
            Text::make('Year')->hideFromIndex(),
            Text::make('Number of Pieces', 'canvas_number')->hideFromIndex(),
            Text::make('Location')->hideFromIndex(),

            HasMany::make('Specifications'),

            HasMany::make('Images'),
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
