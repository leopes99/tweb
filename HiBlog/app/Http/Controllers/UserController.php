<?php

namespace App\Http\Controllers;
use App\Http\Requests\ModificaProfiloRequest;
use Auth;

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile');
    }
    
    public function viewProfileEdit() {
        return view('profileEdit');
    }
    
    public function EditUtente(ModificaProfiloRequest $request){
       
       $result = collect(request()->all())->filter(function($request){
            return is_string($request)&&!empty($request)||is_array($request)&&count($request);
        });
        
        $user=Auth::user();        
        $user->update($result->all());
        
        return redirect()->action('UserController@index');
            
    }   
    
        public function viewAmici() {
        return view('amici');
    }
    
    public function viewRicercaAmici() {
        return view('ricerca');
    }
    
}
