<?php

namespace App\Repositories;

use App\Interfaces\LokasiRepositoryInterface;
use App\Models\Desa;
use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class LokasiRepository implements LokasiRepositoryInterface
{
    public function getAllLokasis() {
        return Lokasi::all();
    }

    public function getLatestLokasi(){
        return Lokasi::latest()->get()->take(6);
    }

    public function getLokasiByRelawanId(string $status){
    return Lokasi::where('relawan_id', Auth::user()->relawan->id)
            ->whereHas('statusLokasi', function (Builder $query) use ($status) {
                $query->where('status', $status)
                    ->whereIn('id', function($subQuery) {
                        $subQuery->selectRaw('MAX(id)')
                                ->from('status_lokasis')
                                ->groupBy('lokasi_id');
                    });
            })->get();
    }
    public function getLokasiById(int $id) {
        return Lokasi::where('id', $id)->first();
    }

    public function getLokasiByDesa(string $desa) {
        $desa = Desa::where('nama_desa', $desa)->first();

        return Lokasi::where('desa_id', $desa->id)->get();
    }

    public function createLokasi(array $data){
        $lokasi =  Lokasi::create($data);
        $lokasi->statusLokasi()->create([
            'status'=> 'pending',
            'catatan' => 'Lokasi Berhasil Diajukan'
        ]);

        return $lokasi;
    }

    public function updateLokasi(int $id, array $data){
        $lokasi = $this->getLokasiById($id);
        
        return $lokasi->update($data);
    }

    public function deleteLokasi(int $id) {
        $lokasi = $this->getLokasiById($id);
       
        return $lokasi->delete();
    }
}