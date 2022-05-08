<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Game;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('/booking.booking')->with(['bookings' => $bookings, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function manage_booking(Request $request)
    {

        if ($request->only('delete')):
            Booking::destroy($request->only('booking_id'));
            return redirect('/bookings');
        endif;

        if ($request->only('edit')):
            $booking = DB::table('bookings')->where('id', $request->only('booking_id'))->get()->first();
            $bookings = Booking::all();
            $user = User::all();
            return view('booking.edit_booking')->with(['users' => $user, 'booking' => $booking, 'bookings' => $bookings, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
        endif;

        return redirect('/rooms')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function edit_booking(Request $request)
    {
        $name = $request->only('name');
        $company = $request->only('company');
        $email = $request->only('email');
        $phone = $request->only('phone');
        $country = $request->only('country');
        $user = $request->only('user-select');
        $room = $request->only('room-select');

        $booking = DB::table('bookings')->where('id', $request->only('id'));
        $booking->update(['name' => $name['name'], 'company' => $company['company'], 'email' => $email['email'], 'phone' => $phone['phone'], 'country' => $country['country'], 'user_id' => $user['user-select'], 'room_id' => $room['room-select']]);
        return redirect('/bookings')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }


    public function create_booking(Request $request)
    {
        $data = $request->all();

        if (isset($admin->name)):
            $booking = Booking::create([
                'name' => $data['name'],
                'company' => $data['organization'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'user_id' => $data['user-select'],
                'room_id' => $data['room-select'],
            ]);
            $booking->save();
            return redirect('/bookings');
        endif;

        $booking = Booking::create([
            'name' => $data['name'],
            'company' => $data['organization'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'user_id' => Auth::id(),
            'room_id' => $data['room-select'],
        ]);

        $booking->save();
        return redirect('/');
    }
}
