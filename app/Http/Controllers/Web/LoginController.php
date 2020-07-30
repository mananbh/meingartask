<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;
use Validator;
use App\Jobs\SendEmail;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $arr_group = Book::all();
            return view('home', ['arr_group' => $arr_group]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }


    public function editbook(Request $request)
    {

        $id = $request->postid;
        //Find the employee
        $arr_group = Book::find($id);
        return response()->json($arr_group);
    }

    public function update(Request $request, Book $book)
    {
        $input = $request->all();
        $book = book::find($input['id']);
        $book->name = $input['name'];
        $book->author = $input['author'];
        $book->save();
        return response()->json(['code'=>200, 'message'=>'Book Update successfully','data' => $book], 200);    
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $book = Book::create($input);
        $data = $book->toArray();
        $details = ['email' => 'bhavsarmanan7@gmail.com'];
        SendEmail::dispatch($details);
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Book stored successfully.'
        ];

        return response()->json(['code'=>200, 'message'=>'Book Added successfully','data' => $book], 200);    
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return response()->json(['code'=>200, 'message'=>'User Created successfully'], 200);    
    }
    public function registerpage()
    {
        return view('register');

    }

}
