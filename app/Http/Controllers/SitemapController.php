<?php

namespace App\Http\Controllers;

use App\Models\Puja;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Return the sitemap of indexable, public-facing pages.
     */
    public function __invoke(): Response
    {
        $urls = collect([
            ['loc' => route('home'), 'lastmod' => null],
            ['loc' => route('pujas.index'), 'lastmod' => null],
            ['loc' => route('services'), 'lastmod' => null],
            ['loc' => route('posts'), 'lastmod' => null],
            ['loc' => route('astrology'), 'lastmod' => null],
            ['loc' => route('astrologers'), 'lastmod' => null],
            ['loc' => route('mahakal.darshan'), 'lastmod' => null],
            ['loc' => route('contact'), 'lastmod' => null],
        ]);

        Puja::query()
            ->select(['slug', 'updated_at'])
            ->orderBy('slug')
            ->get()
            ->each(fn (Puja $puja) => $urls->push([
                'loc' => route('pujas.show', $puja),
                'lastmod' => $puja->updated_at,
            ]));

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
