<?php

namespace App\Http\Controllers;

use App\Models\BedReport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BedReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response((BedReport::get()));
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
            'available' => 'required|integer',
            'busy' => 'required|integer',
            'date' => 'required|date',
        ]);

        return response(BedReport::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param BedReport $bedReport
     * @return Response
     */
    public function show(BedReport $bedReport): Response
    {
        return response($bedReport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BedReport $bedReport
     * @return Response
     */
    public function update(Request $request, BedReport $bedReport): Response
    {
        $request->validate([
            'county_id' => 'required|integer',
            'user_id' => 'required|integer',
            'available' => 'required|integer',
            'busy' => 'required|integer',
            'date' => 'required|date',
        ]);

        return response($bedReport->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BedReport $bedReport
     * @return Response
     */
    public function destroy(BedReport $bedReport): Response
    {
        return response($bedReport->delete());
    }
}
