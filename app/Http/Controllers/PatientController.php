<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Http\Resources\Patient as PatientResource;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  PatientCreateRequest  $request
     * @return PatientResource
     */
    public function store(PatientCreateRequest $request)
    {
        $patient = Patient::forceCreate($request->validated());

        return new PatientResource($patient);
    }
}