<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use App\Services\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::latest()->where('user_id', Auth::id())->get();
        $applications->load('user');
        return view('applicant.applications', ['data' => $applications]);
    }

    public function rejected()
    {
        $applications = Application::latest()->where('status', 'rejected')->get();
        $applications->load('user');
        return view('register.rejected', ['data' => $applications]);
    }

    public function pending()
    {
        $applications = Application::latest()->where('status', 'pending')->get();
        $applications->load('user');
        return view('register.pending', ['data' => $applications]);
    }

    public function rejectView()
    {
        return view('register.comment');
    }

    public function reject(Request $request, Application $application)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        if ($application) {
            $application->load('user');
            $application->status = 'rejected';
            $application->rejectionComment = $request->message;
            $application->update();
            $message = "Dear " . $application->user->name . " your application had been rejected because " . $request->message . " , Thank you.";
            $sms = new Sms();
            $sms->recipients([$application->user->phone])
                ->message($message)
                ->sender(env('SMS_SENDERID'))
                ->username(env('SMS_USERNAME'))
                ->password(env('SMS_PASSWORD'))
                ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
                ->callBackUrl("");
            $sms->send();
            return redirect('/register/applications');
        } else {
            return back()->withErrors('Application not found');
        }
    }

    public function approve(Application $application)
    {
        if ($application) {
            $application->load('user');
            $application->status = 'approved';
            $application->update();
            $message = "Dear " . $application->user->name . " your application had been approved, Thank you.";
            $sms = new Sms();
            $sms->recipients([$application->user->phone])
                ->message($message)
                ->sender(env('SMS_SENDERID'))
                ->username(env('SMS_USERNAME'))
                ->password(env('SMS_PASSWORD'))
                ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
                ->callBackUrl("");
            $sms->send();
            return redirect('/register/applications');
        } else {
            return back()->withErrors('Application not found');
        }
    }

    public function applicationForm()
    {
        $user = Auth::user();
        return view('applicant.apply', ['user' => $user]);
    }

    public function registerList()
    {
        $applications = Application::latest()->get();
        $applications->load('user');
        return view('register.applications', ['data' => $applications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        $application->load('user');
        if ($application != null) {
            return view('register.details', ['data' => $application]);
        } else {
            return back()->withErrors('Application not found!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rwandan' => 'required|boolean',
            'document' => 'required|string',
            'documentNumber' => 'required|string',
            'placeIssue' => 'required|string',
            'dateIssue' => 'required|date',
            // 'dateExpiry' => 'sometimes|date',
            'profession' => 'required|string',
            'title' => 'required|string',
            'genre' => 'required|string',
            'shootingDateStart' => 'required|date',
            'shootingDateEnd' => 'required|date',
            'stayDuration' => 'sometimes|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'letter' => 'required|file|mimes:png,jpg,pdf',
            'recomendation' => 'required|file|mimes:png,jpg,pdf',
            'identification' => 'required|file|mimes:png,jpg,pdf',
            'CV' => 'required|file|mimes:png,jpg,pdf',
            'synopsis' => 'required|file|mimes:png,jpg,pdf',
            'itCertificate' => 'file|mimes:png,jpg,pdf',
            'card' => 'file|mimes:png,jpg,pdf',
            'other' => 'file|mimes:png,jpg,pdf',
            'rra' => 'required|file|mimes:png,jpg,pdf',
        ]);

        if ($request->rwandan == true) {
            $applicationAmount = 100;
        } else {
            $applicationAmount = 500;
        }
        $uniqueid = uniqid();
        $extension = $request->file('letter')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
        $file = $request->file('letter');
        Storage::disk('public')->put($filename, file_get_contents($file));
        $letterUrl = Storage::url($filename);

        $uniqueid = uniqid();
        $extension = $request->file('recomendation')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
        $file = $request->file('recomendation');
        Storage::disk('public')->put($filename, file_get_contents($file));
        $recomendationUrl = Storage::url($filename);

        $uniqueid = uniqid();
        $extension = $request->file('rra')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
        $file = $request->file('rra');
        Storage::disk('public')->put($filename, file_get_contents($file));
        $rraUrl = Storage::url($filename);

        if ($request->hasFile('itCertificate')) {
            $uniqueid = uniqid();
            $extension = $request->file('itCertificate')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('itCertificate');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $itCertificateUrl = Storage::url($filename);
        } else {
            $itCertificateUrl = null;
        }
        if ($request->hasFile('card')) {
            $uniqueid = uniqid();
            $extension = $request->file('card')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('card');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $cardUrl = Storage::url($filename);
        } else {
            $cardUrl = null;
        }
        if ($request->hasFile('other')) {
            $uniqueid = uniqid();
            $extension = $request->file('other')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('other');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $otherUrl = Storage::url($filename);
        } else {
            $otherUrl = null;
        }
        if ($request->hasFile('identification')) {
            $uniqueid = uniqid();
            $extension = $request->file('identification')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('identification');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $identificationUrl = Storage::url($filename);
        } else {
            $identificationUrl = null;
        }
        if ($request->hasFile('CV')) {
            $uniqueid = uniqid();
            $extension = $request->file('CV')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('CV');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $CVUrl = Storage::url($filename);
        } else {
            $CVUrl = null;
        }
        if ($request->hasFile('synopsis')) {
            $uniqueid = uniqid();
            $extension = $request->file('synopsis')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('synopsis');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $synopsisUrl = Storage::url($filename);
        } else {
            $synopsisUrl = null;
        }

        $application = new Application;

        $application->placeIssue = $request->placeIssue;
        $application->dateIssue = $request->dateIssue;
        $application->dateExpiry = $request->dateExpiry;
        $application->profession = $request->profession;
        $application->genre = $request->genre;
        $application->shootingDateStart = $request->shootingDateStart;
        $application->shootingDateEnd = $request->shootingDateEnd;
        $application->stayDuration = $request->stayDuration;
        $application->location = $request->location;
        $application->rwandan = $request->rwandan;
        $application->documentType = $request->document;
        $application->documentNumber = $request->documentNumber;
        $application->title = $request->title;
        $application->description = $request->description;
        $application->letter = $letterUrl;
        $application->recomendation = $recomendationUrl;
        $application->rra = $rraUrl;
        $application->ipCertificate = $itCertificateUrl;
        $application->card = $cardUrl;
        $application->other = $otherUrl;
        $application->identification = $identificationUrl;
        $application->CV = $CVUrl;
        $application->synopsis = $synopsisUrl;
        $application->user_id = Auth::id();
        $application->created_at = now();
        $application->updated_at = null;
        $application->save();
        $payment = new Payment;
        $payment->amount = $applicationAmount;
        $payment->user_id = Auth::id();
        $payment->application_id = $application->id;
        $payment->created_at = now();
        $payment->updated_at = null;
        $payment->save();
        return redirect('/applicant/payments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $application->load('user');
        if ($application != null) {
            if ($application->user_id == Auth::id()) {
                return view('applicant.details', ['data' => $application, 'user' => Auth::user()]);
            } else {
                return back()->withErrors('You are not allowed to access the following application');
            }
        } else {
            return back()->withErrors('Application not found!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
    public function report()
    {
        $total = Payment::where('status', 'payed')->sum('amount');
        $applications = Application::latest()->get();
        $applications->load('user', 'payment');
        $pdf = Pdf::loadView('report', ['data' => $applications, 'total' => $total]);
        return $pdf->download('report.pdf');
    }
}
