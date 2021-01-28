<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Validator;
use View;

class AuthorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sort($type)
    {

        if ('name' == $type) {
            $authors = Author::orderBy('name')->get();
        }
        elseif ('surname' == $type) {
            $authors = Author::orderBy('surname')->get();
        }
        else {
            $authors = Author::all();
        }



        $html = View::make('author.authors_list')->with(['authors' => $authors])->render();

        return response()->json([
            'type' => $type,
            'list' => $html

        ]);

    }


    public function index(Request $r)
    {
        // $authors = Author::all(); // <--- is db paimame viska, bilekaip

        if ('name' == $r->sort) {
            $authors = Author::orderBy('name')->get();
        }
        elseif ('surname' == $r->sort) {
            $authors = Author::orderBy('surname')->get();
        }
        else {
            $authors = Author::all();
        }

        



        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $validator = Validator::make(

        $request->all(),
        [
            'author_name' => ['required', 'min:3', 'max:64'],
            'author_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'author_surname.required' => 'idek pavarde!',
            'author_surname.min' => 'per trumpas pavarde'
        ]

        );


        if ($validator->fails()) {

            $request->flash();
            return redirect()->back()->withErrors($validator);
            
        }
 
        
        
        
        $author = new Author;
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')->with('success_message', 'Naujas autorius '.$author->name.' '.$author->surname.' buvo labai sėkmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        
        $validator = Validator::make(

            $request->all(),
            [
                'author_name' => ['required', 'min:3', 'max:64'],
                'author_surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'author_surname.required' => 'idek pavarde!',
                'author_surname.min' => 'per trumpas pavarde'
            ]
    
            );
    
    
            if ($validator->fails()) {
    
                $request->flash();
                return redirect()->back()->withErrors($validator);
                
            }
        
        
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')->with('success_message', 'Autorius '.$author->name.' '.$author->surname.' buvo labai sėkmingai paredaguotas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author->authorBooks->count() > 0) {
            return redirect()->back()->with('info_message', 'Autoriaus '.$author->name.' '.$author->surname.' trinti negalima, nes jis turi knygų.');
        }
        $author->delete();
        return redirect()->route('author.index')->with('success_message', 'Autorius '.$author->name.' '.$author->surname.' buvo labai sėkmingai pašalintas iš bibliotekos.');
    }
}
