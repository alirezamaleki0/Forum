<?php


namespace App\Repositories;


use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelRepository
{


    /**
     * Get All Channels
     */
    public function all()
    {
       return Channel::all();
    }


    /**
     * Create New Channel
     * @param Request $request
     */
    public function create(Request $request): void
    {
        Channel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }


    /**
     * Update Channel Name
     * @param $name
     */
    public function update($name, $id): void
    {
        Channel::find($id)->update([
            'name' => $name,
            'slug'=> Str::slug($name),
        ]);

    }

    public function delete(Request $request):void
    {
        Channel::destroy($request->id);
    }

}
