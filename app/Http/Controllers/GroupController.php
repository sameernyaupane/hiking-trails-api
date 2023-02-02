<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('members')->get();

        foreach($groups as $group) {
            $group->joined = false;

            foreach($group->members as $member) {
                $member->name = User::find($member->user_id)->name;
                if($member->user_id == auth()->user()->id) {
                    $group->joined = true;
                }
            }
        }

        return $groups;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'thumbnail'   => 'nullable|string',
            'description' => 'required|string',
        ]);

        return Group::create([
            'name'        => $request->name,
            'thumbnail'   => $request->thumbnail,
            'description' => $request->description,
            'user_id'     => auth()->user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string',
            'thumbnail'   => 'string',
            'description' => 'required|string',
        ]);
        
        return Group::where('id', $id)
        ->update([
            'name'        => $request->name,
            'thumbnail'   => $request->thumbnail,
            'description' => $request->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Group::destroy($id);
    }

    public function join(Request $request, $id)
    {
        $groupJoined = GroupUser::where(['group_id' => $id, 'user_id' => auth()->user()->id])->first();

        if(!$groupJoined) {
            GroupUser::create([
                'group_id' => $id,
                'user_id'  => auth()->user()->id,
            ]);
        }

        return response()->json('Group joined.');
    }

    public function leave(Request $request, $id)
    {
        $groupJoined = GroupUser::where(['group_id' => $id, 'user_id' => auth()->user()->id])->first();

        if($groupJoined) {
            $groupJoined->delete();
        }

        return response()->json('Group left.');
    }
}
