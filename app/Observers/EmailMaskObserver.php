<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Str;

class EmailMaskObserver
{
    /**
     * Handle the Student "created" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function created(Student $student)
    {
        //
    }

    /**
     * Handle the Student "updated" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }

    public function saving(Student $student)
    {
        $student->email = $this->maskEmail($student->email);
    }

    private function maskEmail($email)
    {
        $parts = explode('@', $email);
        $username = $parts[0];
        $maskedUsername = Str::substr($username, 0, 2) . '*****'; // You can use your masking logic here
        $domain = $parts[1];
        return $maskedUsername . '@' . $domain;
    }
}
