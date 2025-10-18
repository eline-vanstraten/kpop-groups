<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;
use function Pest\Laravel\delete;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $group = Group::find(1);

        $groups = Group::all();
//        dd($groups);


//        $group = new Group();
//        $group->name = 'CORTIS';
//        $group->number_of_members = 5;
//        $group->description = 'Martin, Play that beat';
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        $agencies = Agency::all();
        return view('groups.create', compact('types', 'agencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => ['required', 'string'],
            'type_id' => ['required', 'exists:types,id'],
            'agency_id' => ['required', 'exists:agencies,id'],
            'debut_date' => ['required', 'date'],
            'number_of_members' => ['required', 'integer'],
            'name_of_members' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],

        ]);

        $group = new Group();

        $group->name = $request->input('name');
        $group->type_id = $request->input('type_id');
        $group->agency_id = $request->input('agency_id');
        $group->debut_date = $request->input('debut_date');
        $group->number_of_members = $request->input('number_of_members');
        $group->name_of_members = $request->input('name_of_members');
        $group->description = $request->input('description');
        $group->image = $request->input('image');

        $group->save();

        return redirect()->route('groups.index')->with('success', 'Group added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = Group::find($id);
        return view('groups.show', compact('group'));
    }

//    public function show(Group $group)
//    {
//
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Group::find($id);
        $types = Type::all();
        $agencies = Agency::all();
        return view('groups.edit', compact('group', 'types', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'type_id' => ['required', 'exists:types,id'],
            'agency_id' => ['required', 'exists:agencies,id'],
            'debut_date' => ['required', 'date'],
            'number_of_members' => ['required', 'integer'],
            'name_of_members' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],
        ]);

        $group = Group::findOrFail($id);

        $group->name = $request->input('name');
        $group->type_id = $request->input('type_id');
        $group->agency_id = $request->input('agency_id');
        $group->debut_date = $request->input('debut_date');
        $group->number_of_members = $request->input('number_of_members');
        $group->name_of_members = $request->input('name_of_members');
        $group->description = $request->input('description');
        $group->image = $request->input('image');

        $group->save();
        return redirect()->route('groups.show', $group->id)->with('success', 'Group Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index', compact('group'))->with('success', 'Group Deleted');

    }

    //search bar
//    public function search(Request $request)
//    {
//
//        $search = $request->input('search');
//
//        $groups = Group::query()
//            ->where('name', 'LIKE', "%{$search}%")
//            ->get();
//
//        return view('groups.index', compact('groups'));
//
//    }
}

