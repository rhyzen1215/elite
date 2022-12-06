<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tables\crews;
use App\Models\Tables\documents;
use App\Models\Tables\access;

class BladeController extends Controller
{
  public function loginform(){
    return view('user-login');
  }
  //Crew Post Request
  public static function formRequest(Request $request){
    $type = $request->crewtype;
    $error = array();
    $error['code'] = 0;
    $error['msg'] = "";
    if($type == "newcrew"){
      //Add New Crew
      $data = (array) $request->all();
      foreach($data as $key => $val){
        if($key != "crewid"){
          if($val == null){
            $error['code'] = 1;
          }
        }

      }
      if($error['code'] > 0){
        $error['msg'] = "Please complete the form";
        return $error;
      }
      else {
        $count = crews::select()->where('email','=',$data['email'])->get()->count();
        if($count == 0){
          $crews = new crews;
          $crews->firstname = $data['firstname'];
          $crews->middlename = $data['middlename'];
          $crews->lastname = $data['lastname'];
          $crews->email = $data['email'];
          $crews->education = $data['education'];
          $crews->address = $data['address'];
          $crews->contact = $data['contact'];
          $crews->created_at = date('Y-m-d h:i:s');
          $crews->updated_at = date('Y-m-d h:i:s');
          $crews->save();
          $error['msg'] = "Crew successfully added!";
        }
        else {
          $error['msg'] = "Cannot save crew, email already added!";
        }

      }
      return $error;
    }
    else if($type == "updatecrew"){
      //Update Crew
      $data = (array) $request->all();
      foreach($data as $key => $val){
        if($key != "crewid"){
          if($val == null){
            $error['code'] = 1;
          }
        }

      }
      if($error['code'] > 0){
        $error['msg'] = "Please complete the form";
        return $error;
      }
      else {
        $count = crews::select()->where('id','=',$data['crewid'])->get()->count();
        if($count > 0){
          crews::where('id','=',$data['crewid'])->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'middlename' => $data['middlename'],
            'email' => $data['email'],
            'address' => $data['address'],
            'education' => $data['education'],
            'contact' => $data['contact'],
            'updated_at' => date('Y-m-d h:i:s'),
          ]);
          $error['msg'] = "Crew successfully Updated!";
        }
        else {
          $error['msg'] = "Crew not found";
        }

      }
      return $error;
    }
    else if($type == "getcrew"){
      //Get Crew By ID
      $id = $request->id;
      $data = crews::select()->where('id','=',$id)->get()->toArray();
      if(isset($data[0])) $error['msg'] = $data[0];
      else {
        $error['code'] = 1;
        $error['msg'] = "Crew not found";
      }
      return $error;
    }
    else if($type == "listcrew"){
      //Get Crew List
      $data = crews::select()->get()->toArray();
      $error['msg'] = $data;
      return $error;
    }
    else if($type == "deletecrew"){
      //Delete Crew
      $id = $request->id;
      $data = crews::select()->where('id','=',$id)->delete();
      $error['msg'] = "Crew deleted";
      return $error;
    }
    else if($type == "newdoc"){
      //Add New Doc
      $data = (array) $request->all();
      foreach($data as $key => $val){
        if($key != "docid"){
          if($val == null){
            $error['code'] = 1;
          }
        }

      }
      if($error['code'] > 0){
        $error['msg'] = "Please complete the form";
        return $error;
      }
      else {
        $count = documents::select()->where('code','=',$data['code'])->get()->count();
        if($count == 0){
          $crews = new documents;
          $crews->crewid = $data['crewid'];
          $crews->code = $data['code'];
          $crews->docname = $data['docname'];
          $crews->docnum = $data['docnum'];
          $crews->dateissued = $data['dateissued'];
          $crews->dateexpire = $data['dateexpire'];
          $crews->remarks = $data['remarks'];
          $crews->created_at = date('Y-m-d h:i:s');
          $crews->updated_at = date('Y-m-d h:i:s');
          $crews->save();
          $error['msg'] = "Document successfully added!";
        }
        else {
          $error['msg'] = "Cannot save document, code already added!";
        }

      }
      return $error;
    }
    else if($type == "listdoc"){
      //Get Doc List
      $id = $request->crewid;
      $data = documents::select()->where('crewid','=',$id)->get()->toArray();
      $error['msg'] = $data;
      return $error;
    }
    else if($type == "getdoc"){
      //Get Doc By ID
      $id = $request->id;
      $data = documents::select()->where('id','=',$id)->get()->toArray();
      if(isset($data[0])) $error['msg'] = $data[0];
      else {
        $error['code'] = 1;
        $error['msg'] = "Crew not found";
      }
      return $error;
    }
    else if($type == "updatedoc"){
      $data = (array) $request->all();
      foreach($data as $key => $val){
        if($val == null){
          $error['code'] = 1;
        }
      }
      if($error['code'] > 0){
        $error['msg'] = "Please complete the form";
        return $error;
      }
      else {
        $count = documents::select()->where('id','=',$data['docid'])->get()->count();
        if($count > 0){
          documents::where('id','=',$data['docid'])->update([
            'crewid' => $data['crewid'],
            'code' => $data['code'],
            'docname' => $data['docname'],
            'docnum' => $data['docnum'],
            'dateexpire' => $data['dateexpire'],
            'dateissued' => $data['dateissued'],
            'remarks' => $data['remarks'],
            'updated_at' => date('Y-m-d h:i:s'),
          ]);
          $error['msg'] = "Document successfully Updated!";
        }
        else {
          $error['msg'] = "Document not found";
        }

      }
      return $error;
    }
    else if($type == "deletedoc"){
      $id = $request->id;
      $data = documents::select()->where('id','=',$id)->delete();
      $error['msg'] = "Documnet deleted";
      return $error;
    }
    else if($type == "adduser"){
      //Add New Crew
      $data = (array) $request->all();
      foreach($data as $key => $val){
          if($val == null){
            $error['code'] = 1;
          }
      }
      if($data['password'] != $data['password2']){
        $error['msg'] = "Passwords do not match";
        return $error;
      }
      if($error['code'] > 0){
        $error['msg'] = "Please complete the form";
        return $error;
      }
      else {
        $count = access::select()->where('email','=',$data['email'])->get()->count();
        if($count == 0){
          $crews = new access;
          $crews->username = $data['username'];
          $crews->email = $data['email'];
          $crews->password = $data['password'];
          $crews->level = $data['level'];
          $crews->created_at = date('Y-m-d h:i:s');
          $crews->updated_at = date('Y-m-d h:i:s');
          $crews->save();
          $error['msg'] = "User successfully added!";
        }
        else {
          $error['msg'] = "Cannot save user, email already added!";
        }

      }
      return $error;
    }
    else if($type == "listuser"){
      //Get Crew List
      $data = access::select()->get()->toArray();
      if(sizeof($data) > 0){
        foreach($data as $k => $v){
          if($v['level'] == "A") $data[$k]['userlevel'] = "Admin";
          else if($v['level'] == "U") $data[$k]['userlevel'] = "User";
        }
      }
      $error['msg'] = $data;
      return $error;
    }
    else if($type == "getuser"){
      //Get Crew By ID
      $id = $request->id;
      $data = access::select()->where('id','=',$id)->get()->toArray();
      if(isset($data[0])) $error['msg'] = $data[0];
      else {
        $error['code'] = 1;
        $error['msg'] = "User not found";
      }
      return $error;
    }
    else if($type == "updateuser"){
      $data = (array) $request->all();
      foreach($data as $key => $val){
        if($val == null){
          $error['code'] = 1;
        }
      }
      if($data['password'] != $data['password2']){
        $error['msg'] = "Passwords do not match";
        return $error;
      }
      if($error['code'] > 0){
        $error['msg'] = "Please complete the form";
        return $error;
      }
      else {
        $count = access::select()->where('email','=',$data['email'])->get()->count();
        if($count > 0){
          access::where('email','=',$data['email'])->update([
            'username' => $data['username'],
            'password' => $data['password'],
            'level' => $data['level'],
            'updated_at' => date('Y-m-d h:i:s'),
          ]);
          $error['msg'] = "USer successfully Updated!";
        }
        else {
          $error['msg'] = "USer not found";
        }

      }
      return $error;
    }
    else if($type == "deleteuser"){
      $id = $request->id;
      $data = access::select()->where('id','=',$id)->delete();
      $error['msg'] = "User deleted";
      return $error;
    }
    else if($type == "login"){
      //Login Form Request
      $pass = $request->password;
      $data = access::select()->where('email','=',$request->email)->get()->toArray();
      if(isset($data[0])){
        $data = $data[0];
        $password = $data['password'];
        if($pass == $password){
          session(['loginelite' => $data]);
        }
        else {
          session(['loginelite' => null]);
          $error['code'] = 1;
        }
      }
      else {
        session(['loginelite' => null]);
        $error['code'] = 1;
      }
      return $error;
    }
    else if($type == "logout"){
      //Logout Request
      session(['loginelite' => null]);
      return 0;
    }
  }

  public function crew(){
    $logindata = session('loginelite');
    if($logindata == null) return redirect('/elite/login');
    $accessleveldata = $logindata['level'];
    return view('crew',compact('logindata','accessleveldata'));
  }
}
