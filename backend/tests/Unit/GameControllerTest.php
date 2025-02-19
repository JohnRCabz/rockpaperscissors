<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\GameService;

class GameControllerTest extends TestCase
{
    /**
     * Test the determineWinner method of GameService.
     */
    public function test_determine_winner()
    {
        $service = new GameService();

        $reflection = new \ReflectionMethod(GameService::class, 'determineWinner');
        $reflection->setAccessible(true);

        $this->assertEquals(0, $reflection->invoke($service, 'rock', 'rock'));
        $this->assertEquals(1, $reflection->invoke($service, 'rock', 'scissors'));
        $this->assertEquals(2, $reflection->invoke($service, 'rock', 'paper'));

        $this->assertEquals(0, $reflection->invoke($service, 'paper', 'paper'));
        $this->assertEquals(1, $reflection->invoke($service, 'paper', 'rock'));
        $this->assertEquals(2, $reflection->invoke($service, 'paper', 'scissors'));

        $this->assertEquals(0, $reflection->invoke($service, 'scissors', 'scissors'));
        $this->assertEquals(1, $reflection->invoke($service, 'scissors', 'paper'));
        $this->assertEquals(2, $reflection->invoke($service, 'scissors', 'rock'));
    }

    /**
     * Test the play method of GameService.
     */
    public function test_play_method()
    {
        $service = new GameService();

        $result = $service->play(['rock', 'paper', 'scissors']);

        $this->assertEquals(3, $result['total_rounds']);
        $this->assertGreaterThanOrEqual(0, $result['player1_wins']);
        $this->assertGreaterThanOrEqual(0, $result['player2_wins']);
        $this->assertGreaterThanOrEqual(0, $result['ties']);
        $this->assertLessThanOrEqual(100, $result['player1_win_percentage']);
        $this->assertLessThanOrEqual(100, $result['player2_win_percentage']);
    }
}