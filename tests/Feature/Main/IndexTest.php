<?php

namespace Tests\Feature\Main;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function test_home_page_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
