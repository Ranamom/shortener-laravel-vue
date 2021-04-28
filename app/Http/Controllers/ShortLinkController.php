<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

        if (request()->is("api/*")) {
            return response()->json($shortLinks);
        } else {
            return view('shortenLink', compact('shortLinks'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->is("api/*")) {
            $request->validate([
                'link' => 'required|url'
            ]);

            $input['link'] = $request->link;
            $input['code'] = Str::random(6);

            $created = ShortLink::create($input);

            return response()->json($created);
        } else {
            $request->validate([
                'link' => 'required|url'
            ]);

            $input['link'] = $request->link;
            $input['code'] = Str::random(6);

            ShortLink::create($input);

            return redirect('generate-shorten-link')
                ->with('success', 'Shorten Link Generated Successfully!');
        }
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
