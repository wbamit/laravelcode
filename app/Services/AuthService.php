<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Events\UserRegistered;

class AuthService
{
    protected UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {

            $user = $this->userRepository->create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make(
                    $data['password']
                ),
            ]);

            //event(new Registered($user));
            event(new UserRegistered($user));

            Auth::login($user);

            return $user;
        });
    }

    public function login(array $data)
    {
        $user = $this->userRepository
            ->findByEmail($data['email']);

        if (!$user) {
            return [
                'status' => false,
                'message' => 'User not found.'
            ];
            // throw new Exception(
            //     'Invalid credentials.'
            // );
        }

        if (!Hash::check( $data['password'], $user->password)) {
            return [
                'status' => false,
                'message' => 'Invalid email or password.'
            ];
        }

        //Auth::login($user);
        Auth::login(
            $user,
            $data['remember'] ?? false
        );

        // return $user;

        return [
            'status' => true,
            'message' => 'Logged in successfully.'
        ];
    }


    // public function login(array $data): array
    // {
    //     if (!Auth::attempt([
    //         'email' => $data['email'],
    //         'password' => $data['password']
    //     ])) {
    //         return [
    //             'status' => false,
    //             'message' => 'Invalid credentials.'
    //         ];
    //     }

    //     return [
    //         'status' => true,
    //         'message' => 'Logged in successfully.'
    //     ];
    // }
}