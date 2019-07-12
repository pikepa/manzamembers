<?php

namespace Tests\Unit;

use Tests\TestCase;
use Facades\Tests\Setup\ProductFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $this->withoutExceptionHandling();
        $product = ProductFactory::create();

        $this->assertEquals('/product/'.$product->id, $product->path());
    }

    /** @test */
    public function a_product_belongs_to_an_owner()
    {
        $product = ProductFactory::create();

        $this->assertInstanceOf('App\User', $product->owner);
    }
}
