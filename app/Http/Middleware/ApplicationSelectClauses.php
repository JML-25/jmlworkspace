<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class ApplicationSelectClauses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

   public function handle(Request $request, Closure $next)
    {
        // On suppose que la table s'appelle "tags"
        $tags = DB::table('applicationcodes')->orderBy('code')->orderBy('sequence')->get();
        $globalTags = [];
        foreach ($tags as $tag) {
            if (!isset($globalTags[$tag->code])) {
                $globalTags[$tag->code] = [];
            }

            $globalTags[$tag->code][$tag->sequence]['label'] = $tag->label;
            $globalTags[$tag->code][$tag->sequence]['internal'] = $tag->internal;

        }

       

        // Rendre disponible globalement (dans toutes les vues et les contrôleurs)
        session(['applicationselectclauses' => $globalTags]);

        return $next($request);
    }

}