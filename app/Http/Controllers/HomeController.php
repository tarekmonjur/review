<?php

namespace App\Http\Controllers;

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
    * Show the Voting page.
    *
    * @return \Illuminate\Http\Response
    */
//    public function showVoting(){
//        return view('public.voting');
//    }
//

    /**
     * Show the Chi-Siamo page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChiSiamo(){
        return view('public.chi-siamo');
    }



}
