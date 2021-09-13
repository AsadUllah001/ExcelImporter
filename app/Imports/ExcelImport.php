<?php

namespace App\Imports;

use App\Models\Row;
use App\Services\ExcelImportService;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $sortedData = [];
        $rows = $collection->except(0);
        $headings = $collection->first()->toArray();
        $headings = array_map(fn ($iteration) => ['name' => $iteration], $headings);
        $headings = ExcelImportService::$file->columns()->createMany($headings);
        $ids = $headings->pluck('id')->toArray();
        $rows->each(function ($row) use ($ids, &$sortedData) {
            foreach ($row as $key => $iteration) {
                $sortedData[] = ['column_id' => $ids[$key], 'value' => $iteration, 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()];
            }
        });
        Row::insert($sortedData);
    }
}
