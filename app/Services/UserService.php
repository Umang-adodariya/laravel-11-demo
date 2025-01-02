<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserService
{
    public function createAdminUser($user)
    {
        $validator = Validator::make($user, [
            'name' => 'required|max:25|regex:/^[a-zA-Z ]*$/|string',
            'email' => ['required', 'string', 'email', Rule::unique('users')->whereNull('deleted_at')],
            'password' => ['required', 'string', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
        ]);

        if ($validator->fails()) {
            return ['message' => $validator->errors()->all(), 'status' => 0];
        }

        $userData = User::firstOrNew(['email' => $user['email']]);
        $userData->name = $user['name'];
        $userData->email = $user['email'];
        $userData->password = Hash::make($user['password']);
        $userData->save();
        $userData->assignRole(User::ROLE_ADMIN);

        return ['message' => [trans('messages.custom.create_admin_messages')], 'status' => 1];
    }
}


?>