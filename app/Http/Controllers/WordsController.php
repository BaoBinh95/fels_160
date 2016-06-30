<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Http\Requests;
use App\Http\Requests\WordCreateRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WordsController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::with('category')->paginate(config('settings.paging_number'));
        return view('admin.word.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('admin.word.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $word = new Word();
        $word->category_id = $request->category_id;
        $word->content = $request->content;
        $word->save();

        return redirect()->action('WordsController@index')->with('success', trans('session.word_add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::find($id);
        $categories = Category::lists('name', 'id');

        return view('admin.word.edit', compact('word', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $allRequest = $request->all();
        $word = Word::find($id);
        $word->update($allRequest);

        return redirect()->action('WordsController@index')->with('success', trans('session.word_edit_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $word = Word::find($id);
            $word->delete();

            return redirect()->action('WordsController@index')
                ->with('success', trans('session.word_delete_success'));
        } catch(Exception $e) {
            return redirect()->action('WordsController@index')
                ->with('errors', trans('session.word_delete_fail'));
        }
    }
}
