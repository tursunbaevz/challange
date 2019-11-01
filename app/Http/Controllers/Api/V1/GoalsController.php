<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goal;
use App\User;
use App\Intellect;
use App\Soul;
use App\Sport;
use Carbon\Carbon;

class GoalsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function main() {
        return view('goals.index');
    }

    public function index() {
       $goals =  Goal::with('souls', 'intellects', 'sports', 'user')->whereDate('created_at', Carbon::today())->get();
       return $goals;

    }

    public function show($id)
    {
        $goal = Goal::findOrFail($id);
        return $goal->with('souls', 'intellects', 'sports', 'user')->where('id', $id)->get();
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



        return response( 'Вы создали запись!');
    }

    public function update(Request $request, Goal $goal)
    {



        $request->validate([

        ]);

        $goalWR = $goal->with('souls', 'intellects', 'sports', 'user')->where('id', $goal->id)->first();

//        dd($request->soul_titles);


        $goal->user_id = auth()->user()->id;
        $goal->description = $request->input('description');
        $goal->save();


        foreach ($goalWR->souls as $soul) {
            foreach ($request->soul_titles as $value) {
                foreach ($value as $val) {
                    $soul->update([
                        'title' => $val,
                        'goal_id' => $goal->id,
                        'id' => $soul->id,
                    ]);
                }
            }
        }


//        foreach ($request->intellect_titles as $key => $value) {
//            $intellect = new Intellect;
//            $intellect->goal_id = $goal->id;
//            foreach ($value as $val) {
//                $intellect->title = $val;
//            }
//            $intellect->save();
//        }
//
//
//        foreach ($request->sport_titles as $key => $value) {
//            $sport = new Sport;
//            $sport->goal_id = $goal->id;
//            foreach ($value as $val) {
//                $sport->title = $val;
//            }
//            $sport->save();
//        }


//        $done = ($request->has('sdone')) ? 1 : 0;
//        $done = ($request->has('idone')) ? 1 : 0;
//        $pdone = ($request->has('spdone')) ? 1 : 0;



        return response( 'Вы обновили запись!');
    }

}
