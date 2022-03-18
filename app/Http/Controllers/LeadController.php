<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request)
    {
        $validated = $request->validated();

        $lead = Lead::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return new LeadResource($lead);
    }

}
