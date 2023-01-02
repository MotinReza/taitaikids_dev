<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Models\CompanyContact;
use App\Models\Shipping;
use App\Models\Product;

class FrontendController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //websiteSetting check
        $data = CompanyInfo::all();
            if(count($data)<1){
                return redirect()->route('company-details.create');
            }
            $n['company_info'] = CompanyInfo::first();
            $n['company_contact_info'] = CompanyContact::first();
            $n['shipping'] = Shipping::all();
            $n['products'] = Product::all();
            return view('frontend.index',$n);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function productFetch($id = null){
        if($id){
            $n['company_info'] = CompanyInfo::first();
            $n['company_contact_info'] = CompanyContact::first();
            $n['shipping'] = Shipping::all();
            $n['products'] = Product::where('cat_id',$id)->get();
            return view('frontend.index',$n);
        }
    }

    public function categoryWiseShow($id = null){
        if($id){
            $n['products'] = Product::where('cat_id',$id)->get();
            $n['category'] = Category::find($id);
            return view('frontend.index',$n);
        }
    }

}
