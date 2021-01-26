<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('author.index');
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
        return redirect()->route('author.index');
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
            return 'Autoriaus trinti negalima, nes jis turi knygų';
        }
        $author->delete();
        return redirect()->route('author.index');
    }
}
