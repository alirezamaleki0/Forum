<?php

namespace App\Http\Controllers\API\v1\Channel;

use App\Channel;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ChannelController extends Controller
{

    public function getAllChannelsList(){
        return response()->json(resolve(ChannelRepository::class)->all(),
            Response::HTTP_OK);
    }

    /**
     * Create New Channel
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNewChannel(Request $request)
    {
        $request->validate([
            'name'=>['required'],
        ]);

        //Insert Channel To Database
        resolve(ChannelRepository::class)->create($request);

        return response()->json([
            'message'=>'channel created successfully',
        ],201);
    }


    /**
     * Update Channel
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateChannel(Request $request)
    {
        $request->validate([
            'name'=> ['required'],
        ]);

        //Update Channel In Database
        resolve(ChannelRepository::class)->update($request->name, $request->id);


        return response()->json([
            'message'=>'Channel Edited Successfully',
        ],Response::HTTP_OK);
    }


    /**
     * Delete Channel(s)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteChannel(Request $request)
    {
        $request->validate([
            'id'=>['required'],
        ]);

        resolve(ChannelRepository::class)->delete($request);

        return \response()->json([
            'message'=> 'Channel Deleted Successfully',
        ]);
    }
}
