<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Kelompok;
use App\Models\SMS;
use App\Models\Nomor;
use App\Models\Nexmo;

class SMSController extends Controller
{
    
	public function list()
	{
		
		$data = Campaign::with('kelompok')->get();
		return view('index_campaign', compact('data'));
	}
	
	public function create_campaign()
	{
		$kelompok = Kelompok::all();
		return view('form_campaign', compact('kelompok'));
	}
	
	public function send_campaign(Request $request)
	{
		try {
			\DB::beginTransaction();
			
			$remaining_balance = null;
			$camp = Campaign::create($request->only('id_kelompok','campaign_text'));
			$nomor = Nomor::where('id_kelompok', $request->id_kelompok)->get();
			
			if( count($nomor) < 1 ){
				\DB::rollback();
				\Session::flash('error', 'Bidang yang dipilih tidak memiliki nomor handphone');
				return redirect()->back();
			}
			
			foreach( $nomor as $no ){
				
				$resp = $this->api_nexmo( $no->nohp, $request->campaign_text );
				
				if( $resp['code'] == 1 ){
					\Log::info( $resp['contents'] );
					$message_id 	= $resp['contents']['message-id'];
					$message_price 	= $resp['contents']['message-price'];
					$status 		= 1;
					
					$remaining_balance = $resp['contents']['remaining-balance'];
					
				}else if( $resp['code'] == 2 ){
					$status 		= 0;
					$desc			= 'Error Nexmo API. '.@$resp['contents']['status'];
				}else if( $resp['code'] == 3 ){
					$status 		= 0;
					$desc 			= $resp['contents'];
				}else{
					$status 		= 0;
				}
				
				$data = [
					 'id_campaign'		=> $camp->id
					,'to'				=> $no->nohp
					,'body'				=> $request->campaign_text
					,'message_id'		=> $message_id ?? ''
					,'message_price'	=> $message_price ?? ''
					,'status'			=> $status 
					,'desc'				=> $desc ?? ''
				];
				SMS::create( $data );	
			}
			
			if( $remaining_balance != null ){
				$N = Nexmo::find( 1 );
				$N->remaining_balance = $remaining_balance;
				$N->save();	
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
		\DB::commit();
		
		\Session::flash('success', 'Berhasil membuat campaign dan sedang memproses SMS');
		return redirect()->route('sms');
	}
	
	public function api_nexmo($to, $text)
	{
		$basic  = new \Nexmo\Client\Credentials\Basic('6db826f8', 'lY5Ps8MFyVQKGomR');
		$client = new \Nexmo\Client($basic);

		try {
			$message = $client->message()->send([
				'to' => $to,
				'from' => 'SMS-BLAST',
				'text' => $text
			]);
			$response = $message->getResponseData();

			if($response['messages'][0]['status'] == 0) {
				return [
					'code'		=> 1,
					'contents'	=> $response['messages'][0]
				];
			} else {
				return [
					'code'		=> 2,
					'contents'	=> $response['messages'][0]
				];
			}
		} catch (\Exception $e) {
			return [
				'code'		=> 3,
				'contents'	=> "The message was not sent. Error: " . $e->getMessage() . "\n"
			];
		}
	}
	
}
