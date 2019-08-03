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

}
