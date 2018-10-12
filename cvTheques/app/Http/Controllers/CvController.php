<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\cvRequest;
use App\Cv;
use Auth;

class CvController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	//lister les cvs
    public function index(){
    	$data['listcv'] = Auth::user()->cvs;
    	return view('cv.index',$data);
    }
    //Afficher le formulaire de creaton de cv
    public function create(){
    	return view('cv.create');
    }
    //Enregistrer un cv
    public function store(cvRequest $request){
    	$cv = new Cv();
    	$cv->titre = $request->input('titre');
    	$cv->presentation = $request->input('presentation');
    	$cv->user_id = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('images');
            $cv->photo = $path;
        }

    	$cv->save();

    	session()->flash('success','le cv est bien Enregistrer');
    	return redirect('cvs');
    }
    //permet de récupérer un cv puis de le mettre dans un le formulaire
    public function edit($id){
    	$data['cv'] = Cv::find($id);
    	return view('cv.edit',$data);
    }
    //permet de modifiier un cv
    public function update(cvRequest $request, $id){
    	$cv = Cv::find($id);
    	$cv->titre = $request->input('titre');
    	$cv->presentation = $request->input('presentation');
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('images');
            $cv->photo = $path;
        }
        
    	$cv->save();

    	session()->flash('success','le cv est bien Modifiier');
    	return redirect('cvs');
    }
    //permet de desactiver le cv
    public function destroy(Request $request, $id){
    	$cv = Cv::find($id);
    	$cv->delete();

		return redirect('cvs');    
	}
}
