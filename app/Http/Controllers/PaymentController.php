<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use App\Services\Sms;
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
        $payment = Payment::find($request->id);
        $application = Application::find($payment->application_id);
        if ($application != null) {
            $payment->status = 'payed';
            $payment->update();
            $application->status = 'payed';
            $application->update();
            $paypackInstance = $this->paypackConfig()->Cashin([
                "amount" => $payment->amount,
                "phone" => $request->phone,
            ]);
            $message = "Dear " . Auth::user()->name . " your application send, Thank you.";
            $sms = new Sms();
            $sms->recipients([Auth::user()->phone])
                ->message($message)
                ->sender(env('SMS_SENDERID'))
                ->username(env('SMS_USERNAME'))
                ->password(env('SMS_PASSWORD'))
                ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
                ->callBackUrl("");
            $sms->send();
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
