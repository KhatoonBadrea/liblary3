<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

       
      
        if($request->type == 'admin'){
            $guardName= 'admin';
        }
       
        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'admin'){
            return redirect()->intended(RouteServiceProvider::ADMIN);
       
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
