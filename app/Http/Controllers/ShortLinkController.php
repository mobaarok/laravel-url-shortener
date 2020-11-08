<?php

namespace App\Http\Controllers;

use App\Model\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
        return view('short_link', ['shortLinks' => $shortLinks]);
    }

    public function storeLink(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);
        ShortLink::create([
            'link' => $request->link,
            'code' => Str::random(7),
        ]);
        return redirect('generate-shorten-link')
        ->with('success', 'Shorten Link Generated Successfully!');
    }

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        return redirect($find->link);
    }
}
