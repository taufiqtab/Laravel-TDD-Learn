<?php

namespace Tests\Feature;

use App\Http\Controllers\BismillahController;
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

    //Negative Test
    public function test_cuma_iseng_doang() : void {
        $response = $this->get('/ulala');
        $response->assertStatus(404);
    }

    //Unit Test Function Positive Result
    public function test_add_function(){
        $result = BismillahController::add(10,5);
        $this->assertEquals(15, $result);
    }

    //Unit Test Function Negative Result
    public function test_add_negative_function(){
        $result = BismillahController::add(10,5);
        $this->assertNotEquals(10, $result);
    }
}
