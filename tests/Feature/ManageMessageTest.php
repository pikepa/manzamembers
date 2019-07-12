<?php

namespace Tests\Feature;

use App\Message;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageMessageTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_guest_can_create_a_message()
    {
        $response = $this->get('/message/create');
        $response->assertStatus(200);
        $response->assertSee('New Message');
    }

    /** @test */
    public function a_message_is_added_to_the_database()
    {
        $message = factory(Message::class)->create();

        $this->assertDatabaseHas('messages', ['subject' => $message->subject]);
    }

    /** @test */
    public function a_guest_can_not_view_the_message_index()
    {
        $message = factory(Message::class)->create();
        $response = $this->get('/message');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function a_signed_in_user_can_view_messages()
    {
        $this->signIn();
        $message = factory(Message::class)->create();
        $response = $this->get('/message');
        $response->assertStatus(200);
    }
}
