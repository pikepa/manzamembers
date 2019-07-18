<?php

namespace Tests\Unit;

use App\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembershipTests extends TestCase
{
    use WithFaker, RefreshDatabase;

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
        $number=$membership->date_joined->year.$membership->id;
        $this->assertEquals($number, $membership->memb_no());
    }
}
