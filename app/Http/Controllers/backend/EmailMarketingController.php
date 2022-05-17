<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EmailMarketing;
use App\Models\MailSubscriber;
use App\Jobs\EmailMarketJob;

use Illuminate\Support\Facades\Artisan;

class EmailMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $customers=MailSubscriber::select(['id','email','country','ip_address','subscribed'])->orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $customers=[];
        }
        try {
            $drafts=EmailMarketing::orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $drafts=[];
        }

        return view('backend.email_marketing.index', compact('drafts', 'customers'));
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
        if (!$request->status) {
            $this->validate($request, [
          'from_name' => 'required',
          'from_email' => 'required|email',
          'subject' => 'required|unique:email_marketings,subject',
          'body' => 'required|unique:email_marketings,body',
         ]);

            $EM=new EmailMarketing();
            $EM->from_name= $request->from_name;
            $EM->from_email= $request->from_email;
            $EM->subject= $request->subject;
            $EM->body= $request->body;
            $EM->save();

            $this->ImageCrawler();
            return response()->json(['status'=>1,'notification'=>"Drafted Successfully"]);
        } else {
            $this->validate($request, [
          'from_name' => 'required',
                'from_email' => 'required|email',
                'subject' => 'required',
                'body' => 'required',
         ]);

            $details = [
           'subject' => $request->subject,
           'body' => $request->body,
           'from_name' => $request->from_name,
           'from_email' => $request->from_email,
                 ];

            $this->ImageCrawler();
            try {
                if ($request->customers) {
                    $subscribers=MailSubscriber::whereIn('id', $request->customers)->where('subscribed', 1)->select(['email'])->get();
                } else {
                    $subscribers=MailSubscriber::where('subscribed', 1)->select(['email'])->get();
                }

                foreach ($subscribers as $sub) {
                    dispatch(new EmailMarketJob($details, $sub->email));
                }

                // Artisan::call('queue:work');
                return response()->json(['status'=>1,'notification'=>"Mail Sent"]);
            } catch (\Swift_TransportException $e) {
                $response = $e->getMessage() ;
                return response()->json(['status'=>0,'notification'=>"Check YOur Connecction"]);
            } catch (\Exception $e) {
                $response = $e->getMessage() ;
                return response()->json(['status'=>0,'notification'=>"Check YOur Connecction"]);
            }
        }
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
    public function draft_list()
    {
        $drafts=EmailMarketing::orderBy('created_at', 'desc')->get();
        return view('backend.email_marketing.draft_list', compact('drafts'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $draft=EmailMarketing::select(['from_name','from_email','subject','body'])->findOrFail($id);
        return $draft;
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
        $EM=EmailMarketing::findOrFail($id);
        $EM->delete();
        return response()->json(['status'=>1,'notification'=>"Deleted Successfully"]);
        //
    }
    /**
     *   custom resources
     */
    public function EditorImageUpload(Request $request)
    {
        $image= $request->file('file');
        $imageName =  time().'_'.$image->getClientOriginalName();
        // return $imageName;
        $image->move(public_path() . '/assets/frontend/images/product-detail/content_i/', $imageName);
        return request()->root().'/assets/frontend/images/product-detail/content_i/'.$imageName;
    }

    public function ImageCrawler()
    {
        try {
            $imageDir = public_path('assets/frontend/images/product-detail/content_i');
            foreach (scandir($imageDir) as $path) {
                if (!is_dir($imageDir . '/' . $path)) {
                    $image_path=public_path() . '/assets/frontend/images/product-detail/content_i/'.$path;
                    if (!EmailMarketing::where('body', 'like', '%'.$path.'%')->count()) {
                        unlink($image_path);
                    }
                }
            }
        } catch (\Exception $e) {
        }
    }
}
