<?php

namespace App\Http\Controllers;

use App\Models\ReportVerification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ReportVerificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response((ReportVerification::with(['reportable'])->get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'county_id' => 'required|integer',
            'user_id' => 'required|integer',
            'reportable_id' => 'required|integer',
            'reportable_type' => 'required',
            'date' => 'required|date',
        ]);

        return response(ReportVerification::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param ReportVerification $verification
     * @return Response
     */
    public function show(ReportVerification $verification): Response
    {
        return response($verification::with('reportable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ReportVerification $verification
     * @return Response
     */
    public function update(Request $request, ReportVerification $verification): Response
    {
        $request->validate([
            'county_id' => 'required|integer',
            'user_id' => 'required|integer',
            'reportable_id' => 'required|integer',
            'reportable_type' => 'required',
            'date' => 'required|date',
        ]);

        return response($verification->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ReportVerification $verification
     * @return Response
     */
    public function destroy(ReportVerification $verification): Response
    {
        return response($verification->delete());
    }
}
