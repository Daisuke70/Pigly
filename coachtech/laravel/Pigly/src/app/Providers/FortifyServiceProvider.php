<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Support\Facades\Route;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

            Fortify::registerView(function () {
                return view('auth.register_step1');
            });

            Route::get('/register/step2', function () {
                return view('auth.register_step2');
            })->middleware(['web'])->name('register.step2');

            Fortify::loginView(function () {
                return view('auth.login');
            });

            RateLimiter::for('login', function (Request $request) {
                $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
            });

            $this->app->singleton(LogoutResponse::class, function () {
                return new class implements LogoutResponse {
                    public function toResponse($request)
                    {
                        return redirect('/login');
                    }
                };
            });

            Fortify::authenticateUsing(function (Request $request) {
                $user = User::where('email', $request->email)->first();
                if (!$user || !Hash::check($request->password, $user->password)) {
                    throw ValidationException::withMessages([
                        'email' => 'メールアドレスまたはパスワードが正しくありません。',
                    ]);
                }
                return redirect('/login');
            });
    }
}
