<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use App\Utilities\StatusCode;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get defined status code
     *
     * @var object
     */
    protected $statusCode;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StatusCode $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @param Request $request
     */
    public function register(Request $request)
    {

        if (!$request->isJson()) {
            return response()->json([
                'errors' => [
                    'body' => 'Data body not acceptable'
                ],
                'response' => [
                    'status' => (string) $this->statusCode->badRequest(),
                    'message' => 'Bad Request',
                ],
            ])->setStatusCode($this->statusCode->badRequest());
        }

        $data = $request->all();

        $validator = $this->validator($data);

        if (count($validator->errors()) > 0) {
            return response()->json([
                'errors' => $validator->errors(),
                'response' => [
                    'status' => (string) $this->statusCode->badRequest(),
                    'message' => 'Bad Request',
                ],
            ])->setStatusCode($this->statusCode->badRequest());
        }

        $register = $this->create($data);

        if ($register) {
            return (new UserResource($register))->additional([
                'response' => [
                    'code' => (string) $this->statusCode->created(),
                    'message' => 'Created',
                ]
            ]);
        }

        return response()->json([
            'response' => [
                'status' => $this->statusCode->inServerError(),
                'message' => 'Something went wrong',
            ],
        ])->setStatusCode(
            $this->statusCode->inServerError(),
            'Something went wrong'
        );
    }
}