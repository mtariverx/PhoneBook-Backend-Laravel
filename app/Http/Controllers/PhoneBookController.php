<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\PhoneBook;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $phone_books = PhoneBook::all();
        return $phone_books;
    }
    public function getAllPhoneNumbers()
    {
        //
        $phone_books = PhoneBook::all();
        return $phone_books;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // 'phone_number'=>'required|max:15|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
            'phone_number' => 'required|max:15'
        ]);
        $phone_book = new PhoneBook([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone_number' => $request->get('phone_number')
        ]);
        error_log($phone_book);
        $phone_book->save();
        return $phone_book;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $phone_book = PhoneBook::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        error_log('update');
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|max:15'
        ]);
        // $phone_book=PhoneBook::find($id);
        $phone_book = PhoneBook::where('first_name', $request->get('first_name'))->where('last_name', $request->get('last_name'))->first();
        $phone_book->phone_number = $request->get('phone_number');
        $phone_book->save();
        error_log($phone_book);
        return $phone_book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $phone_book = $phone_book = PhoneBook::where('phone_number', $request->get('phone_number'))->first();
        $phone_book->delete();
        return "success";
    }
}
