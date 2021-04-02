<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['cat_list']=Category::all();
        // dd($data);
        return view('admin.category',$data);
    }

    public function manage_category(Request $request, $id='')
        {
            if($id>0){

                $arr=Category::where(['id'=>$id])->get();

                $result['category_name']=$arr['0']->category_name;
                $result['category_slug']=$arr['0']->category_slug;
                $result['id']=$arr['0']->id;


            }
            else {

                $result['category_name']='';
                $result['category_slug']='';
                $result['id']=0;
            }
             // echo "<pre>";
             // print_r($result['data'][0]->category_name);
             // die();
             return view('admin.manage_category',$result);
            }
        

        public function manage_category_process(Request $request)
        { 
            // return $request->post();
             
            //  die();

            $request->validate([
                'category_name'=>'required',
                'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),


            ]);

            if($request->post('id')>0) {

                $data= Category::find($request->post('id'));
                $msg="Category Updated";
               
            }
            else {

                  $data=new Category();
                   $msg="Category Inserted";

            }
            $data=new Category();
            $data->category_name=$request->post('category_name');
            $data->category_slug=$request->post('category_slug');
            $data->parent_category_id=$request->post('parent_category_id');
            $data->save();
            $request->session()->flash('message',$msg);

            return redirect('admin/category_list');
            
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $data=Category::find($id);
        // dd($data);
        $data->delete();
        $request->session()->flash('message','Category deleted');

        return back();

    }
}
