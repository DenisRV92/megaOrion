<?php
namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{


    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        $data["password"] = Hash::make($data["password"]);

        try {
            $createdUser = User::create($data);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Не удалось создать нового пользователя.",
                "error" => $e->getMessage()
            ]);
        }
        return redirect()->route('showUser')->with('alerts', ['success' => 'Пользователь успешно изменен']);
    }

    public function indexAdmin()
    {
        $users = User::all();
        return view("admin.users", ['users' => $users]);
    }
}
