<?php

namespace App\Http\Controllers;
use DB;
use App\Models\admin;
use App\Models\book;
use App\Models\category;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function showLogin()
    {
        return view('backend.login');
    }
    public function showRegister(){
        return view('backend.register');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|max:50|min:4',
        ]);
        $dataAdmin=admin::where("email",$request->email)->where("password",$request->password)->first();
       // dd($dataAdmin);
        if($dataAdmin!=NULL){
            $_SESSION['admin']=$dataAdmin;
            return view('backend.index');
        }else{
            $request->session()->flash('fail', 'Đăng nhập không thành công');
            return redirect()->route('ad.showLogin');
        }
    }
    public function register(Request $request){
        $request->validate([
            'fullname'=>'required',
            'email'=>'required|email|unique:admin,email',
            'password'=>'required|max:50|min:4'
        ]);
        $createdata=[
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        return view('backend.login',['data'=>admin::insert($createdata)]);
    }
    public function logout(){
        session()->forget('admin');
        return view('backend.login');
    }
    //product
    public function product(){
        return view('backend.product',['book'=>DB::table('book')->get()]);
    }
    public function getpro(){
        return view('backend.addpro',['category'=>DB::table('category')->get()]);
    }
    public function addpro(Request $request){
        // return view('backend.qlsp',['book'=>DB::insert('insert into book (idbook, namebook, id_category, detailbook, description, price, price_saleoff, image, status)
        //                                                         values (?, ?, ?, ?, ?, ?, ?, ?, ?)')]);
        $request->validate([
            'idbook'=>'required|unique:book|max:15',
            'namebook'=>'required',
            'image'=>'image|mimes:png,jpg,gif,jpeg|max:2048',
            'quantity'=>'required',
        ],
        [
            'idbook.unique'=>'Idbook already exist!',
            'idbook.required'=>'Idbook is empty',
            'namebook.required'=>'Namebook is empty',
            'quantity.required'=>'Quantity cant null',
        ]);

        $nameimage = $request->image->getClientOriginalName();
        $request->image->move(public_path('frontend/images'),$nameimage);
        $data = $request->all();
        $data['image']= $nameimage;
            // dd($book);
        book::create($data);
        return redirect()->route('ad.product');
    }
    public function deletepro($idbook){
        // return view('backend.qlsp',['book'=>DB::delete('delete book where idbook=?', [$id])]);
        book::where('idbook',$idbook)->delete();
        return redirect()->route('ad.product');
    }
    public function geteditpro($idbook){
        $category=DB::table('category')->get();
        $book=DB::table('book')->where('idbook',$idbook)->first();
        return view('backend.editpro',['category'=>$category,'book'=>$book]);
    }
    public function editpro(Request $request){
        $book = book::find($request->idbook);
        $book->namebook = $request->namebook;
        $book->id_category = $request->id_category;
        $book->detailbook = $request->detailbook;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->price_saleoff = $request->price_saleoff;
        $book->quantity= $request->quantity;
        $book->image = $request->image->getClientOriginalName();
        $request->image->move(public_path('frontend/images'),$book->image);
        $book->status = $request->status;
        $book->save();
            // dd($book);
        return redirect()->route('ad.product');
    }
    //category
    public function category(){
        return view('backend.category', ['category'=>DB::table('category')->get()]);
    }
    public function getcate(){
        return view('backend.addcate');
    }
    public function addcate(Request $request){
        $request->validate([
            'id'=>'required|unique:category|max:15',
            'name'=>'required',
        ],
        [
            'id.unique'=>'Id already exist!',
            'id.required'=>'Id is empty',
            'name.required'=>'Name is empty'
        ]);
        $c = new category();
        $c->id = $request->id;
        $c->name = $request->name;
        $c->status = $request->status;
        $c->save();
        return redirect()->route('ad.category');
    }
    public function delcate($id){
        category::where('id',$id)->delete();
        return redirect()->route('ad.category');
    }
    public function geteditcate($id){
        return view('backend.editcate',['category'=>DB::table('category')->find($id)]);
    }
    public function editcate(Request $request){
        // $id = $request->input('id');
        // $name = $request->input('name');
        // DB::table('category')->find($id)->update([
        //     'id' => $id,
        //     'name' => $name
        // ]);
        // DB::table('category')->get();
        // return redirect()->route('ad.category');
            $obj = category::find($request->id);
            $obj->name = $request->name;
            $obj->save();
            return redirect()->route('ad.category');
    }
    //Order
    public function order(){
        return view('backend.order',['order'=>DB::table('order')->get()]);
    }
    //User
    public function user(){
        return view('backend.user',['user'=>DB::table('user')->get()]);
    }
    //Admin
    public function admin(){
        return view('backend.admin',['admin'=>DB::table('admin')->get()]);
    }
}
