<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GameService;

class GameController extends Controller
{
    protected $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function play(Request $request)
    {
        $player2Moves = $request->input('moves');
        $result = $this->gameService->play($player2Moves);

        return response()->json($result);
    }
}