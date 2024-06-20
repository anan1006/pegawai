<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }
    public function getData(Request $request)
{
    $option = $request->query('option');

    // Inisialisasi data dan labels
    $data = [];
    $labels = [];

    // Pilih kolom berdasarkan pilihan dropdown
    switch ($option) {
        case 'status':
            $results = DB::table('pegawais')
                ->select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->get();
            foreach ($results as $result) {
                $labels[] = ucwords($result->status);
                $data[] = $result->count;
            }
            break;

        case 'jenis_kelamin':
            $results = DB::table('pegawais')
                ->select('jenis_kelamin', DB::raw('count(*) as count'))
                ->groupBy('jenis_kelamin')
                ->get();
            foreach ($results as $result) {
                $labels[] = ucwords($result->jenis_kelamin);
                $data[] = $result->count;
            }
            break;

        case 'posisi':
            $results = DB::table('pegawais')
                ->select('posisi', DB::raw('count(*) as count'))
                ->groupBy('posisi')
                ->get();
            foreach ($results as $result) {
                $labels[] = ucwords($result->posisi);
                $data[] = $result->count;
            }
            break;

        default:
            break;
    }

    return response()->json([
        'labels' => $labels,
        'data' => $data
    ]);
}
}
