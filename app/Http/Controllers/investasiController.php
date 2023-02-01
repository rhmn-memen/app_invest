<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class investasiController extends Controller
{
    public function index(Request $request){
        $data = $request;
        $nominal = $data->get('nominal');
        $invest = [];
        for ($i=0; $i < $data->get('lama_invest'); $i++) {
            if ($data->get('jenkel') == 1) {
                if ($data->get('peroko') == 1) {
                    $total_nominal = round(($nominal * 1) / 100);
                    $final_nominal = $total_nominal + $nominal;
                } else if ($data->get('peroko') == 2) {
                    $total_nominal = round(($nominal * 2) / 100);
                    $final_nominal = $total_nominal + $nominal;
                }
            } else if ($data->get('jenkel') == 2) {
                if ($data->get('peroko') == 1) {
                    $total_nominal = round(($nominal * 2) / 100);
                    $final_nominal = $total_nominal + $nominal;
                } else if ($data->get('peroko') == 2) {
                    $total_nominal = round(($nominal * 3) / 100);
                    $final_nominal = $total_nominal + $nominal;
                }
            }

            if ($data->get('usia') < 31) {
                $total_nominal = round(($nominal * 1) / 100);
                $final_nominal = $total_nominal + $nominal;
            } else if ($data->get('usia') < 51) {
                $total_nominal = round(($nominal * 0.5) / 100);
                $final_nominal = $total_nominal + $nominal;
            }

            $invest[$i] = [
                "awal" => $nominal,
                'bunga' => $total_nominal,
                'akhir' => $final_nominal
            ];

            $nominal = $final_nominal;
        }
        return response()->json(['status' => 200, 'message' => 'success', 'data' => $invest]);
    }
}
