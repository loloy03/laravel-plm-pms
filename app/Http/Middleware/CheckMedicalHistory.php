<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;

class CheckMedicalHistory
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is a student and doesn't have a record in "med_history"
        if ($request->user() && $this->isStudent($request->user()) && !$this->hasMedicalHistory($request->user())) {
            return redirect('/medicalhistory');
        }

        return $next($request);
    }

    private function hasMedicalHistory($user)
    {
        return MedicalHistory::where('user_id', $user->id)->exists();
    }

    private function isStudent($user)
    {
        return $user->user_type === 'student';
    }
}
