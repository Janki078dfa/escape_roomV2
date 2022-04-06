<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageReviewController extends Controller
{
    public function index()
    {
        $reviews = Reviews::all();
        return view('/reviews.review')->with(['reviews' => $reviews, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function edit_review(Request $request)
    {
        $name = $request->only('name');
        $company = $request->only('company');
        $user = $request->only('user-select');
        $room = $request->only('room-select');

        $review = DB::table('reviews')->where('id', $request->only('id'));
        $review->update(['comment' => $name['name'], 'rate' => $company['company'], 'user_id' => $user['user-select'], 'room_id' => $room['room-select']]);
        return redirect('/reviews')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function manage_review(Request $request)
    {

        if ($request->only('delete')):
            Reviews::destroy($request->only('review_id'));
            return redirect('/reviews');
        endif;

        if ($request->only('edit')):
            $review = DB::table('reviews')->where('id', $request->only('review_id'))->get()->first();
            $reviews = Reviews::all();
            $user = User::all();
            return view('reviews.edit_review')->with(['users' => $user, 'review' => $review, 'revies' => $reviews, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
        endif;

        return redirect('/rooms')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function create_review(Request $request)
    {
        $data = $request->all();

        $booking = Reviews::create([
            'comment' => $data['name'],
            'rate' => $data['rate'],
            'user_id' => $data['user-select'],
            'room_id' => $data['room-select'],
        ]);

        $booking->save();
        return redirect('/reviews');
    }
}
