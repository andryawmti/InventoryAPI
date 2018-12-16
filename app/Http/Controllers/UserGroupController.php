<?php

namespace App\Http\Controllers;

use App\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userGroup = UserGroup::all();
        return view('manage.user_group.user_group', ['user_group' => $userGroup]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        UserGroup::create(
            request()->validate([
                'name' => ['required', 'min:3'],
            ])
        );

        return redirect()->route('user_group');
    }

    /**
     * Display the specified resource.
     *
     * @param UserGroup $userGroup
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $userGroup)
    {
        return view('manage.user_group.user_group_edit', ['user_group' => $userGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserGroup $userGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(UserGroup $userGroup)
    {
        return view('manage.user_group.user_group_edit', ['user_group' => $userGroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserGroup $userGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UserGroup $userGroup)
    {
        $userGroup->update(
            request()->validate([
                'name' => ['required', 'min:3']
            ])
        );

        return redirect()->route('user-group.show', ['id' => $userGroup->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserGroup $userGroup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(UserGroup $userGroup)
    {
        $userGroup->delete();
        return redirect()->route('user-group.index');
    }
}
