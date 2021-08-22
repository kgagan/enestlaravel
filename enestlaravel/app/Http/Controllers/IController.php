<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Signup;
use App\Models\Cart;
use App\Models\Contact;
use DB;
use Session;

class IController extends Controller
{
    public function index(){
        $category = Category::all();
        $product = Product::all();
        return view('enest/index',compact('category','product'));
    }

    public function display_category($id){
        $category = Category::all();
        $data = Product::where('categoryid',$id)->get();
        $cat_name = Category::where('id',$id)->get();
        //echo "<pre>" ; print_r($data) ; die;
        return view('enest/products',compact('data','category','cat_name'));
    }
    public function buy_product($id){
        $category = Category::all();
        $product = Product::where('id',$id)->get();
        return view('enest/buy-product',compact('product','category'));
    }
    public function new_products(){
        $category = Category::all();
        $data=Product::orderby('id','desc')->get();  
        return view('enest/new-product',compact('data','category'));
    }
    public function special_products(){
        $category = Category::all();
        $data=Product::where('special','=',1)->get();
        return view('enest/special',compact('data','category'));
    }
    public function all_products(){
        $category = Category::all();
        $data=Product::inRandomOrder()->get();
        return view('enest/all-products',compact('data','category'));
    }
    public function contact(){
        $category = Category::all();
        return view('enest/contact',compact('category'));
    }
    public function login(){
        return view('enest/login');
    }
    public function signup(Request $req)
	{
		if($req->isMethod('post'))
		{
		  $ob=new Signup;
		  $ob->fullname=$req->name;
		  $ob->email=$req->email;
		  $ob->password=$req->password;
		  $ob->save();
		}
		return view('enest/login');
	}
    public function login_user(Request $req)
	{
		if($req->isMethod('post'))
		{
		  $username = $req->username;
		  $password = $req->password;
          $users=DB::select('select * from signup where fullname=? and password=?',[$username,$password]);
          $uid = $users[0]->id;
		  if($users)
            { 
                session()->put('userid',$uid);
                //$query=session()->get('userid');
                return redirect()->to('/');
            }
            else
            {
                //echo "login not successfully";
                return view('enest/login');
            }
		}
	}
    public function logout()
	{
	    Session::flush();
		return redirect()->to('/login');
	}
    public function quantity(Request $req){
        if($req->isMethod('post'))
		{
            $ob=new Cart;
            $ob->userid = $req->uid;
            $ob->productid = $req->pid;
            $ob->qty = $req->quantity;
            $ob->save();
        }
        $category = Category::all();
        $product = Product::where('id',$req->pid)->get();
        return view('enest/buy-product',compact('product','category'));
    }
    public function checkout($uid)
	{
		$check=DB::table('cart')
		->join('signup','cart.userid','=','signup.id')
		->join('product','cart.productid','=','product.id')
		->select('cart.id','product.productname','signup.fullname','cart.qty')
		->where('cart.userid','=',$uid)->get();
        $category = Category::all();
        return view('enest/checkout',compact('check','category'));
	}
    public function contactus(Request $req){
        if($req->isMethod('post'))
		{
            $ob=new Contact;
            $ob->fullname = $req->name;
            $ob->email = $req->email;
            $ob->message = $req->message;
            $ob->save();
        }
        $category = Category::all();
        return view('enest/contact',compact('category'));
    }
    public function search(Request $req){
        if($req->isMethod('post'))
		{
            $search = $req->search;
            $data=Product::where('productname','LIKE','%'.$search.'%')->get();
        }
        $category = Category::all();
        return view('enest/search',compact('category','data'));
    }
}
