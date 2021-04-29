<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shortLinks = ShortLink::latest()->get();
        return response()->json($shortLinks);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'validateAt' => 'required'
        ]);

        $input['link'] = $request->link;
        $input['validateAt'] = Carbon::now()->addDays($request->validateAt);
        $input['code'] = Str::random(6);

        $created = ShortLink::create($input);

        return response()->json($created);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        if (request()->is("api/*")) {
            $find = ShortLink::where('code', $code)->first();

            return response()->json($find->link);
        } else {
            $find = ShortLink::where('code', $code)->first();

            return redirect($find->link);
        }
    }
}
