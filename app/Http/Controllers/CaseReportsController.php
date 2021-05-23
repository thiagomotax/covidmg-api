<?php

namespace App\Http\Controllers;

use App\Models\CaseReport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CaseReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response((CaseReport::get()));
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
            'suspect' => 'required|integer',
            'confirmed' => 'required|integer',
            'discarded' => 'required|integer',
            'death' => 'required|integer',
            'recovered' => 'required|integer',
            'date' => 'required|date',
            'source' => 'required'
        ]);

        return response(CaseReport::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param CaseReport $caseReport
     * @return Response
     */
    public function show(CaseReport $caseReport): Response
    {
        return response($caseReport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CaseReport $caseReport
     * @return Response
     */
    public function update(Request $request, CaseReport $caseReport): Response
    {
        $request->validate([
            'county_id' => 'required|integer',
            'user_id' => 'required|integer',
            'suspect' => 'required|integer',
            'confirmed' => 'required|integer',
            'discarded' => 'required|integer',
            'death' => 'required|integer',
            'recovered' => 'required|integer',
            'date' => 'required|date',
            'source' => 'required'
        ]);

        return response($caseReport->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CaseReport $caseReport
     * @return Response
     */
    public function destroy(CaseReport $caseReport): Response
    {
        return response($caseReport->delete());
    }
}
