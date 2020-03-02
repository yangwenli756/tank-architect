<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop_login;
use App\Http\Requests\StoreShop_loginPost;
class Shop_loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $l_name = request()->l_name??'';
        $where = [];
        if($l_name){
            $where[] = ['l_name','like',"%$l_name%"];
        }
        //$pageSize = config('app.pageSize');
       $data =  Shop_login::where($where)->paginate(3);
       //dd($data);
        return view('shop_login/index',['data'=>$data,'l_name'=>$l_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop_login/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShop_loginPost $request)
    {
        $data = $request->except('_token');
        //dd($data);
        if($request->hasFile('l_img')){
            $data['l_img'] = $this->upload('l_img');
        }
        $res = Shop_login::create($data);
        if($res){
            return redirect('/shop_login/index');
        }
    }


    //上传文件
    public function upload($filename){
        //判断上传当中是否有错
        if(request()->file($filename)->isValid()){
            //接收值
            $photo = request()->file($filename);
            //dd($photo);
            //上传
            $store_result = $photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件获上传过程出错');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Shop_login::find($id);
        //dd($data);
        return view('shop_login/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        if($request->hasFile('l_img')){
            $data['l_img'] = $this->upload('l_img');
        }
        $res = Shop_login::where('l_id',$id)->update($data);
        if($res!==false){
            return redirect('shop_login/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Shop_login::destroy($id);
        //dd($data);
        if($res){
            return redirect('shop_login/index');
        }
    }
}
