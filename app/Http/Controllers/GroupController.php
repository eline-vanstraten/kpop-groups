<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Group;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use function Pest\Laravel\delete;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $agencyId = $request->input('agency_id');
        $typeId = $request->input('type_id');

//        $query = Group::query();
        $query = Group::where('active', true);


        if ($search !== '') {
            //% zorgt ervoor dat wanneer er tekst voor of na het woord staat het woord wel getoond wordt
            $query->where('name', 'LIKE', '%' . $search . '%');;
        }

        if (!empty($agencyId)) {
            $query->where('agency_id', $agencyId);;
        }

        if (!empty($typeId)) {
            $query->where('type_id', $typeId);;
        }


        $groups = $query->get();

        $agencies = Agency::all();
        $types = Type::all();


//        $groups = Group::all();

//        dd($groups);

        return view('groups.index', compact('groups', 'search', 'agencies', 'agencyId', 'types', 'typeId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {

        //kijkt in de session table wanneer de user_id inlogd. Dit wordt geteld door count
//        $counter = DB::table('sessions')->
//        where('user_id', Auth::id())->
//        count();

        //wanneer de user nog minder dan 3 keer ingelogd heeft blijft die op de index pagina en krijg een error.
//        if ($counter < 3) {
//            return redirect()->route('groups.index')->withErrors(['login-check' => 'You must log in at least 3 times before you can create a group.']);
//        }


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
            'image' => ['required', 'image'],

        ]);

        $group = new Group();

        $group->name = $request->input('name');
        $group->type_id = $request->input('type_id');
        $group->agency_id = $request->input('agency_id');
        $group->debut_date = $request->input('debut_date');
        $group->number_of_members = $request->input('number_of_members');
        $group->name_of_members = $request->input('name_of_members');
        $group->description = $request->input('description');


        $nameOfFile = $request->file('image')->storePublicly('folder-name', 'public');
        $group->image = $nameOfFile; //to store the link to the image in the DB

        //zet de user id op de ingelogde user
        $group->user_id = Auth::id();

        $group->save();

        return redirect()->route('groups.index')->with('success', 'Group added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

//        if (auth()->user()->isAdmin()) {
//            return view('groups.show');
//
//        };

//        $group = Group::find($id);
        $group = Group::where('id', $id)->where('active', true)->firstOrFail();

        return view('groups.show', compact('group'));
    }

//    public function show(Group $group)
//    {
//
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {

        $types = Type::all();
        $agencies = Agency::all();


        $createGroups = DB::table('groups')
            ->where('user_id', Auth::id())
            ->count();
        
        if ($createGroups < 3) {
            return redirect()->route('groups.show', compact('group'))->withErrors(['create-check' => 'You must create at least 3 groups before you can edit a group.']);

        }


        return view('groups.edit', compact('group', 'types', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'type_id' => ['required', 'exists:types,id'],
            'agency_id' => ['required', 'exists:agencies,id'],
            'debut_date' => ['required', 'date'],
            'number_of_members' => ['required', 'integer'],
            'name_of_members' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image'],
        ]);


        $group->name = $request->input('name');
        $group->type_id = $request->input('type_id');
        $group->agency_id = $request->input('agency_id');
        $group->debut_date = $request->input('debut_date');
        $group->number_of_members = $request->input('number_of_members');
        $group->name_of_members = $request->input('name_of_members');
        $group->description = $request->input('description');

        //foto verwijderd uit database als nieuwe foto word toegevoegd. Zo niet blijft oude foto bewaard
        if ($request->hasFile('image')) {
            if ($group->image && \Storage::disk('public')->exists($group->image)) {
                \Storage::disk('public')->delete($group->image);
            }

            $group['image'] = $request->file('image')->store('groups', 'public');
        }


//
//        $nameOfFile = $request->file('image')->storePublicly('folder-name', 'public');
//        $group->image = $nameOfFile; //to store the link to the image in the DB

        $group->save();
        return redirect()->route('groups.show', $group->id)->with('success', 'Group Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {

        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group Deleted');

    }

}

