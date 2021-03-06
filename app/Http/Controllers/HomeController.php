<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Nomor;
use Excel;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$kelompok = Kelompok::dKelompok($request);
		$nomor = Nomor::all()->count();
        return view('home', compact('kelompok','nomor'));
    }
	
	public function view_kelompok()
	{
		$data = Kelompok::with('nomor')->get();
		return view('index_kelompok', compact('data'));
	}
	
	public function form_kelompok()
	{
		return view('form_kelompok');
	}
	
	public function save_kelompok(Request $request)
	{
		try {
            
			Kelompok::create($request->all());
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
		}
		
		\Session::flash('success', 'Berhasil menyimpan data');
        return redirect()->route('data.kelompok');
		
	}
	
	public function delete_kelompok(Request $request)
	{
		$id = $request->input('id');
		try {
            
			$data = Kelompok::find($id);
			$data->delete();
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
		}
		
		\Session::flash('success', 'Berhasil menghapus data');
        return redirect()->route('data.kelompok');
		
	}
	
	public function edit_kelompok($id)
	{
		try {
            
			$data = Kelompok::find($id);
			
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
		}
		return view('edit_kelompok', compact('data'));
	}
	
	public function update_kelompok(Request $request)
	{
		try {
            
			$data = Kelompok::findOrFail($request->id);
			$data->nama_kelompok = $request->nama_kelompok;
			$data->deskripsi = $request->deskripsi;
			$data->save();
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
		}
		
		\Session::flash('success', 'Berhasil mengubah data data');
        return redirect()->route('data.kelompok');
		
	}
	
	// start nomor 
	public function view_nomor($id)
	{
		$kelompok = Kelompok::find($id);
		$data = Nomor::where('id_kelompok',$id)->get();
		return view('index_nomor', compact('data','kelompok'));
	}
	
	public function form_nomor($id)
	{
		$kelompok = Kelompok::find($id);
		return view('form_nomor', compact('kelompok'));
	}
	
	public function save_nomor(Request $request)
	{
		$data = $request->all();
		$data['nohp'] = '62'.$request->nohp;
		try {
            Nomor::create($data);
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
		}
		
		\Session::flash('success', 'Berhasil menyimpan data');
        return redirect()->route('data.nomor', $request->id_kelompok);
		
	}
	
	public function delete_nomor($id_kelompok, $id)
	{
		try {
            
			$data = Nomor::find($id);
			$data->delete();
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
		}
		
		\Session::flash('success', 'Berhasil menghapus data');
        return redirect()->route('data.nomor', $id_kelompok);
		
	}
	
	public function edit_nomor($id)
	{
		try {
			$data = Nomor::find($id);
			$kelompok = Kelompok::find($data->id_kelompok);
			
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
		}
		return view('edit_nomor', compact('data','kelompok'));
	}
	
	public function mutasi_nomor($id)
	{
		try {
			$kelompok = Kelompok::all();
			$data = Nomor::find($id);
			
			
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
		}
		return view('mutasi_nomor', compact('data','kelompok'));
	}
	
	public function update_nomor(Request $request)
	{
		try {
            
			$data = Nomor::findOrFail($request->id);
			$data->nama_anggota = $request->nama_anggota;
			$data->nohp = '62'.$request->nohp;
			$data->nip = $request->nip;
			$data->save();
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
		}
		
		\Session::flash('success', 'Berhasil mengubah data data');
        return redirect()->route('data.nomor', $data->id_kelompok);
		
	}
	
	public function mutasikan_nomor(Request $request)
	{
		try {
            
			$data = Nomor::findOrFail($request->id);
			$old_id_kelompok = $data->id_kelompok;
			$data->id_kelompok = $request->id_kelompok;
			$data->save();
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back()->withInput($request->input());
		}
		
		\Session::flash('success', 'Berhasil mutasi data');
        return redirect()->route('data.nomor', $old_id_kelompok);
		
	}
	
	
	
	public function upload_nomor($id)
	{
		
		$kelompok = Kelompok::find($id);
		return view('form_upload_nomor', compact('kelompok'));
		
	}
	public function save_upload(Request $request)
	{
		try {
			$file = $request->file('filenomor');
			$path = $file->getRealPath();
			$data = Excel::load($path)->get();
			
			if($data->count()){
				foreach ($data as $k=>$value) {
					$klp = Kelompok::where('deskripsi','like','%'.$value->unit_kerja.'%')
						->where('nama_kelompok',$request->nama_kelompok)
						->first();
					if($klp){
						$number = $value->nomor_hp; 
						$country_code = '62';
						$new_number = substr_replace($number, $country_code, 0, ($number[0] == '0'));
						
						$nmr = Nomor::firstOrNew(['nip'=>$value->nip]);
						$nmr->nama_anggota	= $value->nama_lengkap;
						$nmr->nohp 			= $new_number;
						$nmr->id_kelompok	= $klp->id;
						$nmr->save();
						
					}
				
				}
				
				
			}
		}catch (\Throwable $e) {
            $msg = 'Terjadi kesalahan pada backend ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
        }catch (\Exception $e) {
            $msg = 'Terjadi kesalahan sistem silahkan tunggu beberapa saat dan ulangi kembali. Error messages ->'.$e->getMessage();
			\Session::flash('error', $msg);
            return redirect()->back();
		}
		
		\Session::flash('success', 'Berhasil menyimpan data');
        return redirect()->route('data.nomor', $request->id_kelompok);
	}
}
