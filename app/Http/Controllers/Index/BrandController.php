<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Index\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $brand_url  =   request()->brand_url??'';
        $brand_name =   request()->brand_name??'';
        $where=[];
        if ($brand_name) {
            $where[]=['brand_name','like',"%$brand_name%"];
        }
        if ($brand_url) {
            $where[]=['brand_url','=',$brand_url];
        }
        $brand  =   Brand::where($where)->paginate(3);
        return view('index/brand/index',['brand'=>$brand,'brand_url'=>$brand_url,'brand_name'=>$brand_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index\brand\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data   =   request()->except('_token');
        // dd($data);
        if ($request->hasFile('brand_logo')) {
            $data['brand_logo'] =   $this->upload('brand_logo');
        }
        // dd($data);
        $res    =  Brand::insert($data);
        // dd($res);
        if ($res) {
            return redirect('brand/index');
        }
    }
    //封装文件上传
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            $photo  =   request()->file($filename);
            $res    =   $photo->store('uploads');
            return  $res;
        }
        exit('为获取上传文件或文件上传出错');
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
        $res    =   Brand::where('brand_id',$id)->first();
        if ($res) {
            return view('index/brand/edit',['res'=>$res]);
        }
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
        // echo 1;
        $data   =   request()->except('_token');
        // dd($data);
        if ($request->hasFile('brand_logo')) {
            $data['brand_logo'] =   $this->upload('brand_logo');
        }
        $res    =   Brand::where('brand_id',$id)->update($data);
        if ($res!==false) {
            return redirect('brand/index');
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
        // echo 1;
        $res    =   Brand::where('brand_id',$id)->delete();
        if ($res) {
            return redirect('brand/index');
        }
    }
}
