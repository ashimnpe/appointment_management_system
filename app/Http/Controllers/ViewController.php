<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\Page;

class ViewController extends Controller
{
    private $menus, $faq;
    public function __construct(Menu $menus, Faq $faq)
    {
        $this->menus = $menus;
        $this->faq= $faq;
    }

    public function index(){
        $menus = $this->menus->orderBy('order','ASC')->get();
        $departments = Department::all();
        $faq = $this->faq->get();
        return view('index',compact('menus','faq','departments'));
    }

    public function dynamicView($id){
        $menus = $this->menus->orderBy('order','ASC')->get();
        $page = Page::findOrFail($id);
        return view('dynamicpage.page',compact('menus','page'));
    }
}
