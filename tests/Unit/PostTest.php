<?php

namespace Tests\Unit;

use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function it_knows_if_it_is_scheduled()
    {
        // check if the page is scheduled to go live

        $post = Post::factory()->create();

        $this->assertFalse($post->isScheduled());

        $post->published_at = now()->addWeek();

        $this->assertTrue($post->isScheduled());

        $this->travel(8)->days();

        //hits Wormhole API
        //$this->travelTo(now()->addMonth());
        //$this->travel(-1)->month();
        //if we go 8 days from now, the post will already be published
        //so it should return false
        $this->assertFalse($post->isScheduled());

        $this->travelBack();
    }
}
