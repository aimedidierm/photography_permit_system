<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function applicantList()
    {
        $payments = Payment::latest()->where('user_id', Auth::id())->get();
        $payments->load('application');
        return view('applicant.payments', ['data' => $payments]);
    }

    public function pay(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'phone' => 'required|numeric',
        ]);

        $application = Application::find($request->id);
        if ($application != null) {
            $payment = Payment::where('application_id', $application->id)->first();
            $payment = Payment::find($payment->id);
            $payment->status = 'payed';
            $payment->update();
            $application->status = 'payed';
            $application->update();
            return redirect('/applicant/payments');
        } else {
            return redirect('/applicant/payments')->withErrors('Application not found');
        }
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
