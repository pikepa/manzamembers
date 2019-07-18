<?php

namespace Tests\Feature;

use App\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageMembershipsTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    /** @test */
    public function a_guest_can_not_create_a_membership()
    {
        $response = $this->get('/membership/create');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function a_membership_can_be_added_to_the_database()
    {
        $membership = factory(Membership::class)->make();
        $membership->save();
        $this->assertDatabaseHas('Memberships', ['term' => $membership['term']]);
        $this->assertDatabaseHas('Memberships', ['surname' => $membership['surname']]);
    }
        /** @test */
    public function a_guest_can_not_view_the_membership_index()
    {
        $membership = factory(Membership::class)->create();
        $response = $this->get('/membership');
        $response->assertRedirect('/login');
    }
      /** @test */
    public function a_SignedIn_user_can_view_the_membership_index()
    {
        $this->signIn();
        $membership = factory(Membership::class)->create();
        $response = $this->get('/membership');
        $response->assertStatus(200);
    }


}