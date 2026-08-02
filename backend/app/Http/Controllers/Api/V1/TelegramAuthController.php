<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TelegramAuthRequest;
use App\Models\User;

class TelegramAuthController extends Controller
{
    public function auth(TelegramAuthRequest $request)
    {
        $data = $request->validated();
        $initData = $data['initData'];

        if (!$this->verify($initData)) {
            return response()->json([
                'message' => 'Invalid Telegram data'
            ], 401);
        }

        parse_str($initData, $params);

        $userData = json_decode($params['user'], true);

        if (now()->timestamp - (int) $params['auth_date'] > 86400) {
            return response()->json([
                'message' => 'Auth data expired'
            ], 401);
        }

        $user = User::updateOrCreate(
            ['telegram_id' => $userData['id']],
            [
                'name' => $userData['first_name'] . ' ' . ($userData['last_name'] ?? ''),
                'username' => $userData['username'] ?? null,
                'avatar' => $userData['photo_url'] ?? null
            ]
        );

        $token = $user->createToken('telegram-auth')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function verify(string $initData): bool
    {
        parse_str($initData, $params);

        if (empty($params['hash'])) {
            return false;
        }

        $hash = $params['hash'];
        unset($params['hash']);

        ksort($params);

        $dataCheckString = collect($params)
            ->map(fn ($value, $key) => "{$key}={$value}")
            ->implode("\n");

        $secretKey = hash_hmac('sha256', config('services.telegram.bot_token'), 'WebAppData', true);
        $computedHash = hash_hmac('sha256', $dataCheckString, $secretKey);

        return hash_equals($computedHash, $hash);
    }
}
