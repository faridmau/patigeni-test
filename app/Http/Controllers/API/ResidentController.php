<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Resident;
use App\Http\Resources\ResidentResource;
class ResidentController extends Controller
{
    public function residents()
    {
        $residents = new ResidentResource(Resident::all());
        return $residents;
    }
}
