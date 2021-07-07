<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\tbl_karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Karyawan extends Controller
{
    public function getData(){
        $data = DB::table('tbl_karyawan')->get();
        if(count($data) > 0){
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'foto' => 'required|max:2048'
        ]);
        // menyimpan file yang diupload ke dalam $file
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        if($file->move($tujuan_upload, $nama_file)){
            $data = tbl_karyawan::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'foto' => $nama_file
            ]);
            $resp['message'] = "Success!";
            $resp['values'] = $data;
            return response($resp);
        }else{
            $resp['message'] = "Fail!";
            return response($resp);
        }
    }

    public function update(Request $request){
        if(!empty($request->foto)){
            $this->validate($request, [
                'foto' => 'required|max2048'
            ]);
            //menyimpan data file yang diupload ke variable $file
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();

            //isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $nama_file);
            $data = DB::table('tbl_karyawan')->where('id',$id)->get();
            foreach($data as $karyawan){
                @unlink(public_path('data_file/'.$karyawan->foto));
                $ket = DB::table('tbl_karyawan')->where('id',$request->id)->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'umur' => $request->umur,
                    'alamat' => $request->alamat,
                    'foto' => $nama_file
                ]);
            $resp['message'] = "Success!";
            $resp['values'] = $ket;
            return response($resp);
            }
        }else{
            $data = DB::table('tbl_karyawan')->where('id',$request->id)->get();
            foreach($data as $karyawan){
                $ket = DB::table('tbl_karyawan')->where('id',$request->id)->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'umur' => $request->umur,
                    'alamat' => $request->alamat
                    
                ]);
            $resp['message'] = "Success!";
            $resp['values'] = $ket;
            return response($resp);
            }
        }
    }


    public function hapus($id){
        $data = DB::table('tbl_karyawan')->where('id',$id)->get();
        foreach($data as $karyawan){
            if(file_exists(public_path('data_file/'.$karyawan->foto))){
                @unlink(public_path('data_file/'.$karyawan->foto));
                DB::table('tbl_karyawan')->where('id', $id)->delete();
                $res['message'] = 'Success!';
                return response($res);

            }else{
                $res['message'] = 'Empty!';
                return response($res);
            }
        }
    }

    public function getDetail($id){
        $data = DB::table('tbl_karyawan')->where('id',$id)->get();
        if(count($data) > 0){
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }
}
