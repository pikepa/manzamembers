<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProductTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function a_product_can_be_added()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $response = $this->post('/product', $this->data());
        $product = Product::first();
        $response->assertRedirect($product->path());
        $this->assertCount(1, Product::all());
    }

    /** @test */
    public function a_product_can_be_updated()
    {
        $this->signIn();
        $this->post('/product', $this->data());

        $product = Product::first();

        $response = $this->patch($product->path(), [
            'title' => 'Changed Title',
            'description' => 'New Description',
            'status'=>'For Sale',
            'price' => '10000',
            'discount' => '0',
            'publish_at'=>'2019-07-02',
            'owner_id'=>Auth::id(),
        ]);
        $this->assertEquals('Changed Title', Product::first()->title);
        $this->assertEquals(1, Product::first()->id);
        $response->assertRedirect($product->fresh()->path());
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->post('/product', $this->data());
        $product = Product::first();

        $this->assertCount(1, Product::all());
        $response = $this->delete($product->path());
        $this->assertCount(0, Product::all());
        $response->assertRedirect('/');
    }

    private function data()
    {
        return [
            'title' => 'Cool Book Title',
            'description' => 'Victors Ferfy',
            'status'=>'For Sale',
            'price' => '10000',
            'discount' => '0',
            'publish_at'=>'2019-07-02',
            'owner_id'=>Auth::id(),
        ];
    }
}
