<?php

namespace Tests\Unit;

use App\Channel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Get All Channels List
    */
    public function test_all_channels_list_should_be_accessible()
    {
        $response = $this->get(route('channel.all'));
        $response->assertStatus(200);
    }

    /**
     * Test Channel Validation
     */
    public function test_created_channel_should_be_validated()
    {
        $response = $this->postJson(route('channel.create'),[]);
        $response->assertStatus(422);
    }


    /**
     * Test Channel Creation
    */
    public function test_channel_can_be_created()
    {
        $response = $this->postJson(route('channel.create'),[
            'name'=> 'laravel'
        ]);
        $response->assertStatus(201);
    }


    /**
     *  Channel Update Validation
     */
    public function test_channel_update_should_be_validated()
    {
        $response = $this->json('PUT',route('channel.update'),[]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);//422
    }


    /**
     *  Channel Update
     */
    public function test_channel_update()
    {
        $channel = factory(Channel::class)->create([
            'name'=>'Laravel'
        ]);

        $response = $this->json('PUT',route('channel.update'),[
            'id'=>$channel->id,
            'name'=>'Vuejs'
        ]);

        $updatedChannel = Channel::find($channel->id);

        $response->assertStatus(Response::HTTP_OK);

        $this->assertEquals('Vuejs',$updatedChannel->name);
    }


    /**
     *  Channel Delete Validation
     */
    public function test_channel_should_be_validated()
    {
        $response = $this->json('DELETE',route('channel.delete'),[]);
        $response->assertStatus(422);
    }

    /**
     *  Channel Delete
     */
    public function test_delete_channel()
    {
        $channel =factory(Channel::class)->create();
        $response = $this->json('DELETE',route('channel.delete'),[
           'id'=> $channel->id,
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }
}
