<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\verifyIsAdmin;
use App\Http\Requests\ContactRequest;
use App\Page_config;
use App\site_details;
use DB;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function __construct(){
        return $this->middleware('verifyIsAdmin')->only('index','destroy');
    }

    public function index()
    {
        //
        return view('admin.contact.index')
            ->with('contacts',Contact::orderBy('created_at', 'desc')->paginate(9));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $about_intro = Page_config::all()->where('id','1');
        $socail = site_details::all();
        $contact_intro = Page_config::all()->where('id','2');
        $categoies = Category::all();
        return view('admin.contact.create')
            ->with('categories',$categoies)
            ->with('about_intro',$about_intro)
            ->with('socail',$socail)
        ->with('contact_intro',$contact_intro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request , Contact $contact)
    {
        //
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'messages'=>$request->messages,
        ];

        $contact->create($data);
        session()->flash('success','Messges Has Been Submitted . We will get back to you soon .THank you !!');
        return redirect()->back();
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
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        session()->flash('success','Message has been Deleted');
        return redirect()->back();

    }

    public function changeStatus(Request $request)
    {
        $id = Contact::find($request->id);
        $contact = DB::table("contacts")
            ->where("id", $id);
        return response()->json($contact);
    }

}
