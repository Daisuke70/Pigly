<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightTargetRequest;
use App\Http\Requests\WeightStoreRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    public function store(WeightStoreRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->withErrors('もう一度ログインしてください');
        }

        WeightLog::create([
            'user_id' => $user->id,
            'weight' => $request->weight,
            'date' => now()->toDateString(),
            'calories' => 0,
            'exercise_time' => 0,
            'exercise_content' => '',
        ]);

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        return redirect('/weight_logs');
    }

    public function index()
    {
        return view('weight_logs');
    }

}
