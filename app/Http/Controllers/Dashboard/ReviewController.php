<?php

namespace App\Http\Controllers\Dashboard;

use App\Review;
use App\Software;
use App\Vendor;

use App\Mail\ReviewStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show all reviews
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if($this->auth->user_type == 2){
            $data['reviews'] = Review::with('user','software','vendor')
                ->orderBy('id', 'desc')
                ->paginate(15);
        }else{
            $data['reviews'] = Review::with('user','software','vendor')
                ->where('user_id',$this->auth->id)
                ->orderBy('id', 'desc')
                ->paginate(15);
        }
        return view('dashboard.reviews')->with($data);
    }


    /**
     * Save review vote to database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createReview(Request $request)
    {
        $request->validate([
            'software' => 'required',
            'vendor' => 'required',
            'title' => 'required',
            'software_score' => 'required',
            'easy_use_score' => 'required',
            'implementation_score' => 'required',
            'technical_score' => 'required',
            'update_score' => 'required',
            'policy' => 'required',
        ],[], [
            'title' => 'Titolo della tua recensione',
            'easy_use_score' => 'Facilita di utilizzo',
            'implementation_score' => 'Tempi di implementazione',
            'technical_score' => 'Servizi tecnici',
            'update_score' => 'Miglioramenti ottenuti',
            'policy' => 'Invia la tua recensione',
        ]);

        try {
            $review = new Review;
            $review->user_id = $this->auth->id;
            $review->software_id = $request->software;
            $review->vendor_id = $request->vendor;
            $review->software_score = $request->software_score;
            $review->title = $request->title;
            $review->description = $request->description;
            $review->easy_use_score = $request->easy_use_score;
            $review->implementation_score = $request->implementation_score;
            $review->technical_score = $request->technical_score;
            $review->update_score = $request->update_score;
            $review->save();

            $request->session()->flash('success', 'Thank you for your review, you will receive an email when the your review will be published.');
            return redirect('reviews/show');
        }catch(\Exception $e) {
            $request->session()->flash('error', 'Sorry! your review not Success.');
            return redirect()->back();
        }
    }


    /**
     * Show review edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReviewEdit($id){
        $data['softwares'] = Software::get();
        $data['vendors'] = Vendor::get();
        if(!$data['review'] = Review::find($id)){
            return redirect()->back();
        }
        return view('dashboard.review_edit')->with($data);
    }


    /**
     * update review vote data to database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reviewUpdate(Request $request)
    {
        $request->validate([
            'software' => 'required',
            'vendor' => 'required',
            'title' => 'required',
            'software_score' => 'required',
            'easy_use_score' => 'required',
            'implementation_score' => 'required',
            'technical_score' => 'required',
            'update_score' => 'required',
        ],[], [
            'title' => 'Titolo della tua recensione',
            'easy_use_score' => 'Facilita di utilizzo',
            'implementation_score' => 'Tempi di implementazione',
            'technical_score' => 'Servizi tecnici',
            'update_score' => 'Miglioramenti ottenuti',
        ]);

        try {
            $review = Review::find($request->id);
            $review->user_id = $this->auth->id;
            $review->software_id = $request->software;
            $review->vendor_id = $request->vendor;
            $review->software_score = $request->software_score;
            $review->title = $request->title;
            $review->description = $request->description;
            $review->easy_use_score = $request->easy_use_score;
            $review->implementation_score = $request->implementation_score;
            $review->technical_score = $request->technical_score;
            $review->update_score = $request->update_score;
            $review->save();

            $request->session()->flash('success', 'Review has been updated.');
            return redirect('reviews/show');
        }catch(\Exception $e) {
            $request->session()->flash('error', 'Review not updated.');
            return redirect()->back();
        }
    }


    /**
     * Delete review vote
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewDelete(Request $request)
    {
        try{
            Review::where('id', $request->id)->delete();
            $request->session()->flash('success', 'Review successfully deleted.');
        }catch (\Exception $e){
            $request->session()->flash('danger', 'Review not deleted.');
        }
        return redirect()->back();
    }


    /**
     * Update/Change review status and send mail
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeReviewStatus(Request $request)
    {
        try{
            Review::where('id', $request->id)->update(['status' =>  $request->status]);
            $review = Review::with('user')->find($request->id);
            Mail::to($review->user->email)->send(new ReviewStatus($review));
            $request->session()->flash('success', 'Review status successfully changed.');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Review status not changed.');
        }
        return redirect()->back();
    }


    /**
     * Import vendor and software data from csv
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function importVendorData(Request $request)
    {
        if($this->auth->user_type != 2){
            return redirect()->back();
        }

        if($request->has('import'))
        {
            $vendors = [];
            $csv = $request->db;
            $file = fopen($csv->path(), "r");
            $file2 = fopen($csv->path(), "r");

            while(!feof($file))
            {
                $content = fgetcsv($file);

                $name = utf8_encode($content[0]);
                $city = utf8_encode($content[1]);
                $province = utf8_encode($content[2]);

                $vendors[] = [
                    'name' => $name,
                    'city' => $city,
                    'province' => $province
                ];
            }
            Vendor::insert($vendors);

            $content = fgetcsv($file2);
            $softwares = [];
            for($i=3; $i<=183; $i++) {
                if(isset($content[$i])) {
                    $softwares[] = ['software_name' =>utf8_encode($content[$i]) ];
                }
            }

            Software::insert($softwares);

            fclose($file);
            fclose($file2);
        }
        return view('dashboard.import');
    }


}
