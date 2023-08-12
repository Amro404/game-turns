<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\GameTurnRequest;
use App\Services\GameTurnService;
use Illuminate\Http\JsonResponse;

class GameTurnsController extends Controller
{
    private GameTurnService $gameTurnService;

    public function __construct(GameTurnService $gameTurnService)
    {
        $this->gameTurnService = $gameTurnService;
    }

    public function __invoke(GameTurnRequest $request): JsonResponse
    {
        return response()->json($this->gameTurnService->generateTurns($request->validated()));
    }
}
