<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Joke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class JokeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jokes = Joke::all();
        return view('admin.jokes', ['jokes' => $jokes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "joke" => "required|string",
        ]);
        $validated = $validator->validated();
        $validated['user_id'] = auth()->user()->id;
        $result = Joke::create($validated);
        if ($result) {
            try {
                Mail::to(auth()->user()->email)->send(new TestEmail());
                return response()->json(['access' => 'Анекдот успешно отправлен.Проверьте почту.']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Письмо не удалось отправить.']);
            }
        } else {
            return response()->json(['error' => 'Письмо не удалось отправить.']);
        }
    }
}
