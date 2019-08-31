<?php

namespace Tests\Feature;

use App\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageReportsTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /** @test */
    public function a_guest_can_not_view_the_all_members_list()
    {
        $response = $this->get('/membership');
        $response->assertRedirect('/login');
    }


    /** @test */
    public function a_signedIn_user_can_view_the_all_members_list()
    {
        $this->signIn();
        $response = $this->get('/membership');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_can_not_view_the_current_members_list()
    {
        $response = $this->get('/membership/current');
        $response->assertRedirect('/login');
    }


    /** @test */
    public function a_signedIn_user_can_view_the_current_members_list()
    {
        $this->signIn();
        $response = $this->get('/membership/current');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_can_not_view_the_pending_members_list()
    {
        $response = $this->get('/membership/pending');
        $response->assertRedirect('/login');
    }


    /** @test */
    public function a_signedIn_user_can_view_the_pending_members_list()
    {
        $this->signIn();
        $response = $this->get('/membership/pending');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_can_not_view_the_expired_members_list()
    {
        $response = $this->get('/membership/expired');
        $response->assertRedirect('/login');
    }


    /** @test */
    public function a_signedIn_user_can_view_the_expired_members_list()
    {
        $this->signIn();
        $response = $this->get('/membership/expired');
        $response->assertStatus(200);
    }


}
