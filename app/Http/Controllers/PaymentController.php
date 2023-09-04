<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Paypack\Paypack;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->get();
        $payments->load('application');
        return view('register.payments', ['data' => $payments]);
    }

    public function applicantList()
    {
        $payments = Payment::latest()->where('user_id', Auth::id())->get();
        $payments->load('application');
        return view('applicant.payments', ['data' => $payments]);
    }

    public function pay(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|numeric',
                'phone' => 'required|numeric|regex:/^07\d{8}$/',
            ],
            [
                'phone.regex' => 'The phone number must start with "07" and be 10 digits long.',
            ]
        );

        $application = Application::find($request->id);
        if ($application != null) {
            $payment = Payment::where('application_id', $application->id)->first();
            $payment = Payment::find($payment->id);
            $payment->status = 'payed';
            $payment->update();
            $application->status = 'payed';
            $application->update();
            // $paypackInstance = $this->paypackConfig()->Cashin([
            //     "amount" => $fee,
            //     "phone" => $request->phone,
            // ]);
            return redirect('/applicant/payments');
        } else {
            return redirect('/applicant/payments')->withErrors('Application not found');
        }
    }

    public function paypackConfig()
    {
        $paypack = new Paypack();

        $paypack->config([
            'client_id' => env('PAYPACK_CLIENT_ID'),
            'client_secret' => env('PAYPACK_CLIENT_SECRET'),
        ]);

        return $paypack;
    }
}
