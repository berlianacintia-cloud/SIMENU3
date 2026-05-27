<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'role' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Authenticate user
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // LOGIN EMAIL & PASSWORD
        if (! Auth::attempt(
            $this->only('email', 'password'),
            $this->boolean('remember')
        )) {

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'Email atau password salah.',
            ]);
        }

        $user = Auth::user();

        // CEK ROLE LOGIN
        if ($user->role !== $this->role) {

            Auth::logout();

            throw ValidationException::withMessages([
                'role' => 'Role login tidak sesuai.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure login not rate limited
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Throttle key
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('email')) . '|' . $this->ip()
        );
    }
}