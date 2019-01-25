<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\News;


class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('created_at','desc')->get();
        return view('super-admin.categories.category',compact('categories'));
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
        $this->validate($request,[
			"name"=>"required",
         ]);
        Category::create($request->all());
        return redirect()->back()->withMessage("Category Created !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $categories=Category::all();
        $news=News::all();
        $category_news=Category::find($id)->products;
        return view("home",compact(['categories','news','category_news']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }
    public function postUpdateCategory(Request $request, $id)
    {
        $this->validate($request,[
			"name"=>"required",
         ]);
        $category=Category::find($id);
        $category->name=$request['name']; 
        if(Auth::guard('admin')){
        $category->update();
        return redirect()->back()->withMessage("Category  Updated !");
    }

    return redirect()->back()->withMessage("You can't  update !");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeleteCategory($id)
    {
        if(Auth::guard('admin')){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->withMessage("Category  Deleted !");
        }
        return redirect()->back()->withMessage("You can't Delete !");
    }
}
