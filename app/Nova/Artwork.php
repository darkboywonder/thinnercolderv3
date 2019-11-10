<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Davidpiesse\NovaToggle\Toggle;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
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
            ID::make()->sortable(),
            TextWithSlug::make('Name')->slug('slug'),
            Slug::make('Slug'),
            Color::make('Color'),
            Toggle::make('Visible', 'is_visible'),
            Toggle::make('Featured', 'is_featured'),
            Toggle::make('For Sale', 'is_sellable'),
            Text::make('Method'),
            Text::make('Dimensions'),
            Text::make('Thickness'),
            Text::make('Year'),
            Text::make('Canvas Number'),
            Text::make('Location'),
            Select::make('Template')->options([
                'Custom'=> 'Custom',
                'Portrait' => 'Portrait',
                'Landscape' => 'Landscape',
                'Square' => 'Square',
            ]),
            Image::make('Main Image', 'image'),
            Image::make('Thumbnail Image', 'image_thumb'),
            Image::make('High Resolution Image', 'image_hi_res'),
            Textarea::make('Credit')->rows(3),
            Number::make('order'),
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
