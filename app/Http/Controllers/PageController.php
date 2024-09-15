<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }


    public function index()
    {
        $pages = $this->page->all();
        return view('system.dynamic.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('system.dynamic.pages.create');
    }

    public function store(PageRequest $request)
    {
        $validatePage = $request->validated();
        $slug = Str::slug($validatePage['title']['en']);
        $validatePage['status'] = 1;

        Page::create([
            'title' => [
                'en' => $validatePage['title']['en'],
                'np' => $validatePage['title']['np'],
            ],
            'description' => [
                'en' => $validatePage['description']['en'],
                'np' => $validatePage['description']['np'],
            ],
            'slug' => $slug,
            'status' => $validatePage['status']
        ]);
        Alert::success('Success', 'Page Created Successfully');
        return redirect()->route('pages.index');
    }

    public function edit($id)
    {
        $pages = Page::findOrFail($id);
        return view('system.dynamic.pages.edit', compact('pages'));
    }

    public function update(PageRequest $request, $id)
    {
        $pages = Page::findOrFail($id);
        $slug = Str::slug($request['title']['en']);
        $request['status'] = 1;

        $pages->update([
            'title' => [
                'en' => $request['title']['en'],
                'np' => $request['title']['np'],
            ],
            'description' => [
                'en' => $request['description']['en'],
                'np' => $request['description']['np'],
            ],
            'slug' => $slug,
            'status' => $request['status']
        ]);
        Alert::success('Success', 'Page Updated Successfully');
        return redirect()->route('pages.index');
    }

    public function destroy($id)
    {
        $page = page::findOrFail($id);
        if ($page) {
            $page->delete();
            Alert::success('Delete!', 'Page deleted successfully');
            return redirect()->route('pages.index');
        }
    }
}
