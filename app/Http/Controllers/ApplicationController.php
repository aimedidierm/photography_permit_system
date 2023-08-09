<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function applicationForm()
    {
        $user = Auth::user();
        return view('applicant.apply', ['user' => $user]);
    }

    public function registerList()
    {
        return view('register.applications');
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
        $request->validate([
            'rwandan' => 'required|boolean',
            'document' => 'required|boolean',
            'documentNumber' => 'required|string',
            'title' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'letter' => 'required|file|mimes:png,jpg,pdf',
            'recomendation' => 'required|file|mimes:png,jpg,pdf',
            'rra' => 'required|file|mimes:png,jpg,pdf',
            'itCertificate' => 'file|mimes:png,jpg,pdf',
            'card' => 'file|mimes:png,jpg,pdf',
            'other' => 'file|mimes:png,jpg,pdf',
        ]);

        if ($request->rwandan == true) {
            $applicationAmount = 10000;
        } else {
            $applicationAmount = 50000;
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
        }
        if ($request->hasFile('card')) {
            $uniqueid = uniqid();
            $extension = $request->file('card')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('card');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $cardUrl = Storage::url($filename);
        }
        if ($request->hasFile('other')) {
            $uniqueid = uniqid();
            $extension = $request->file('other')->getClientOriginalExtension();
            $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
            $file = $request->file('other');
            Storage::disk('public')->put($filename, file_get_contents($file));
            $otherUrl = Storage::url($filename);
        }

        $application = new Application;
        $application->rwandan = $request->rwandan;
        $application->documentType = $request->document;
        $application->documentNumber = $request->documentNumber;
        $application->title = $request->title;
        $application->shootingDate = $request->date;
        $application->description = $request->description;
        $application->letter = $letterUrl;
        $application->recomendation = $recomendationUrl;
        $application->rra = $rraUrl;
        $application->ipCertificate = $itCertificateUrl;
        $application->card = $cardUrl;
        $application->other = $otherUrl;
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
}
