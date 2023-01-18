<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumerLogRequest;
use App\Models\ConsumerLog;
use App\Models\Consumers;
use App\Models\Room;

class RoomController extends Controller
{
    public function qr(Room $room)
    {
        $room = Room::find($room->id);
        $consumers = Consumers::all();

        return view('qr', [
            'room' => $room,
            'consumers' => $consumers,
        ]);
    }

    public function store(ConsumerLogRequest $request){
        $data = $request->validated();
        ConsumerLog::create($data);
        return redirect()->back()->with('success', 'Вы успешно прошли!');
    }
}
