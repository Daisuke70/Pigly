<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;


class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.exists' => 'このメールアドレスは登録されていません',
            'password.required' => 'パスワードを入力してください',
        ];
    }

    public function authenticate()
    {
        $user = User::where('email', $this->email)->first();

        if ($user && !Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'パスワードが正しくありません。',
            ]);
        }

        if (!Auth::attempt($this->only('email', 'password'), $this->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => '認証に失敗しました。もう一度お試しください。',
            ]);
        }
    }
}
