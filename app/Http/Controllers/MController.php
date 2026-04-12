<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Illuminate\Http\Request;

class MController extends Controller
{
    private static $lensIndex = 0;

    public function index() {
        return view('lens'); // blade file
    }

    public function nextLens() {
        self::$lensIndex++;
        return response()->json(['status' => 'ok']);
    }

    public function prevLens() {
        self::$lensIndex--;
        if (self::$lensIndex < 0) self::$lensIndex = 0;
        return response()->json(['status' => 'ok']);
    }

    public function stream() {
        $process = new Process([
            'python3', base_path('python/lens_stream.py'), self::$lensIndex
        ]);

        $process->setTimeout(0);
        $process->start();

        return response()->stream(function () use ($process) {
            while ($process->isRunning()) {
                echo $process->getIncrementalOutput();
                flush();
            }
        }, 200, [
            'Content-Type' => 'multipart/x-mixed-replace; boundary=frame'
        ]);
    }
}
