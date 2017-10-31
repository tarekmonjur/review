<?php

namespace App\Http\Controllers;

use App\Review;
use App\Software;
use App\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.index');
    }


    /**
     * Show the Gestionali ERP page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGestionaliErp(){
        return view('public.erp');
    }


    /**
     * Show the Business Intellingence page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBusinessIntelligence(){
        return view('public.bi');
    }


    /**
     * Show the CRM page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCRM(){
        return view('public.crm');
    }


    /**
    * Show the review voting page.
    *
    * @return \Illuminate\Http\Response
    */
    public function showReviewForm(){
        $data['softwares'] = Software::get();
        $data['vendors'] = Vendor::get();
        return view('public.review')->with($data);
    }


    /**
     * Show the reviews list page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReview(){
        $data['reviews'] = Review::with('user','software','vendor')->paginate(15);
        return view('public.reviews')->with($data);
    }


    /**
     * Show the Chi-Siamo page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChiSiamo(){
        return view('public.chi-siamo');
    }



}
