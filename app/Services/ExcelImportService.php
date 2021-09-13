<?php

namespace App\Services;

use App\Imports\ExcelImport;
use App\Imports\FileImport;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExcelImportService
{
    public static $file;
    private $path;

    public function store($file)
    {
        $resp='';
        try {
            DB::transaction( function () use ($file) {
                self::$file = File::create(['name' => $this->name($file), 'path' => $this->createPath($file)]);
                $this->importExcel();
            });
            $resp = ['session' => 'success', 'message' => 'Record has been created successfully.'];
        } catch (\Exception $exception) {

            Storage::delete($this->path);
            $resp = ['session' => 'danger', 'message' => $exception->getMessage()];
        }
        return $resp;
    }


    private function createPath($file)
    {
        $this->path = $file->store('imports');
        return $this->path;
    }

    private function name($file)
    {
        $fileName = $file->getClientOriginalName();
        return $fileName;
    }
    private function importExcel()
    {
        $importExcel  = \Excel::import(new ExcelImport, $this->path);
        return $importExcel;
    }


    public function showRecords($file)
    {
        $records = [];
        $file->load('columns');
        $columns = $file->columns->pluck('name')->toArray();
        $groups = $file->rows->groupBy('column_id');
        foreach($groups as $outerKey =>  $group){
                foreach($group as $key => $row){
                    $records[$key][$outerKey] = $row->value;
                }
        }
        return collect(['columns' => $columns, 'rows' => $records]);
    }


}
