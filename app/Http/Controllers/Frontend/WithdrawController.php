<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Withdraw;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function index() : View
    {
        $orderItems = OrderItem::whereHas('course', function($query) {
            $query->where('instructor_id', user()->id);
        })->take(10)->get();   
        return view('frontend.instructor-dashboard.withdraw.index', compact('orderItems'));
    }

    function requestPayoutIndex() : View
    {
        $currentBallance = user()->wallet;
        $pendingBallance = Withdraw::where('instructor_id', user()->id)->where('status', 'pending')->sum('amount');
        $totalPayout = Withdraw::where('instructor_id', user()->id)->where('status', 'approved')->sum('amount');
        return view('frontend.instructor-dashboard.withdraw.request-payout', compact('currentBallance', 'pendingBallance', 'totalPayout'));
    }

    function requestPayout(Request $request) : RedirectResponse
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        if(user()->wallet < $request->amount) {
            notyf()->error("Insufficient Balance!");
            return redirect()->back();
        }

        if(Withdraw::where('instructor_id', user()->id)->where('status', 'pending')->exists()) {
            notyf()->error("Withdraw Request Already Pending!");
            return redirect()->back();
        }

        $withdraw = new Withdraw();
        $withdraw->instructor_id = user()->id;
        $withdraw->amount = $request->amount;
        $withdraw->save();
        notyf()->success("Withdraw Request Sent!");
        return redirect()->back();
    }
}
