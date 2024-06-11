<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

if (! function_exists('debugLog')) {
    /**
     * Add a new log file to the application.
     *
     * @param string $title
     * @param mixed $data
     * @return void
     */
    function debugLog(string $title, mixed $data): void
    {
        Log::info($title);
        Log::info(json_encode($data));
    }
}

if (! function_exists('getUserPanel')) {
    /**
     * Get the panel of the user
     *
     * @param Request $request
     * @return ?string
     */
    function getUserPanel(Request $request): ?string
    {
        if (! $request->user()) {
            return null;
        }

        $prefix = 'user';

        /** @var \App\Models\User $user */
        $user = $request->user();
        if ($user->hasRole(User::ROLE_SUPER_ADMIN)) {
            $prefix = 'app';
        } elseif ($user->hasRole(User::ROLE_ADMIN)) {
            $prefix = 'admin';
        }

        return $prefix;
    }
}
