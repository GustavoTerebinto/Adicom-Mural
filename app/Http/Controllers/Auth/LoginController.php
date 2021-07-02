<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Model\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'user'     => strtolower($request->input('username')),
            'password' => $request->input('password'),
        ];

        $auth = new \CCUFFS\Auth\AuthIdUFFS();
        $userData = $auth->login($credentials);
        
        if (!$userData) {
            return redirect()->route('login')->withErrors([
                'credential' => 'Login ou senha inválidos, por favor verifique os dados e tente novamente.'
            ]);
        }

        $credentials = [
            'username' => $userData->username,
            'password' => $userData->pessoa_id,
        ];

        if (! $token = auth('api')->attempt($credentials)) {
            $user = $this->getLocalUserFromUserData($userData);

            if (! $token = auth('api')->attempt($credentials)) {
                return redirect()->route('login')->withErrors(['credential' => 'Usuário não autorizado']);
            }
        }

        $user = $this->getLocalUserFromUserData($userData);
        $token = $this->respondWithToken($token);
        Session::put('token',$token);
        Auth::login($user);
        
        return view('index')->with('token', Session::get('token'));
    }

    protected function getLocalUserFromUserData($userData)
    {
        $userData->password = bcrypt($userData->pessoa_id);
        $user = $this->getOrCreateUser($userData);

        return $user;
    }

    protected function respondWithToken($token)
    {
        return json_encode([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 * 8
        ]);
    }

    public function logout(Request $resquest)
    {
        Session::forget('token');
        Auth::logout();
        return redirect()->intended('login');
    }

    public function refresh()
    {
        $token = $this->respondWithToken(auth('api')->refresh());
        return view('index')->with('token',Session::get('token'));
    }

    private function getOrCreateUser($data)
    {
        $user = User::where('uid', $data->uid)->first();
        $data = [
            'username' => $data->username,
            'password' => $data->password,
            'email' => $data->email,
            'uid' => $data->uid,
            'name' => $data->name,
            'cpf' => $data->cpf
        ];

        if ($user) {
            $user->update($data);
        } else {
            $user = User::create($data);
        }

        return $user;
    }
}
