<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Like;
use App\Message;
use App\Report;
use Illuminate\Support\Facades\Input;
class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('store','browse','index','block','usersShow');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function index()
    {
        $data['status'] = 'Partner Found';
     User::where('id', Auth::id())->update($data);
     return redirect()->back();

    }
    public function usersShow(){
        $users = User::all();
       
        return view('admins.users.usersshow',compact('users'));
    }
public function block($id){
    $data['status'] = 'Blocked';
     User::where('id', $id)->update($data);
    
     return redirect()->back()->with('blocked','User Has Been Blocked');
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
        $id = Auth::id();

        if(Input::hasFile('photo') ){
            $profilePhoto = $request->photo;
            $extensionprofilePhoto = $profilePhoto->getClientOriginalExtension();
            $nameprofilePhoto = $profilePhoto->getClientOriginalName();
            $filenameprofilePhoto = $nameprofilePhoto;
            $pathprofilePhoto = public_path().'/images/photos/user_id_'.$id.'/';
            $profilePhoto->move($pathprofilePhoto,$filenameprofilePhoto);
            $data = array(
                'caste' => $request->caste,
                'sub_caste' => $request->sub_caste,
                'country' => $request->country,
                'citizen_status' => $request->citizen,
                'language' => $request->language,
                'marital_status' => $request->married,
                'disability' => $request->disability,
                'family_type' => $request->family,
                'family_status' => $request->family_status,
                'family_values' => $request->family_values,
                'education' => $request->education,
                'college' => $request->college,
                'occupation' => $request->job,
                'employed_in' => $request->emp,
                'income' => $request->income,
                'diet' => $request->diet,
                'smoke' => $request->smoke,
                'drinks' => $request->drinks,
                'height' => $request->height,
                'weight' => $request->weight,
                'photo' => $filenameprofilePhoto,
                'about_me' => $request->about,
            );

            User::where('id', $id)->update($data);
            return redirect('/');
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
        $user = User::find($id); 
        $user_id = Auth::id();
        $count = Like::where([['user_id' ,'=',$user_id ],['liked_user_id' ,'=',$id ]])->count();
        $message = Message::where('messaged_user_id' , $user_id)->groupBy('user_id')->get();
        $reports = Report::where([['reported_user_id', $id],['user_id', Auth::id()]])->count();
        
        return view('users.profile',compact('user','count','message','reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('login');
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
        $data = array(
            'account_for' => $request->account,
            'name' => $request->name,
            'age' => $request->age,
            'religion' => $request->religion,
            'language' => $request->language,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'caste' => $request->caste,
            'sub_caste' => $request->sub_caste,
            'country' => $request->country,
            'citizen_status' => $request->citizen,
            'language' => $request->language,
            'marital_status' => $request->married,
            'disability' => $request->disability,
            'family_type' => $request->family,
            'family_status' => $request->family_status,
            'family_values' => $request->family_values,
            'education' => $request->education,
            'college' => $request->college,
            'occupation' => $request->job,
            'employed_in' => $request->emp,
            'income' => $request->income,
            'diet' => $request->diet,
            'smoke' => $request->smoke,
            'drinks' => $request->drinks,
            'height' => $request->height,
            'weight' => $request->weight,
     
            'about_me' => $request->about,
        );

        User::where('id', $id)->update($data);
        return redirect()->back()->with('success','Profile Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success','User Successfully Deleted!!');
    }


public function browse(Request $request){
$users = User::whereBetween('age', [$request->age1, $request->age2])->where([['religion', 'LIKE', '%' . $request->religion . '%'],['caste', 'LIKE', '%' . $request->caste . '%'],['gender', 'LIKE', '%' . $request->gender . '%']])->get();

return view('find-results',compact('users'));
}

    public function sendMessages(Request $request, $id){
  $user_id = Auth::id();
  $data['user_id'] = $user_id;
  $data['messaged_user_id'] = $id;
  $data['message'] = $request->message; 
  Message::create($data);
  return redirect()->back();
    }

    public function showMessages($id){
$messages = Message::where([['user_id', $id],['messaged_user_id',Auth::id()]])->get();
$name = User::find($id);
        return view('users.messages',compact('messages','name'));
    }

    public function updatePic(Request $request){
        $id = Auth::id();
        if(Input::hasFile('profileupload') ){
            $profilePhoto = $request->profileupload;
            $extensionprofilePhoto = $profilePhoto->getClientOriginalExtension();
            $nameprofilePhoto = $profilePhoto->getClientOriginalName();
            $filenameprofilePhoto = $nameprofilePhoto;
            $pathprofilePhoto = public_path().'/images/photos/user_id_'.$id.'/';
            $profilePhoto->move($pathprofilePhoto,$filenameprofilePhoto);


            $data  = array(
                'photo' => $filenameprofilePhoto
            );

            User::where('id', $id)->update($data);
        }
        return redirect()->back()->with('success','Profile Picture Changed');
    }
}
