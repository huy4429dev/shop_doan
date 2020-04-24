<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\chi_tiet_don_hang;
use App\don_hang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = getdate()['mon'];
        $y = getdate()['year'];
        $donhang = don_hang::with('user')->with('chi_tiet')->get();
        $sum = don_hang::whereRaw('month(created_at) = ? and year(created_at) = ?', [$m, $y])->count();
        $sort = DB::select('SELECT s.id, ten_san_pham, COUNT(*) AS \'so_luong\' FROM san_pham s JOIN chi_tiet_don_hang c on s.id=c.san_pham_id
WHERE s.id IN (SELECT san_pham_id FROM chi_tiet_don_hang WHERE MONTH(created_at) = ? and YEAR(created_at) = ?) GROUP BY id, ten_san_pham ORDER BY so_luong DESC', [$m, $y]);
        return view('admin.statistic.index', compact('donhang', 'sum', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $y = getdate()['year'];
        $char = DB::select('SELECT MONTH(created_at) AS \'thang\', COUNT(*) AS \'so_luong\' FROM don_hang WHERE YEAR(created_at) = ? GROUP BY thang', [$y]);

        $arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($char as $val) {
            $arr[$val->thang - 1] = $val->so_luong;
        }
        return $arr;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chitiet = chi_tiet_don_hang::with('san_pham')->where('don_hang_id', $id)->get();
        return response()->json($chitiet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
