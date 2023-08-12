<?php


namespace App\Services;


class GameTurnService
{
    public function generateTurns(array $attributes): array
    {
        $startWith = $attributes['start'] ?? 'A';
        $turns = $attributes['turns'] ?? 3;
        $playersCount = $attributes['players'] ?? 3;

        $players = range('A', chr(ord('A') + $playersCount - 1));

        $gameTurns = [];

        for ($turnIdx = 0; $turnIdx < $turns; $turnIdx++) {

            $turn = [];

            if ($turnIdx >= $playersCount) {
                $turn = array_reverse($gameTurns[$turnIdx - $playersCount]);
            } else {

                $startWithPlayerIndex = array_search($startWith, $players);

                for ($j = 0; $j < $playersCount; $j++) {
                    $playerIndex = $this->getPlayerIndex($startWithPlayerIndex, $j, $playersCount);
                    $turn[] = $players[$playerIndex];
                }
                $startWithPlayerIndex = $this->getPlayerIndex($startWithPlayerIndex, 1, $playersCount);
                $startWith = $players[$startWithPlayerIndex];
            }

            $gameTurns[] = $turn;
        }

        return $gameTurns;
    }

    private function getPlayerIndex(int $startingIndex, int $counter, $playersCount): int
    {
        return ($startingIndex + $counter) % $playersCount;
    }
}
