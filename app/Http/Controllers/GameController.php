<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        $allowedFilters = ['category', 'rating'];

        foreach ($allowedFilters as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->input($field));
            }
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'rating' => 'required|integer|min:0|max:10',
            'release_date' => 'required|date',
        ]);

        $game = Game::create($validated);

        return response()->json($game, 201);
    }

    public function show(string $id)
    {
        $game = Game::findOrFail($id);

        return response()->json($game, 200);
    }

    public function update(Request $request, string $id)
    {
        $game = Game::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:255',
            'rating' => 'sometimes|required|integer|min:0|max:10',
            'release_date' => 'sometimes|required|date',
        ]);

        $game->update($validated);

        return response()->json($game, 200);
    }

    public function destroy(string $id)
    {
        $game = Game::findOrFail($id);

        $game->delete();

        return response()->noContent();
    }
}
