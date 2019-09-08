<?php

namespace Tests\Feature;

use App\Member;
use App\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageMembersTest extends TestCase
{
 use WithFaker,RefreshDatabase;

    /** @test */
    public function a_guest_can_not_create_a_member()
    {
        $response = $this->get('/membership/create');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function a_member_can_be_added_to_the_database()
    {
        $membership = factory(Membership::class)->create();
        $member = factory(Member::class)->make();
        $member->save();
        $this->assertDatabaseHas('Members', ['firstname' => $member['firstname']]);
        $this->assertDatabaseHas('Members', ['surname' => $member['surname']]);
    }
        /** @test */
    public function a_guest_can_not_view_the_member_index()
    {
 
        $response = $this->get('/member');
        $response->assertRedirect('/login');
    }
      /** @test */
    public function a_signedIn_user_can_view_the_membership_index()
    {
        $this->signIn();

        $membership = factory(Membership::class)->create();
        $member = factory(Member::class)->create(['membership_id'=>$membership->id]);
        $response = $this->get('/member');
        $response->assertStatus(200);
    }
      /** @test */
    public function a_signedIn_user_can_add_a_member()
    {
        $this->withoutExceptionHandling();
        
        $this->signIn();
        $response = $this->get('/member/create');
        $response->assertStatus(200);
        $response->assertSee('New Member');

    }

}
