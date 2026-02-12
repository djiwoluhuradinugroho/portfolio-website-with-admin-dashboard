<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\CommissionPrice;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalArtworks'    => Artwork::count(),
            'activePrices'     => CommissionPrice::where('is_active', true)->count(),
            'commissionStatus' => DB::table('settings')
                ->where('key', 'commission_status')
                ->value('value') ?? 'closed',
            'artworks'         => Artwork::latest()->take(3)->get(),
        ]);
    }

    // 🔥 INI DIA TEMPATNYA
    public function toggleCommission()
{
    $current = DB::table('settings')
        ->where('key', 'commission_status')
        ->value('value');

    if ($current === null) {
        DB::table('settings')->insert([
            'key'   => 'commission_status',
            'value' => 'open'
        ]);
    } else {
        DB::table('settings')
            ->where('key', 'commission_status')
            ->update([
                'value' => $current === 'open' ? 'closed' : 'open'
            ]);
    }

    return back();
}

}
