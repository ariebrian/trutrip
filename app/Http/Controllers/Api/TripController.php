<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use DateTime;
use Illuminate\Http\Request;
use stdClass;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TripController extends Controller
{
    //
    public function index() {
        $trips = Trip::all();
        $result = [];
        foreach ($trips as $trip) {
            // dd($trip);
            $tripSchedule = new stdClass();
            $tripSchedule->start_date = $trip->start_date;
            $tripSchedule->end_date = $trip->end_date;
            $trip->schedule = $tripSchedule;
            
            array_push($result, $trip);
        };

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
            ],
            'data' => [
                'trips' => $result,
            ],
        ]);
    }

    function show($id) {
        $trip = Trip::findOrfail($id);

        return $trip;
    }

    public function store(Request $request) {
        try {
            $trip = Trip::create([
                'title' => $request['title'],
                'origin' => $request['origin'],
                'destination' => $request['destination'],
                'start_date' => new DateTime($request['start_date']),
                'end_date' => new DateTime($request['end_date']),
                'type_of_trip' => $request['type_of_trip'],
                'description' => $request['description'],
            ]);
            return $trip;
        } catch (\Exception $exception) {
            throw new HttpException(400, $exception->getMessage());
        }
    }

    public function update(Request $request, $id) {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $trip = Trip::find($id);
            $trip->title = $request->title;
            $trip->origin = $request->origin;
            $trip->destination = $request->destination;
            $trip->start_date = new DateTime($request->start_date);
            $trip->end_date = new DateTime($request->end_date);
            $trip->type_of_trip = $request->type_of_trip;
            $trip->description = $request->description;
            $trip->save();
 
            return $trip;
 
         } catch(\Exception $exception) {
            throw new HttpException(400, $exception->getMessage());
         }
    }

    public function delete($id) {
        $trip = Trip::findOrfail($id);
        $trip->delete();

        return response()->json(null, 204);
    }
}
