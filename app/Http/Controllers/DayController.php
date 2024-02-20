<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{
    /**
     * Display list of groups by user
     */
    public function saveDay(Request $request)
    {

        $user = $request->user();
        $theDay = $request->input('this_day', null);

        $success = $user->day()->updateOrCreate(
            [
                'this_day' => $theDay,
            ],
            [
                'items_breakfast' => $request->input('items_breakfast', []),
                'items_lunch' => $request->input('items_lunch', []),
                'items_dinner' => $request->input('items_dinner', []),
                'items_snacks' => $request->input('items_snacks', []),
                'items_activity' => $request->input('items_activity', []),
            ]
        );

        return response()->json([
            'success' => true,
            'theDay' => $success,
        ], 200);
    }

    public function get(Request $request, $theDay)
    {
        $user = $request->user();
        //$inputs = $request->all();

        if ($theDay) {
            //$day = $user->day()->whereDate('this_day', '=',  $theDay)->get();
            $day = $user->day()
                        ->whereDate('this_day', '=', $theDay)
                        ->get();

            return response()->json([
                'success' => true,
                'input' => $theDay,
                'day' => $day,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'input' => $theDay,
                'message' => 'a day was not provided',
            ], 200);
        }
    }

    public function getWeek(Request $request, $theFirstDay)
    {
        $user = $request->user();
        //$inputs = $request->all();

        if ($theFirstDay) {
            //$day = $user->day()->whereDate('this_day', '=',  $theDay)->get();

            $theStart = strtotime($theFirstDay);
            $theEnd = $date = strtotime("+7 day", $theStart);
            $theLastDay = date('Y-m-d', $theEnd);

            $day = $user->day()
                        ->whereDate('this_day', '>=',  $theFirstDay)
                        ->whereDate('this_day', '<=',  $theLastDay)
                        ->get();

            return response()->json([
                'success' => true,
                'start' => $theFirstDay,
                'end' => $theLastDay,
                'day' => $day,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'input' => $theDay,
                'message' => 'a day was not provided',
            ], 200);
        }
    }
}
