<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        $boardState = $request->session()->get('board_state');
        if (!$boardState) {
            $boardState = Board::getEmptyState(config('app.boardSize'));
            $request->session()->put('board_state', $boardState);
        }

        return view('index', ['board_state' => $boardState]);
    }

    public function toggle(Request $request)
    {
        $x = $request->input('x');
        $y = $request->input('y');
        $boardState = $request->session()->get('board_state');
        if (!$boardState) {
            $boardState = Board::getEmptyState(config('app.boardSize'));
        }
        $board = new Board(config('app.boardSize'), $boardState);
        $board->toggleCell($x, $y);
        $request->session()->put('board_state', $board->state);

        return view('partials/board', ['board_state' => $board->state]);
    }

    public function next(Request $request)
    {
        $boardState = $request->session()->get('board_state');
        if (!$boardState) {
            $boardState = Board::getEmptyState(config('app.boardSize'));
        }
        $board = new Board(config('app.boardSize'), $boardState);
        $board->iterate();
        $request->session()->put('board_state', $board->state);

        return view('partials/board', ['board_state' => $board->state]);
    }

    public function reset(Request $request)
    {
        $boardState = Board::getEmptyState(config('app.boardSize'));
        $request->session()->put('board_state', $boardState);

        return view('partials/board', ['board_state' => $boardState]);
    }

    public function randomize(Request $request)
    {
        $boardState = Board::getEmptyState(config('app.boardSize'));
        foreach ($boardState as $x => $row) {
            foreach ($row as $y => $cell) {
                $boardState[$x][$y] = !!rand(0,1);
            }
        }
        $request->session()->put('board_state', $boardState);

        return view('partials/board', ['board_state' => $boardState]);
    }
}
