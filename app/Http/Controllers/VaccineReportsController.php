<?php

namespace App\Http\Controllers;

use App\Models\VaccineReport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VaccineReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response((VaccineReport::get()));
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
            'first_dose' => 'required|integer',
            'second_dose' => 'required|integer',
            'date' => 'required|date',
        ]);

        return response(VaccineReport::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param VaccineReport $vaccineReport
     * @return Response
     */
    public function show(VaccineReport $vaccineReport): Response
    {
        return response($vaccineReport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param VaccineReport $vaccineReport
     * @return Response
     */
    public function update(Request $request, VaccineReport $vaccineReport): Response
    {
        $request->validate([
            'county_id' => 'required|integer',
            'user_id' => 'required|integer',
            'first_dose' => 'required|integer',
            'second_dose' => 'required|integer',
            'date' => 'required|date',
        ]);

        return response($vaccineReport->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param VaccineReport $vaccineReport
     * @return Response
     */
    public function destroy(VaccineReport $vaccineReport): Response
    {
        return response($vaccineReport->delete());
    }
}
