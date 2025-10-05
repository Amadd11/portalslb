<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB; // Import DB Facade

class CountVisitorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Langsung catat setiap kunjungan tanpa pengecekan apa pun
        DB::table('visitors')->insert([
            'ip_address' => $request->ip(),
            'visit_date' => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $next($request);
    }
}
