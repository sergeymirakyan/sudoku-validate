<?php


namespace App\Http\Controllers;


use App\Services\SudokuService;

/**
 * Class SudokuController
 * @package App\Http\Controllers
 */
class SudokuController extends Controller
{

    /**
     * @var SudokuService
     */
    private $service;

    /**
     * SudokuController constructor.
     * @param SudokuService $service
     */
    public function __construct(SudokuService $service)
    {

        $this->service = $service;
    }

    /**
     * Validate sudoku data
     */
    public function solve()
    {
        //Valid data
        $validSudoku = [
            [7, 2, 6, 4, 9, 3, 8, 1, 5],
            [3, 1, 5, 7, 2, 8, 9, 4, 6],
            [4, 8, 9, 6, 5, 1, 2, 3, 7],
            [8, 5, 2, 1, 4, 7, 6, 9, 3],
            [6, 7, 3, 9, 8, 5, 1, 2, 4],
            [9, 4, 1, 3, 6, 2, 7, 5, 8],
            [1, 9, 4, 8, 3, 6, 5, 7, 2],
            [5, 6, 7, 2, 1, 4, 3, 8, 9],
            [2, 3, 8, 5, 7, 9, 4, 6, 1],
        ];
        //Invalid data
        $invalidSudoku = [
            [5, 3, 4, 6, 7, 8, 9, 1, 2],
            [6, 7, 2, 1, 9, 5, 3, 4, 8],
            [1, 9, 8, 3, 4, 2, 5, 6, 7],
            [8, 5, 9, 9, 6, 1, 4, 2, 3],
            [4, 2, 6, 8, 5, 3, 7, 9, 1],
            [7, 1, 3, 7, 2, 4, 8, 5, 6],
            [9, 6, 1, 5, 3, 7, 2, 8, 4],
            [2, 8, 7, 4, 1, 9, 6, 3, 5],
            [3, 4, 5, 2, 8, 6, 1, 7, 9],
        ];

        return response()->json($this->service->validate($invalidSudoku) ? 'Valid' : 'Invalid');
    }
}
