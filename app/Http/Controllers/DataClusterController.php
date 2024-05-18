<?php

namespace App\Http\Controllers;

use App\Models\tb_bencana;
use App\Models\tb_kategori;
use App\Models\tb_parameter;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataClusterController extends Controller
{
    private $iterasi = 1;
    private $dataBencana_old = [];
    private $hasilHitung = [];
    private $dataIterasi = [];
    private $maksIterasi = 100;

    public function DataClusterPage(Request $req, $tahun = '', $id_kategori = '')
    {
        if ($req && $req->get('tahun') && $req->get('id_kategori')) {
            $tahun = $req->get('tahun');
            $id_kategori = $req->get('id_kategori');
        }

        $searchByTahunKategori = '';
        if ($tahun != '' && $id_kategori != '') {
            $searchByTahunKategori = 'WHERE tb_bencana.tahun =' . $tahun . ' AND tb_bencana.id_kategori = ' . $id_kategori;
        }
        $databencana = DB::select("SELECT tb_bencana.*, tb_kelurahan.nama_kelurahan, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan 
        FROM tb_bencana
        JOIN tb_kelurahan ON tb_bencana.id_kelurahan = tb_kelurahan.id
        JOIN tb_kecamatan ON tb_kelurahan.id_kecamatan = tb_kecamatan.id
        JOIN tb_kategori ON tb_bencana.id_kategori = tb_kategori.id $searchByTahunKategori ORDER BY tb_kategori.id");

        for ($i = 0; $i < count($databencana); $i++) {
            $this->dataBencana_old[$i] = [
                'data' => $databencana[$i],
                'dataC' => [],
                'min' => 0,
                'cluster' => 0
            ];
        }

        $this->MemilihPusatKluster();

        // $this->hasilHitung = collect($this->hasilHitung)->sortBy('cluster')->values()->all();
        $datakategori = tb_kategori::all();
        return view('DataCluster.datacluster', [
            'dataclusters' => $this->hasilHitung,
            'datakategoris' => $datakategori
        ]);


        // Menampilkan view jenis dan mengirimkan datas
        // return view('datacluster', ['datas' => $data]);
    }

    function MemilihPusatKluster()
    {
        try {
            $k = 3;
            $lengthData = count($this->dataBencana_old);
            $centroid_data = [];
            $c1 = Session::get('c1');
            $c2 = Session::get('c2');
            $c3 = Session::get('c3');

            if ($c1 && $c2 && $c3) {
                $centroid_data[0] = [
                    'id_kelurahan' => $this->dataBencana_old[$c1 - 1]['data']->id_kelurahan,
                    'nama_kelurahan' => $this->dataBencana_old[$c1 - 1]['data']->nama_kelurahan,
                    'nilai_1' => $this->dataBencana_old[$c1 - 1]['data']->nilai_1,
                    'nilai_2' => $this->dataBencana_old[$c1 - 1]['data']->nilai_2,
                    'nilai_3' => $this->dataBencana_old[$c1 - 1]['data']->nilai_3,
                    'nilai_4' => $this->dataBencana_old[$c1 - 1]['data']->nilai_4,
                ];
                $centroid_data[1] = [
                    'id_kelurahan' => $this->dataBencana_old[$c2 - 1]['data']->id_kelurahan,
                    'nama_kelurahan' => $this->dataBencana_old[$c2 - 1]['data']->nama_kelurahan,
                    'nilai_1' => $this->dataBencana_old[$c2 - 1]['data']->nilai_1,
                    'nilai_2' => $this->dataBencana_old[$c2 - 1]['data']->nilai_2,
                    'nilai_3' => $this->dataBencana_old[$c2 - 1]['data']->nilai_3,
                    'nilai_4' => $this->dataBencana_old[$c2 - 1]['data']->nilai_4,
                ];
                $centroid_data[2] = [
                    'id_kelurahan' => $this->dataBencana_old[$c3 - 1]['data']->id_kelurahan,
                    'nama_kelurahan' => $this->dataBencana_old[$c3 - 1]['data']->nama_kelurahan,
                    'nilai_1' => $this->dataBencana_old[$c3 - 1]['data']->nilai_1,
                    'nilai_2' => $this->dataBencana_old[$c3 - 1]['data']->nilai_2,
                    'nilai_3' => $this->dataBencana_old[$c3 - 1]['data']->nilai_3,
                    'nilai_4' => $this->dataBencana_old[$c3 - 1]['data']->nilai_4,
                ];
            } else {
                for ($i = 0; $i < $k; $i++) {
                    $randNumber = rand(0, $lengthData - 1);
                    $centroid_data[$i] = [
                        'id_kelurahan' => $this->dataBencana_old[$randNumber]['data']->id_kelurahan,
                        'nama_kelurahan' => $this->dataBencana_old[$randNumber]['data']->nama_kelurahan,
                        'nilai_1' => $this->dataBencana_old[$randNumber]['data']->nilai_1,
                        'nilai_2' => $this->dataBencana_old[$randNumber]['data']->nilai_2,
                        'nilai_3' => $this->dataBencana_old[$randNumber]['data']->nilai_3,
                        'nilai_4' => $this->dataBencana_old[$randNumber]['data']->nilai_4,
                    ];
                }
            }

            $this->MenghitungJarakCentroid($centroid_data);
        } catch (\Throwable $th) {
        }
    }

    public function MenghitungJarakCentroid($dataCentroid)
    {
        try {
            $aman = true;
            $hitungC = [];
            for ($i = 0; $i < count($this->dataBencana_old); $i++) {
                $cluster = 0;
                for ($j = 0; $j < count($dataCentroid); $j++) {
                    $hitungC[$j] = sqrt(pow(($this->dataBencana_old[$i]['data']->nilai_1 - $dataCentroid[$j]['nilai_1']), 2) +
                        pow(($this->dataBencana_old[$i]['data']->nilai_2 - $dataCentroid[$j]['nilai_2']), 2) +
                        pow(($this->dataBencana_old[$i]['data']->nilai_3 - $dataCentroid[$j]['nilai_3']), 2) +
                        pow(($this->dataBencana_old[$i]['data']->nilai_4 - $dataCentroid[$j]['nilai_4']), 2));
                }

                for ($j = 0; $j < count($dataCentroid); $j++) {
                    $clusterFound = true;
                    for ($k = 0; $k < count($dataCentroid); $k++) {
                        if ($hitungC[$j] > $hitungC[$k]) {
                            $clusterFound = false;
                        }
                    }
                    if ($clusterFound) {
                        $cluster = $j + 1;
                        break;
                    }
                }

                $this->hasilHitung[$i] = [
                    'data' => $this->dataBencana_old[$i]['data'],
                    'dataC' => $hitungC,
                    'min' => min($hitungC),
                    'cluster' => $cluster,
                ];
                if ($this->dataBencana_old[$i]['cluster'] != $this->hasilHitung[$i]['cluster'] && $this->iterasi < $this->maksIterasi) {
                    $aman = false;
                }
            }
            $this->dataIterasi[] = $this->hasilHitung;
            if (!$aman) {
                $this->iterasi += 1;
                $this->dataBencana_old = $this->hasilHitung;
                $this->perbaruiCentroidByCluster($this->hasilHitung, $dataCentroid);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function perbaruiCentroidByCluster($dataBaru, $dataCentroid)
    {
        $centroid_data = [];
        for ($i = 0; $i < count($dataCentroid); $i++) {
            $nilai_1 = 0;
            $nilai_2 = 0;
            $nilai_3 = 0;
            $nilai_4 = 0;
            $jmlData = 0;
            for ($j = 0; $j < count($dataBaru); $j++) {
                // dd($dataBaru[$j]['cluster']);
                if ($dataBaru[$j]['cluster'] == ($i + 1)) {
                    // $centroid_data[$i][$j] = $dataBaru[$j];
                    $nilai_1 += $dataBaru[$j]['data']->nilai_1;
                    $nilai_2 += $dataBaru[$j]['data']->nilai_2;
                    $nilai_3 += $dataBaru[$j]['data']->nilai_3;
                    $nilai_4 += $dataBaru[$j]['data']->nilai_4;
                    $jmlData += 1;
                }
            }

            $nilai_1 = $nilai_1 == 0 ? 1 : ($nilai_1 / $jmlData);
            $nilai_2 = $nilai_2 == 0 ? 1 : ($nilai_2 / $jmlData);
            $nilai_3 = $nilai_3 == 0 ? 1 : ($nilai_3 / $jmlData);
            $nilai_4 = $nilai_4 == 0 ? 1 : ($nilai_4 / $jmlData);
            $centroid_data[$i] = [
                'cluster' => ($i + 1),
                'nilai_1' => $nilai_1,
                'nilai_2' => $nilai_2,
                'nilai_3' => $nilai_3,
                'nilai_4' => $nilai_4,
            ];
        }

        $this->MenghitungJarakCentroid($centroid_data);
    }


    public function DataClusterCentroid(Request $req)
    {
        if ($req->c1 && $req->c2 && $req->c3) {
            Session::put('c1', $req->c1);
            Session::put('c2', $req->c2);
            Session::put('c3', $req->c3);
        } else {
            Session::forget('c1');
            Session::forget('c2');
            Session::forget('c3');
        }
        $params = $req->get('tahun') ? ('?tahun=' . $req->get('tahun')
            . '&id_kategori=' . $req->get('id_kategori')) : '';
        return redirect('/datacluster' . $params);
    }

    public function DataClusterHitung(Request $req)
    {
        $searchByTahunKategori = '';
        if ($req->get('tahun') != '' && $req->get('id_kategori') != '') {
            $searchByTahunKategori = 'WHERE tb_bencana.tahun =' . $req->get('tahun') . ' AND tb_bencana.id_kategori = ' . $req->get('id_kategori');
        }
        $this->DataClusterPage($req, $req->get('tahun'), $req->get('id_kategori'));
        $databencana = DB::select("SELECT tb_bencana.*, tb_kelurahan.nama_kelurahan, tb_kategori.nama_kategori, tb_kecamatan.nama_kecamatan 
        FROM tb_bencana
        JOIN tb_kelurahan ON tb_bencana.id_kelurahan = tb_kelurahan.id
        JOIN tb_kecamatan ON tb_kelurahan.id_kecamatan = tb_kecamatan.id
        JOIN tb_kategori ON tb_bencana.id_kategori = tb_kategori.id $searchByTahunKategori ORDER BY tb_bencana.id");

        $paginatedDataIterasi = $this->paginateArray($this->dataIterasi, 1, $req);


        return view('DataCluster.dataclusterhitung', [
            'databencanas' => $databencana,
            'dataclusters' => $this->hasilHitung,
            'dataIterasis' => $paginatedDataIterasi,
            'iterasi' => $this->iterasi
        ]);
    }
    public function mapcluster(Request $req)
    {
        // Retrieve all data from tb_kategori and tb_bencana
        $datakategori = tb_kategori::all();
        $databencana = tb_bencana::all();

        // Calculate clusters
        $this->DataClusterPage($req, $req->get('tahun'), $req->get('id_kategori'));

        // Pass data to the view
        return view('DataCluster.mapcluster', [
            'datakategoris' => $datakategori,
            'dataclusters' => json_encode($this->hasilHitung),
        ]);
    }

    private function paginateArray($data, $perPage, $req)
    {
        $page = Paginator::resolveCurrentPage('page');
        Paginator::useBootstrap();
        $currentPageItems = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            count($data),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath(), 'query' => $req->query()]
        );
    }
}
