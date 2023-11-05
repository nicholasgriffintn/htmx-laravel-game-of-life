<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\GameOfLifeBoard;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        $sessionBoard = GameOfLifeBoard::firstOrCreate([
            'session' => 'all',
        ]);
        $boardState = json_decode($sessionBoard->board_state);
        if (!$boardState) {
            $boardState = Board::getEmptyState(config('app.boardSize'));
            $sessionBoard->board_state = json_encode($boardState);
            $sessionBoard->save();
        }

        return view('index', ['board_state' => $boardState]);
    }

    public function toggle(Request $request)
    {
        $x = $request->input('x');
        $y = $request->input('y');

        if (!is_numeric($x) || !is_numeric($y) || $x < 0 || $y < 0 || $x >= config('app.boardSize') || $y >= config('app.boardSize')) {
            return response('Invalid coordinates', 400);
        }

        $sessionBoard = GameOfLifeBoard::firstOrCreate([
            'session' => 'all',
        ]);
        $boardState = $boardState = json_decode($sessionBoard->board_state);
        $board = new Board(config('app.boardSize'), $boardState);
        $board->toggleCell($x, $y);
        $sessionBoard->board_state = json_encode($board->state);
        $sessionBoard->save();

        return view('partials/board', ['board_state' => $board->state]);
    }

    public function next(Request $request)
    {
        $sessionBoard = GameOfLifeBoard::firstOrCreate([
            'session' => 'all',
        ]);
        $boardState = $boardState = json_decode($sessionBoard->board_state);
        if (!$boardState) {
            $boardState = Board::getEmptyState(config('app.boardSize'));
        }
        $board = new Board(config('app.boardSize'), $boardState);
        $board->iterate();
        $sessionBoard->board_state = json_encode($board->state);
        $sessionBoard->save();

        return view('partials/board', ['board_state' => $board->state]);
    }

    public function reset(Request $request)
    {
        $sessionBoard = GameOfLifeBoard::firstOrCreate([
            'session' => 'all',
        ]);
        $newBoardState = Board::getEmptyState(config('app.boardSize'));
        $sessionBoard->board_state = json_encode($newBoardState);
        $sessionBoard->save();

        return view('partials/board', ['board_state' => $newBoardState]);
    }

    public function randomize(Request $request)
    {
        $sessionBoard = GameOfLifeBoard::firstOrCreate([
            'session' => 'all',
        ]);
        $newBoardState = Board::getEmptyState(config('app.boardSize'));
        foreach ($newBoardState as $x => $row) {
            foreach ($row as $y => $cell) {
                $newBoardState[$x][$y] = !!rand(0,1);
            }
        }
        $sessionBoard->board_state = json_encode($newBoardState);
        $sessionBoard->save();

        return view('partials/board', ['board_state' => $newBoardState]);
    }
}
