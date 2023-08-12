<?php

namespace Tests\Unit;

use App\Services\GameTurnService;
use PHPUnit\Framework\TestCase;

class GameTurnTest extends TestCase
{
    public function test_game_turns_service_processed_default_turns(): void
    {
        $gameTurnService = new GameTurnService();
        $attributes = [
            'turns' => 3,
            'players' => 3,
            'start' => 'A'
        ];

        $gameTurns = $gameTurnService->generateTurns($attributes);

        $this->assertEquals([
            ['A', 'B', 'C'],
            ['B', 'C', 'A'],
            ['C', 'A', 'B']
        ], $gameTurns);

    }

    public function test_game_turns_service_processed_next_group_of_turns_in_reversed_order(): void
    {
        $gameTurnService = new GameTurnService();
        $attributes = [
            'turns' => 4,
            'players' => 3,
            'start' => 'A'
        ];

        $gameTurns = $gameTurnService->generateTurns($attributes);

        $this->assertEquals([
            ['A', 'B', 'C'],
            ['B', 'C', 'A'],
            ['C', 'A', 'B'],
            ['C', 'B', 'A']
        ], $gameTurns);

    }
}
