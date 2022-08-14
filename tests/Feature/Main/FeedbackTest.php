<?php

namespace Tests\Feature\Main;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_can_be_rendered()
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);

        $response->assertSee('Feedback');
    }

    public function test_message_can_be_send()
    {

        $data = [
            'name' => 'Maksym',
            'email' => 'maksym.kovalets@gmail.com',
            'title' => 'test',
            'message' => 'testtesttesttesttesttesttesttesttesttesttesttesttest',
        ];

        $response = $this->post(route('feedback.send'), $data);

        $response->assertRedirect(route('feedback.index'));

        $this->assertDatabaseHas('feedback', $data);
    }

    public function test_views_can_be_rendered()
    {
        $data = [
            'name' => 'Maksym',
            'email' => 'maksym.kovalets@gmail.com',
            'title' => 'test',
            'message' => 'testtesttesttesttesttesttesttesttesttesttesttesttest',
        ];

        $view = $this->view('emails.feedback', ['data' => $data]);

        $view->assertSee('Feedback');
    }
}
