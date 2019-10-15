<?php

namespace App\Http\Controllers;

use App\Source;
use App\SourceData;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SourceController extends Controller {

    public function list() {
        $sources = Source::with('company')->orderBy('id','desc')->get();
        return response()->json($sources);
    }

    public function store(Request $request) {
        $file = $request->file('file');

        if (strtolower($file->getClientOriginalExtension()) != 'csv') {
            return response()->json(['message' => 'Debe ser un archivo CSV.'], 422);
        }

        if ($file->getSize() >= 2097152) {
            return response()->json(['message' => 'El archivo no debe superar 2MB.'], 422);
        }

        $filename = $file->getClientOriginalName();
        $separator = $request->input('separator');
        $location = 'uploads';
        $file->move($location, $filename);
        $filepath = public_path($location . '/' . $filename);

        if (!file_exists($filepath) || !is_readable($filepath)) {
            return response()->json(['message' => 'El archivo no se puede leer.'], 422);
        }

        $columns = ['adContent', 'campaign', 'conversion', 'date', 'medium', 'session', 'source'];

        $source = new Source();
        $source->name = $request->input('name');
        $source->company()->associate($request->input('company'));

        if (($handle = fopen($filepath, 'r')) !== false) {
            $header = null;

            while (($row = fgetcsv($handle, 1000, $separator)) !== false) {

                if (!$header) {
                    $header = $row;

                    sort($columns);
                    sort($row);

                    if ($row != $columns) {
                        return response()->json(['message' => 'La estructura del archivo no corresponde.'], 422);
                    }

                    $source->save();
                } else {
                    $data = array_map(function ($value) {
                        return $value == '(not set)' ? null : $value;
                    }, array_combine($header, $row));

                    $sourceData = new SourceData();
                    $sourceData->adContent = $data['adContent'];
                    $sourceData->campaign = $data['campaign'];
                    $sourceData->conversion = $data['conversion'];
                    $sourceData->date = Carbon::parse($data['date'])->toDateTimeString();
                    $sourceData->medium = $data['medium'];
                    $sourceData->session = $data['session'];
                    $sourceData->source = $data['source'];
                    $sourceData->source_id = $source->id;
                    $sourceData->save();
                }
            }

            fclose($handle);
        }

        return response()->json($source, 201);
    }

    public function show(Source $source) {
        $sessions = DB::select(DB::raw("select sum(session) from source_data where source_id = {$source->id}"));
        $conversions = DB::select(DB::raw("select sum(conversion) from source_data where source_id = {$source->id}"));
        $campaigns = DB::select(DB::raw("select campaign as name, sum(session) as session, sum(conversion) as conversion from source_data where source_id = {$source->id} group by campaign"));
        $sources = DB::select(DB::raw("select source as name, sum(session) as session, sum(conversion) as conversion from source_data where source_id = {$source->id} group by source"));

        return response()->json([
            'indicators' => [
                'sessions' => $sessions[0]->sum,
                'conversions' => $conversions[0]->sum
            ],
            'campaigns' => $campaigns,
            'sources' => $sources,
        ]);
    }

    public function destroy(Source $source) {
        $source->delete();
        return response()->json($source);
    }
}
