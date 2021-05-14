<?php

namespace App\Http\Livewire;
use Livewire\Component;
use DateTime;
use App\Models\Cordinate;

class SaveCoordBtn extends Component
{
    public $cordlng;
    public $cordlat;
    public $cordtype;
    public $needtype;
    public $disabled;
    public $btn1 = 'add point' ;
    public $nbr = 0 ;



    protected $rules = [
        'cordlng' => 'required',
        'cordlat' => 'required'

    ];
    
    public function updateCoord(){
        
            \Session::flash('savedOrNot', 'Add A Point!'); 
            \Session::flash('color' , 'red');

        // dd($this->cordlng);
        $this->validate();
        $date = new DateTime;
        $date = $date->setTime(0,0);
        $date = $date->format('Y-m-d H:i:s');
        if(Cordinate::where('updated_at' , '>' , $date)->where('user_id' ,\Auth::id())->count() > 0){
            Cordinate::where('updated_at' , '>' , $date)->where('user_id' ,\Auth::id())->update(['lng'=>$this->cordlng , 'lat' => $this->cordlat]);
        }else{
        $user=auth()->user();
        $cord = new \App\Models\Cordinate;
        $cord->lng = $this->cordlng;
        $cord->lat = $this->cordlat;
        $cord->userType = $user->type;
        $cord->needType = $this->needtype;
        $cord->user_id = \Auth::id();
        $cord->save(); 
        }
        //disable save button when coord not available
        
        \Session::flash('savedOrNot', ' SAVED!'); 
        \Session::flash('color' , 'green');
    }

        public function render()
    {
        $date = new DateTime;
        $date = $date->setTime(0,0);
        $date = $date->format('Y-m-d H:i:s');
        if(Cordinate::where('updated_at' , '>' , $date)->where('user_id' ,\Auth::id())->count() > 0){

            $cords = Cordinate::where('updated_at' , '>' , $date)->where('user_id' ,\Auth::id())->first();
            $this->btn1 = ' change point';

            if($this->nbr == 0){
                $this->cordlng = $cords->lng;
                $this->cordlat = $cords->lat;
                $this->nbr++;
            }

        }

        return view('livewire.save-coord-btn' );
    }
}
