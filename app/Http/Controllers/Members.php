<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Session;

class Members extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view("members.index", compact("members"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("members.create", compact("categories"));
    }

    public function store(MemberRequest $request)
    {
        $member = new Member();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->age = $request->age;
        $member->category_id = $request->category_id;
        $member->save();

        Session::flash('success', 'Member created successfully.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $member = Member::find($id);
        $categories = Category::all();
        return view("members.edit", compact("member", "categories"));
    }

    public function update($id, MemberRequest $request)
    {
        $member = Member::find($id);
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->age = $request->age;
        $member->category_id = $request->category_id;
        $member->save();

        Session::flash('success', 'Member updated successfully.');
        return redirect()->route('members.index');
    }

    public function destroy($id)
    {
        Member::destroy($id);
        Session::flash('success', 'Member deleted successfully.');
        return redirect()->route('members.index');
    }
}
