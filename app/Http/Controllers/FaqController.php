<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{

    private $faq;
    public function __construct(Faq $faq){
        $this->faq = $faq;
    }

    public function index(){
        $faq = $this->faq->all();
        return view('system.faq.index',compact('faq'));
    }

    public function create(){
        return view('system.faq.create');
    }

    public function store(FaqRequest $request){
        $validateFaq = $request->validated();
        $this->faq->create($validateFaq);

        Alert::success('Success!', 'Faq Created Successfully');
        return redirect()->route('faq.index');
    }

    public function edit($id){
        $faq = $this->faq->findOrFail($id);
        return view('system.faq.edit',compact('faq'));
    }

    public function update(FaqRequest $request, $id){
        $faq = $this->faq->findOrFail($id);
        $validateFaq = $request->validated();
        $faq->update($validateFaq);

        Alert::success('Success!', 'Faq Updated Successfully');
        return redirect()->route('faq.index');
    }

    public function destroy($id){
        $faq = $this->faq->findOrFail($id);
        if($faq){
            $faq->delete();
            Alert::success('Success!', 'Faq Deleted Successfully');
        return redirect()->route('faq.index');
        }
    }
}
