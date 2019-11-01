<?php

namespace App\Http\Controllers;
use App\Intellect;
use App\Soul;
use App\Sport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Goal;
use App\User;

class GoalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        $goals = Goal::whereDate('created_at', Carbon::today())->get();
        $isTwelveClock = $this->isTime();
        return view('goals.index')->with('goals' ,$goals)->with('isTwelveClock', $isTwelveClock);
    }


    public function isTime() {
        $isTwelveClock = '11:59:59';
        $now = Carbon::now('Asia/Bishkek')->format('G:i:s');
        return $now > $isTwelveClock;
    }


    public function userGuestDetails(User $user) {
        $sdone = $user->getSdoneCount();
        $idone = $user->getIdoneCount();
        $spdone = $user->getSpdoneCount();

        $totalGoals = $user->getTotalGoals();
        $yourPoint = $sdone + $idone + $spdone;

        return view('goals.userGuestDetails', compact('user', 'totalGoals', 'yourPoint'));
    }


    public function create()
    {
        $soul = new Soul;
        $intellect = new Intellect;
        $sport = new Sport;
        return view("goals.create", compact('soul', 'intellect', 'sport'));
    }

    public function edit(Goal $goal)
    {
        return view("goals.edit", compact('goal'));
    }


    public function store(Request $request)
    {

        $request->validate([

        ]);

        $goal =  new Goal;
        $goal->user_id = auth()->user()->id;
        $goal->description = $request->input('description');
        $goal->save();


        foreach ($request->soul_titles as $key => $value) {
            $soul = new Soul;
            $soul->goal_id = $goal->id;
            foreach ($value as $val) {
                $soul->title = $val;
            }
            $soul->save();
        }

        foreach ($request->intellect_titles as $key => $value) {
            $intellect = new Intellect;
            $intellect->goal_id = $goal->id;
            foreach ($value as $val) {
                $intellect->title = $val;
            }
            $intellect->save();
        }


        foreach ($request->sport_titles as $key => $value) {
            $sport = new Sport;
            $sport->goal_id = $goal->id;
            foreach ($value as $val) {
                $sport->title = $val;
            }
            $sport->save();
        }


//        $done = ($request->has('sdone')) ? 1 : 0;
//        $done = ($request->has('idone')) ? 1 : 0;
//        $pdone = ($request->has('spdone')) ? 1 : 0;



        return redirect(route('goals'))->with('success', 'Вы создали запись!');
    }

    public function update(Goal $goal, Request $request)
    {

        $request->validate([
            'user_id' => 'required|integer',

            'soul' => 'sometimes|max:255',
            'sdescription' => 'sometimes',
            'sdone' => 'sometimes',

            'intellect' => 'sometimes',
            'idescription' => 'sometimes',
            'idone' => 'sometimes',

            'sport' => 'sometimes',
            'spdescription' => 'sometimes',
            'spdone' => 'sometimes',
        ]);

        $sdone = ($request->has('sdone')) ? 1 : 0;
        $idone = ($request->has('idone')) ? 1 : 0;
        $spdone = ($request->has('spdone')) ? 1 : 0;


        $user_id = $request->input('user_id');


        $goal->update([
            'user_id' => $user_id,

            'soul' => $request->input('soul'),
            'sdescription' => $request->input('sdescription'),
            'sdone' => $sdone,

            'intellect' => $request->input('intellect'),
            'idescription' => $request->input('idescription'),
            'idone' => $idone,

            'sport' => $request->input('sport'),
            'spdescription' => $request->input('spdescription'),
            'spdone' => $spdone,
        ]);


        return redirect(route('goals'))->with('success', 'Вы обновили запись!');
    }
}
