<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventShowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;
    use WithoutMiddleware;

    public function testEventCanBeVisited(){

    	

    	$user = factory(App\User::class)->make();
    	$event = factory(App\Event::class)->create();
    	$id = $event->id;

    	//dd($event);

    	$this->actingAs($user)
    		->visit('events/999')
    		->seePageIS('events/999');
    }

    public function testEventDetailsShown(){
    	$user = factory(App\User::class)->make();
    	$event = factory(App\Event::class)->create();
    	$id = $event->id;

    	$this->actingAs($user)
    		->visit('events/999')
    		->see($event->event_title);
    }
}
