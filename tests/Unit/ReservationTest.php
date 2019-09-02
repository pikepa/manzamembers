<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    /** @test */
    public function it_requires_a_name()
    {
        $this->reservation(['name' => ''])->assertSessionHasErrors('name');
    }
    /** @test */
    public function it_requires_an_email()
    {
        $this->reservation(['email' => ''])->assertSessionHasErrors('email');
    }
    /** @test */
    public function it_requires_a_valid_email()
    {
        $this->reservation(['email' => 'pikepeter'])->assertSessionHasErrors('email');
    }
    /** @test */
    public function it_requires_a_res_qty()
    {
        $this->reservation(['res_qty' => ''])->assertSessionHasErrors('res_qty');
    }
    /** @test */
    public function it_requires_a_res_qty_greater_then_one()
    {
        $this->reservation(['res_qty' => 0])->assertSessionHasErrors('res_qty');
    }
    /** @test */
    public function it_requires_a_verification_greater_then_one()
    {
        $this->reservation(['verification' => 0])->assertSessionHasErrors('verification');
    }

    /* Setup for Repetitive Attribute Testing */
    protected function reservation($attributes =[])
    {
        $this->withExceptionHandling();
        return $this->post('/reservation',$this->validFields($attributes));
    }

    protected function validFields($overrides = [])
    {
    return array_merge([
            'event_id' => 1,
            'name' =>  'Peter Pike',
            'mobile' =>  '+601121316106',
            'email' =>  'pikepeter@safemail.com',
            'res_qty' =>  3,
            'verification' =>  5,
            ],$overrides);
    }
}
