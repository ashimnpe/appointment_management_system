<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\Menu;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    private $feedback, $menu;
    public function __construct(Feedback $feedback, Menu $menu)
    {
        $this->feedback = $feedback;
        $this->menu = $menu;
    }

    public function view()
    {
        $menus = $this->menu->all();
        return view('system.feedback.view', compact('menus'));
    }

    public function index()
    {
        $feedback = $this->feedback->get();
        return view('system.feedback.index', compact('feedback'));
    }

    public function storeContact(FeedbackRequest $request)
    {
        $validateFeedback = $request->validated();
        $this->feedback->create($validateFeedback);
        Alert::success('Success', 'Feedback Recorded Successfully');
        return redirect()->route('/');
    }



    public function destroy($id)
    {
        $feedback = $this->feedback->findOrFail($id);
        $feedback->delete();
        Alert::success('Success', 'Feedback Deleted Successfully');
        return redirect()->route('feedback.index');
    }
}
