<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();
        $this->assertEquals('/category/'.$category->id, $category->path());
    }
}
