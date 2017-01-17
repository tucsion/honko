<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Overtrue\Pinyin\Pinyin;
use Crypt;

class TuisongController extends Controller
{
 
    public function ajax()
    {
      $uid = session('user') -> id;
      $tuisong = DB::table('hkyl_tuisong') -> where('state','0') -> where('zjid',$uid) -> first();
      
      if($tuisong)
      {
        return response() -> json(['state'=>1]);
      }else{
        return response() -> json(['state'=>0]);
      }
    }
    public function xitong()
    {
      //查询所有分类
      $set = DB::table('hkyl_set') -> first();
      $expert = DB::table('hkyl_cate') -> where('pid','=','2') -> orderBy('id') -> get() ;
      $train = DB::table('hkyl_cate') -> where('pid','=','3') -> orderBy('id') -> get();
      $ys = DB::table('hkyl_cate') -> where('pid','=','4') -> orderBy('id') -> get();
      $hickey = DB::table('hkyl_cate') -> where('pid','=','5') -> orderBy('id') -> get();
      $procure = DB::table('hkyl_cate') -> where('pid','=','8') -> orderBy('id') -> get();
      $goods = DB::table('hkyl_cate') -> where('pid','=','9') -> orderBy('id') -> get();
      $health = DB::table('hkyl_cate') -> where('pid','=','11') -> orderBy('id') -> get();
      $banner = DB::table('hkyl_banner') -> where('id','=','2') -> first();
      $jiaoyu = DB::table('hkyl_cate') -> where('pid','=','3') -> orderBy('id') -> first();
      $yangsheng = DB::table('hkyl_cate') -> where('pid','=','4') -> orderBy('id') -> first();
      $qiye = DB::table('hkyl_cate') -> where('pid','=','8') -> orderBy('id') -> first();
      $huiyi = DB::table('hkyl_cate') -> where('pid','=','11') -> orderBy('id') -> first();
      $xuanzhe = 1;

      $uid = session('user') -> id;
      $ts = DB::table('hkyl_tuisong As c1')
      ->leftJoin('hkyl_disease As c2','c2.id','=','c1.bid')
      ->leftJoin('hkyl_user As c3','c3.id','=','c2.uid')
      -> select('c1.*','c2.*','c3.*','c1.id as id')
       -> where('c1.zjid',$uid) 
       ->get();

       $keshi = DB::table('hkyl_keshi') -> get();
      
       return view('home.tuisong.xitong',['set' => $set,'qiye'=>$qiye,'keshi'=>$keshi,'huiyi'=>$huiyi,'ts'=>$ts,'yangsheng'=>$yangsheng,'expert' => $expert,'jiaoyu'=>$jiaoyu,'train' => $train,'ys' => $ys,'hickey'=>$hickey,'procure'=>$procure,'goods'=>$goods,'health'=>$health,'xuanzhe' => $xuanzhe]);
    }
    public function delete(Request $request)
    {
      $id = $request -> id;
       $res = DB::table('hkyl_tuisong') -> delete($id);
       if($res)
       {
        return response()->json(['status'=> 1 ,'msg'=>'删除成功']);
      }else{
        return response()->json(['status'=> 0 ,'msg'=>'删除失败']);
      }
    }
    public function follow(Request $request)
    {
      $bid = $request -> id;
      $zjid = session('user') -> id;
      $time = time();
      $data['bid'] = $bid;
      $data['zjid'] = $zjid;
      $data['gztime'] = $time;
      $gz = DB::table('hkyl_follow') -> where('zjid',$zjid) -> where('bid',$bid) -> first();
      if(!empty($gz))
      {
        return response() -> json(['status'=> 0 ,'msg'=>'已经关注过此病例']);
      }
      $res = DB::table('hkyl_follow') -> insert($data);
      if($res)
      {
        return response()->json(['status'=> 1 ,'msg'=>'关注成功']);
      }else{
        return response()->json(['status'=> 0 ,'msg'=>'关注失败']);
      }
    }
    public function blxq($id)
    {
      dd($id);
    }
}
    


