<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');


        Search::create([
            'query' => $query,
            'searchable_type' => Search::class,
        ]);
        $results = Search::where('column_name', 'like', '%' . $query . '%')->get();

        return view('search_results', compact('results'));
    }
}
