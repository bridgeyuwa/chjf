<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\AbortResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProgramController extends Controller
{
    public function index()
    {
        return view('pages.programs.index');
    }

    public function show(string $slug)
    {
        $programs = config('programs');

        if (!isset($programs[$slug])) {
            throw new NotFoundHttpException('Program not found.');
        }

        $program = $programs[$slug];

        return view('pages.programs.show', compact('program'));
    }
}
