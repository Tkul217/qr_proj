<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\FilterRequest;
use App\Models\ConsumerLog;
use App\Models\Room;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(FilterRequest $request)
    {
        if (isset($request->date_from) && isset($request->date_to)) {
            $date_from = Carbon::parse($request->date_from)->startOfDay();
            $date_to = Carbon::parse($request->date_to)->endOfDay();
            $consumers = ConsumerLog::whereBetween('created_at', [$date_from, $date_to])->paginate(20);
        } else {
            $consumers = ConsumerLog::query()
                ->paginate(20);
        }

        return view('reports.report-company', [
            'consumers' => $consumers
        ]);
    }

    public function createRoom()
    {
        $rooms = Room::all();
        return view('create-room', [
            'rooms' => $rooms,
        ]);
    }

    public function storeRoom(CreateRoomRequest $request)
    {
        $data = $request->validated();
        Room::create($data);
        return redirect()->route('dashboard.create-room')->with('success', 'Комната успешно создана!');
    }
}
