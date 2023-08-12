<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTurnTest extends TestCase
{
    public function test_game_turn_api_returns_a_default_turn_game(): void
    {
        $response = $this->get('/api/game-turns');
        $response->assertStatus(200);
        $response->assertJson([
            ['A', 'B', 'C'],
            ['B', 'C', 'A'],
            ['C', 'A', 'B']
        ]);
    }

    public function test_game_turn_api_returns_next_group_of_turns_in_reversed_order(): void
    {
        $turns = 4;
        $response = $this->get("/api/game-turns?turns={$turns}");
        $response->assertStatus(200);
        $response->assertJson([
            ['A', 'B', 'C'],
            ['B', 'C', 'A'],
            ['C', 'A', 'B'],
            ['C', 'B', 'A']
        ]);
    }
}
