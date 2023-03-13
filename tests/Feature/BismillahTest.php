<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BismillahTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_see_all_articles(): void
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSee('Judul Blog');
        $response->assertViewIs('articles.index');
    }
}
