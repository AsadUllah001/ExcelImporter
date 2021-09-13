<?php

namespace App\Http\Controllers;

use App\Http\Requests\Files\StoreRequest;
use App\Models\File;
use App\Services\ExcelImportService;
use Illuminate\Http\Request;

class ExcelFileController extends Controller
{

    private $excelImportService;
    public function __construct(ExcelImportService $excelImportService)
    {
        $this->excelImportService = $excelImportService;
    }

    public function index()
    {
        $files = File::latest()->get();
        return view('excel-files.index', compact('files'));
    }

    public function Store(StoreRequest $request)
    {
        $resp = $this->excelImportService->store( $request->file);
        return redirect()->route('files.index')->with($resp['session'],  $resp['message']);
    }

    public function show(File $file)
    {
        $records = $this->excelImportService->showRecords($file);
        return view('excel-files.show', compact('file', 'records'));
    }
}
