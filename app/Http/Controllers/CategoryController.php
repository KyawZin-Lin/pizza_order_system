<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    //direct to Category index
    public function index()
    {
        $categories = Category::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    //direct to Category create page
    public function create()
    {
        return view('admin.category.create');
    }

    public function storeValidation()
    {
        return $validated = request()->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);
    }
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $this->storeValidation();

        $category->save();

        return redirect(route('category#index'))->with('message', 'Category was Added');
    }

    public function edit($id){
        $category =  Category::findOrFail($id);

        // $category = Category::where('category_id', $id)->first();
        return view('admin.category.edit',compact('category'));
    }
    // public function updateValidation($id)
    // {
    //     return $validated = request()->validate([
    //         'name' => 'required|unique:categories,name|max:255'. $id,
    //     ]);
    // }

    public function updateValidation($id){
        $validated = request()->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,

        ]);}
    public function update($id ,Request $request){

        $category = Category::findOrFail($id);
        $this->updateValidation($id);
        $category->name = request()->name;
        $category->update();
        // $category=$this->requestCategoryData($request);
        // $this->storeValidation();
        // Category::where('category_id', $id)->update($category);

        return redirect(route('category#index'))->with('message','Category was updated');
    }
    //Array Change method
        public function requestCategoryData($request){
            return [
                'name'=>$request->name
            ];
        }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();


        return redirect(route('category#index'))->with('message', 'Category was Deleted');
    }


}
