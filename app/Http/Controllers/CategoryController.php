<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title = "مدیریت دسته بندی ها";
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('categories', compact('page_title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_title = 'ایجاد دسته بندی جدید';
        return view('create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //

        $messages = [
            'title.required' => 'فیلد عنوان را وارد نمایید',
            'title.unique' => 'فیلد عنوان تکراری است ، عنوان را عوض کنید',
            'title.max' => 'تعداد حروف مجاز حداکثر 20 کاراکتر است',
            'description.required' => 'شرح دسته بندی را وارد نمایید'
        ];

        $validatedData = $request->validate([
            'title' => 'required|unique:categories|max:100',
            'description' => 'required'
        ], $messages);

        $category = new Category([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'active' => $request->get('active')
        ]);

        try {
            $category->save();
        } catch (Exception $exception) {
            //throw $th;
            switch ($exception->getCode()) {
                case 23000:
                    $msg = "عنوان دسته بندی تکراری است ، عنوانی دیگر وارد کنید.";
                    break;
            }
            return redirect(route('categories'))->with('warning', $msg);
        }

        $msg = 'اضافه کردن دسته بندی جدید با موفقیت انجام شد';
        return redirect(route('categories'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $page_title = 'این صفحه مربوط به دسته بندی انتخاب شده است';
        return view('category', compact('page_title', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $page_title = 'ویرایش دسته بندی';
        return view('edit', compact('page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        try {
            $category->delete();
        } catch (Exception $exception) {
            return redirect(route('categories'))->with('warning', $exception->getCode());
        }
        $msg = 'دسته بندی موزد نظر با موفقیت حذف شد';
        return redirect(route('categories'))->with('delete', $msg);
    }
}
