<?php

namespace App\Http\Controllers;

use App\Models\CalendarDaysDisabled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CalendarDaysDisabledController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendarDaysDisabled $calendarDaysDisabled)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarDaysDisabled $calendarDaysDisabled)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalendarDaysDisabled $calendarDaysDisabled)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarDaysDisabled $calendarDaysDisabled)
    {
        //
    }

    /**
     * Get Obtiene dias disabled de un calendario
     */
    public function getCalendarDaysDisabled($idCalendar)
    {
        $data = array('status' => 'success','messagge' => '', 'data' => array());
        try {
            $daysDisabled = CalendarDaysDisabled::where('calendar_id', $idCalendar)->get();
            $routes = DB::select("SELECT * FROM routes AS r
                        INNER JOIN route_data AS rd ON rd.route_id = r.id
                        INNER JOIN calendars AS c ON rd.calendar_id = c.id
                        WHERE c.id = $idCalendar");
            $data['data'] = $daysDisabled;
        } catch (\Throwable $th) {
            $data['status'] = 'error';
            $data['messagge'] = 'Lo sentimos no pudo ser cargada la data';
        }
        return Response::json($data, 200);
    }
}
