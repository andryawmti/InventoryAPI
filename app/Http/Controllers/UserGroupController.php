<?php

namespace App\Http\Controllers;

use App\Classes\MyHttpResponse;
use App\UserGroup;

class UserGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web', 'can:isAdmin']);
    }

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
    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3'],
        ]);

        try {
            UserGroup::create(request()->post());
            return MyHttpResponse::storeResponse(true, 'User Group Successfully Created', 'user-group.index');
        } catch (\Exception $e) {
            return MyHttpResponse::storeResponse(false, $e->getMessage(), 'user-group.index');
        }
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
        request()->validate([
            'name' => ['required', 'min:3']
        ]);

        try {
            $userGroup->update(request()->post());
            return MyHttpResponse::updateResponse(true, 'User Group Successfully Updated', 'user-group.show', $userGroup->id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'user-group.show', $userGroup->id);
        }
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
        try {
            $userGroup->delete();
            return MyHttpResponse::deleteResponse(true, 'User Group Successfully Deleted', 'user-group.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'user-group.index');
        }
    }
}
