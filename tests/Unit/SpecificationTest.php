<?php

namespace Tests\Unit;

use App\Models\Artwork;
use App\Models\Specification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpecificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function has_a_relationship_to_a_material()
    {
        factory(Specification::class)->create([
            'artwork_id' => function () {
                return factory(Artwork::class)->create()->id;
            },
            'materials_id' => 2,
            'sizes_id' => 9,
            'price' => 100.00,
            'paypal' => 'ABCDE1234',
        ]);

        $spec = Specification::with('material')->first();

        $this->assertEquals('Canvas Print', $spec->material->type);
        $this->assertEquals(20, $spec->material->order);
    }

    /** @test */
    public function has_a_relationship_to_a_size()
    {
        factory(Specification::class)->create([
            'artwork_id' => function () {
                return factory(Artwork::class)->create()->id;
            },
            'materials_id' => 2,
            'sizes_id' => 9,
            'price' => 100.00,
            'paypal' => 'ABCDE1234',
        ]);

        $spec = Specification::with('size')->first();
        $this->assertEquals('12" x 24"', $spec->size->dimension);
        $this->assertEquals(90, $spec->size->order);
    }

    /** @test */
    public function has_a_relationship_to_an_artwork_piece()
    {
        $artwork = factory(Artwork::class)->create();
        factory(Specification::class)->create([
            'artwork_id' => $artwork->id,
            'materials_id' => 2,
            'sizes_id' => 9,
            'price' => 100.00,
            'paypal' => 'ABCDE1234',
        ]);

        $spec = Specification::with('artwork')->first();

        $this->assertEquals($artwork->fresh(), $spec->artwork);
    }
}
