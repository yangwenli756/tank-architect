<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Index\Brand;
use App\Category;

class GoodsController extends Controller
{

    /*
    无限极分类
     */
    function createTree($data,$p_id=0,$level=1){
        static $arr=[];
        if (!$data) {
            return;
        }
        foreach ($data as $k=>$v) {
            if ($v->p_id==$p_id) {
                $v->level=$level;
                $arr[]=$v;
                $this->createTree($data,$v->cate_id,$level+1);
            }
        }
        return $arr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $data = goods::leftjoin('shop_brand', 'goods.brand_id', '=', 'shop_brand.brand_id')
                        ->leftjoin('category', 'goods.cate_id', '=', 'category.cate_id')
                        ->orderby('goods_id', 'desc')
                        ->paginate($pageSize);

            foreach($data as $v){
                if($v->goods_imgs){
                  $v->goods_imgs = explode('|',$v->goods_imgs);
                }
                //dd($v->goods_imgs);

            }
           
        return view('goods.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandInfo=Brand::all();
        $cateInfo=Category::all();
        $cateInfo=$this->createTree($cateInfo);
        return view('goods/create',['brandInfo'=>$brandInfo,'cateInfo'=>$cateInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->except('_token');
        //dd($data);
        $data['add_time']=time();
        //文件上传
        if (request()->hasFile('goods_img')) {
            $data['goods_img']=$this->upload('goods_img');

        }
        //dd($data);

        //多文件上传
        if ($data['goods_imgs']) {
            $photos=$this->Moreuploads('goods_imgs');
            //dd($photos);
            $data['goods_imgs']=implode('|',$photos);
        }

        
        //dd($data);
        
        $res=Goods::insert($data);
        //dd($data);
        if ($res) {
            return redirect('goods/index');
        }
    }


    //文件上传
     public function upload($filename){
        //判断上传中有没有错
        if (request()->file($filename)->isValid()){
            //接收值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');//文件位置
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }


    //多个文件上传
    function Moreuploads($filename){
       $photo = request()->file($filename);
       if(!is_array($photo)){
         return;
       } 
       // dd($photo);
       $store_result = [];
       foreach( $photo as $v ){
          if ($v->isValid()){
            $store_result[] = $v->store('uploads');
          }
       }
         
       return $store_result;
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
        $user=Goods::find($id);
        $brandInfo=Brand::all();
        $cateInfo=Category::all();
        $cateInfo=$this->createTree($cateInfo);
        return view('goods/edit',['user'=>$user,'brandInfo'=>$brandInfo,'cateInfo'=>$cateInfo]);
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
        $user=$request->except('_token');
        $res=Goods::where('goods_id',$id)->update($user);
        //文件上传
        
        if ($res!==false) {
            return redirect('/goods/index');
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
        $res=Goods::destroy($id);
        if ($res) {
            return redirect('goods/index');
        }
    }
}
