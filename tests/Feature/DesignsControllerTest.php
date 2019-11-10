<?php

namespace Tests\Feature;

use App\Models\Design;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class DesignsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_visit_designs_index_page()
    {
        $response = $this->get(route('designs.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function guests_can_see_designs_on_index_page()
    {
        $designs = factory(Design::class, 20)->create(['is_visible' => true]);

        $response = $this->get(route('designs.index'));

        $response->assertStatus(200);
        $response->assertViewHas('designs');
        $this->assertEquals($designs->pluck('name'), $response->data('designs')->pluck('name'));
    }

    /** @test */
    public function only_design_with_is_visible_true_are_available_on_index_page()
    {
        $design_a = factory(Design::class)->create(['is_visible' => true]);
        $design_b = factory(Design::class)->create(['is_visible' => false]);
        $design_c = factory(Design::class)->create(['is_visible' => true]);

        $response = $this->get(route('designs.index'));
        $response_design_keys = $response->data('designs')->pluck('id');

        $response->assertStatus(200);
        $this->assertContains($design_a->id, $response_design_keys);
        $this->assertContains($design_c->id, $response_design_keys);
        $this->assertNotContains($design_b->id, $response_design_keys);
    }

    /** @test */
    public function design_on_index_page_are_order_by_most_recent()
    {
        $design_a = factory(Design::class)->create(['is_visible' => true, 'created_at' => now()->subDay()]);
        $design_b = factory(Design::class)->create(['is_visible' => true, 'created_at' => now()]);
        $design_c = factory(Design::class)->create(['is_visible' => true, 'created_at' => now()->subDays(2)]);

        $response = $this->get(route('designs.index'));

        $response->assertStatus(200);
        $this->assertEquals(collect([
            $design_b->id,
            $design_a->id,
            $design_c->id,
        ]), $response->data('designs')->pluck('id'));
    }

    /** @test */
    public function guests_can_visit_the_show_design_page_for_an_individual_illustration()
    {
        $design = factory(Design::class)->create(['is_visible' => true]);

        $response = $this->get(route('designs.show', ['design' => $design]));

        $response->assertStatus(200);
        $this->assertEquals($design->id, $response->data('design')->first()->id);
    }
}
