<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Module;
use App\Models\Page;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    private $menu, $module, $page;
    public function __construct(Menu $menu, Module $module, Page $page)
    {
        $this->menu = $menu;
        $this->module = $module;
        $this->page = $page;
    }
    public function index(){
        $menus =  $this->menu->orderBy('order','ASC')->get();
        return view('system.dynamic.menu.index',compact('menus'));
    }

    public function create(){
        $modules = $this->module->all();
        $pages = $this->page->all();
        return view('system.dynamic.menu.create',compact('modules','pages'));
    }

    public function store(MenuRequest $request){
         $this->menu->create([
            'name' => $request['name'],
            'order' => $request['order'],
            'type' => $request['type'],
            'module_id' => $request['module_id'] ?? NULL,
            'page_id' => $request['page_id'] ?? NULL,
            'external_link' => $request['external_link'] ?? NULL,
            'status' => $request['status'],
        ]);

        Alert::success('Success','Menu Created Successfully');
        return redirect()->route('menu.index');
    }

    public function edit($id){
        $modules = $this->module->all();
        $pages = $this->page->all();
        $menus =  $this->menu->findOrFail($id);
        return view('system.dynamic.menu.edit',compact('menus','modules','pages'));
    }

    public function update(MenuRequest $request, $id){
        $menus =  $this->menu->findOrFail($id);
        $menus->update([
            'name' => $request['name'],
            'order' => $request['order'],
            'type' => $request['type'],
            'module_id' => $request['module_id'],
            'page_id' => $request['page_id'],
            'external_link' => $request['external_link'],
            'status' => $request['status'],
        ]);
        Alert::success('Success','Menu Updated Successfully');
        return redirect()->route('menu.index');
    }

    public function destroy($id){
        $menu =  $this->menu->findOrFail($id);
        if($menu){
            $menu->delete();
            Alert::success('Success','Menu Deleted Successfully');
            return redirect()->route('menu.index');
        }

    }
}
