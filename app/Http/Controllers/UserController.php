<?php

namespace App\Http\Controllers;
use DB;
use App\Models\book;
use App\Models\category;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showIndex(){
        $book=book::getData();
        $cate=category::getData();
        return view('frontend.index',['book'=>$book,'cate'=>$cate]);
    }
    public function showproduct(){
        $book=book::getData();
        $cate=category::getData();
        return view('frontend.product',['book'=>$book,'cate'=>$cate]);
    }
    public function showLoginUser(){
        $cate=category::getData();
        return view('frontend.login',['cate'=>$cate]);
    }
    public function showRegisterUser(){
        $cate=category::getData();
        return view('frontend.register',['cate'=>$cate,]);
    }
    public function showProDetail($idbook){
        $cate=category::getData();
        $detail=book::find($idbook);
       // dd($detail);
        return view('frontend.single',['cate'=>$cate,'detail'=>$detail]);
    }
    public function showContact(){
        $cate=category::getData();
        return view('frontend.contact',['cate'=>$cate]);
    }
    public function postLogin(Request $re){

        $re->validate([
            'id'=>'required',
            'email'=>'required|email|max:225',
            'password'=>'required|min:6'
        ],[
            'id.required'=>'Hãy điền mã khách hàng!',
            'email.required'=>'Chưa điền gmail!',
            'email.email'=>'Chuỗi nhập vào phải là gmail',
            'password.required'=>'Chưa điền mật khẩu',
            'password.min'=>'Độ dài ngắn nhất là 6 ký tự'
        ]);
        $data=user::find($re->id);
        //dd($data);
        //dd($re->all());
        if(!$data){
            session()->flash('mess','Khách hàng này không tồn tại!');
            return redirect()->route('user.showLogin');
        }
        if(md5($re->password) == $data->password){
            session()->put('login',['email'=>$data->email,'fullname'=>$data->fullname]);
            return redirect()->route('user.index');
        }else{
            session()->flash('mess','Đề nghị kiểm tra lại email hoặc password!');
            return redirect()->route('user.showLogin');
        }
    }
    public function logout(){
        session()->forget('login');
        return redirect()->route('user.showLogin');
    }

}
