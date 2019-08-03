<?php

namespace Tests\Unit;

use App\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MembershipTests extends TestCase
{
        use DatabaseMigrations,WithFaker;

    /** @test */
    public function it_has_a_path()
    {
        $this->withoutExceptionHandling();
        $membership = factory(Membership::class)->create();
        $this->assertEquals('/membership/'.$membership->id, $membership->path());
    }

    /** @test */
    public function it_has_a_membership_number()
    {
        $this->withoutExceptionHandling();
        $membership = factory(Membership::class)->create();
        $number=10000 + $membership->id;
        $this->assertEquals($number, $membership->memb_no);
    }

    /** @test */
    public function a_new_member_no_is_created()
    {
        $this->withoutExceptionHandling();
        $membership = factory(Membership::class)->create([
                'member_no' =>21,
            ]);
        $new= $membership->newmemberno();
        $this->assertEquals(22,$new);
    }
}
