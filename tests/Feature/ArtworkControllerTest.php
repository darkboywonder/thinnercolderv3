<?php

namespace Tests\Feature;

use App\Models\Artwork;
use App\Models\Specification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtworkControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_visit_artwork_index_page()
    {
        $response = $this->get(route('artwork.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function guests_can_see_artwork_on_index_page()
    {
        $artwork = factory(Artwork::class, 20)->create(['is_visible' => true]);

        $response = $this->get(route('artwork.index'));

        $response->assertStatus(200);
        $response->assertViewHas('artwork');
        $this->assertEquals($artwork->pluck('name'), $response->data('artwork')->pluck('name'));
    }

    /** @test */
    public function artwork_on_index_page_are_order_by_most_recent()
    {
        $artwork_a = factory(Artwork::class)->create(['is_visible' => true, 'created_at' => now()->subDay()]);
        $artwork_b = factory(Artwork::class)->create(['is_visible' => true, 'created_at' => now()]);
        $artwork_c = factory(Artwork::class)->create(['is_visible' => true, 'created_at' => now()->subDays(2)]);

        $response = $this->get(route('artwork.index'));

        $response->assertStatus(200);
        $this->assertEquals(collect([
            $artwork_b->id,
            $artwork_a->id,
            $artwork_c->id,
        ]), $response->data('artwork')->pluck('id'));
    }

    /** @test */
    public function only_artwork_with_is_visible_true_are_available_on_index_page()
    {
        $artwork_a = factory(Artwork::class)->create(['is_visible' => true]);
        $artwork_b = factory(Artwork::class)->create(['is_visible' => false]);
        $artwork_c = factory(Artwork::class)->create(['is_visible' => true]);

        $response = $this->get(route('artwork.index'));
        $response_artwork_keys = $response->data('artwork')->pluck('id');

        $response->assertStatus(200);
        $this->assertContains($artwork_a->id, $response_artwork_keys);
        $this->assertContains($artwork_c->id, $response_artwork_keys);
        $this->assertNotContains($artwork_b->id, $response_artwork_keys);
    }

    /** @test */
    public function guests_can_visit_the_show_artwork_page_for_an_individual_piece()
    {
        $artwork = factory(Artwork::class)->create(['is_visible' => true]);

        $response = $this->get(route('artwork.show', ['artwork' => $artwork]));

        $response->assertStatus(200);
        $this->assertEquals($artwork->id, $response->data('artwork')->first()->id);
    }

    /** @test */
    public function specs_are_included_with_artwork_on_show_page()
    {
        $artwork = factory(Artwork::class)->create(['is_visible' => true]);
        $artwork->specifications()->save(factory(Specification::class)->make([
            'materials_id' => 2,
            'sizes_id' => 9,
            'price' => 100.00,
            'paypal' => 'ABCDE1234',
        ]));

        $response = $this->get(route('artwork.show', ['artwork' => $artwork]));

        $response->assertStatus(200);
        $spec = $response->data('artwork')->first()->specifications()->first();
        $this->assertEquals('Canvas Print', $spec->material->type);
        $this->assertEquals('12" x 24"', $spec->size->dimension);
        $this->assertEquals(100.00, $spec->price);
        $this->assertEquals('ABCDE1234', $spec->paypal);
    }
}
