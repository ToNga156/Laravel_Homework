<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slides;
use App\Models\Comment;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slides::all();
        $newproducts = Product::where('new', 1)->paginate(4);
        $topproducts = Product::where('new', 0)->paginate(4);
        $promotion = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('page.home', compact('slide', 'newproducts', 'promotion', 'topproducts'));
    }

    public function getDetail(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();

        $splienquan = Product::where('id', '<>', $sanpham->id)
            ->where('id_type', '=', $sanpham->id_type)
            ->paginate(3);

        $comments = Comment::where('id_product', $request->id)->get();

        return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        $productType = ProductType::all();
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();

        return view('page.search_results', compact('products','productType'));
    }

    public function getIndexAdmin()
    {
        $products = Product::all();
        return view('pageadmin.admin')->with(['products' => $products, 'sumSold' => count(BillDetail::all())]);
    }

    public function getAdminAdd()
    {
        return view('pageadmin.formAdd');
    }

    public function postAdminAdd(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('inputImage')) {
            $file = $request->file('inputImage');
            $fileName = $file->getClientOriginalName('inputImage');
            $file->move('source/image/product', $fileName);
        }
        $file_name = null;
        if ($request->file('inputImage') != null) {
            $file_name = $request->file('inputImage')->getClientOriginalName();
        }

        $product->name = $request->inputName;
        $product->image = $file_name;
        $product->description = $request->inputDescription;
        $product->unit_price = $request->inputPrice;
        $product->promotion_price = $request->inputPromotionPrice;
        $product->unit = $request->inputUnit;
        $product->new = $request->inputNew;
        $product->id_type = $request->inputType;
        $product->save();
        return redirect()->to(session()->get('url.intended', url('/admin')));
    }
    public function postAdminDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
    public function getAdminEdit($id)
    {
        $product = Product::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }

    public function postAdminEdit(Request $request) 
{ 
    $id = $request->editId; 
    
    $product = Product::find($id); 
    if ($request->hasFile('editImage')) { 
        $file = $request->file('editImage'); 
        $fileName = $file->getClientOriginalName('editImage'); 
        $file->move('source/image/product', $fileName); 
    } 
    
    if ($request->file('editImage') != null) { 
        $product->image = $fileName; 
    } 
    
    $product->name = $request->editName; 
    $product->description = $request->editDescription; 
    $product->unit_price = $request->editPrice; 
    $product->promotion_price = $request->editPromotionPrice; 
    $product->unit = $request->editUnit; 
    $product->new = $request->editNew; 
    $product->id_type = $request->editType; 
    $product->save(); 
    
    return redirect()->to(session()->get('url.intended', url('/admin')));
}

    public function getAbout(){
        return view('page.about');
    }

    public function getContact(){
        return view('page.lienhe');
    }


    public function getLogin(){
        return view('users.login');
    }
    public function getSignup(){
        return view('users.register');
    }
    public function postLogin(StoreUserRequest $request){
        $email = $request->email;
        $password  = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->to(session()->get('url.intended', url('/page/trangchu')));
        }
    }

    public function postSignup(StoreUserRequest $request){
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }

}