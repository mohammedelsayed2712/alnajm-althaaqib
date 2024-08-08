<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MusanedAbout;
use App\Models\MusanedApp;
use App\Models\MusanedFee;
use App\Models\MusanedJourney;
use App\Models\MusanedJourneyCard;
use App\Models\MusanedService;
use App\Models\MusanedServiceCard;
use App\Models\MusanedStep;
use App\Models\MusanedStepCard;
use Illuminate\Http\Request;

class MusanedController extends Controller
{
    public function about() {
        $about = MusanedAbout::first();

        return response()->json($about);
    }

    public function service() {
        $services = MusanedService::first();

        return response()->json($services);
    }

    public function serviceCard() {
        $cards = MusanedServiceCard::all();

        return response()->json($cards);
    }

    public function journey() {
        $journeys = MusanedJourney::first();

        return response()->json($journeys);
    }

    public function journeyCard() {
        $cards = MusanedJourneyCard::all();

        return response()->json($cards);
    }
    public function step() {
        $journeys = MusanedStep::first();

        return response()->json($journeys);
    }

    public function stepCard() {
        $cards = MusanedStepCard::all();

        return response()->json($cards);
    }

    public function fee() {
        $fees = MusanedFee::first();

        return response()->json($fees);
    }

    public function app() {
        $app = MusanedApp::first();

        return response()->json($app);
    }
}
