<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    private $moves = ['rock', 'paper', 'scissors'];

    public function play(Request $request)
    {
        $player2Moves = $request->input('moves');
        $rounds = count($player2Moves);
        $player1Wins = 0;
        $player2Wins = 0;
        $ties = 0;

        for ($i = 0; $i < $rounds; $i++) {
            $player1Move = $this->moves[array_rand($this->moves)];
            $player2Move = $player2Moves[$i];
            $result = $this->determineWinner($player1Move, $player2Move);

            if ($result === 1) {
                $player1Wins++;
            } elseif ($result === 2) {
                $player2Wins++;
            } else {
                $ties++;
            }
        }

        $totalRounds = $rounds;
        $player1WinPercentage = ($player1Wins / $totalRounds) * 100;
        $player2WinPercentage = ($player2Wins / $totalRounds) * 100;

        return response()->json([
            'total_rounds' => $totalRounds,
            'player1_wins' => $player1Wins,
            'player2_wins' => $player2Wins,
            'ties' => $ties,
            'player1_win_percentage' => $player1WinPercentage,
            'player2_win_percentage' => $player2WinPercentage,
        ]);
    }

    private function determineWinner($player1Move, $player2Move)
    {
        if ($player1Move === $player2Move) {
            return 0; // Tie
        }

        if (
            ($player1Move === 'rock' && $player2Move === 'scissors') ||
            ($player1Move === 'paper' && $player2Move === 'rock') ||
            ($player1Move === 'scissors' && $player2Move === 'paper')
        ) {
            return 1; // Player 1 wins
        }

        return 2; // Player 2 wins
    }
}