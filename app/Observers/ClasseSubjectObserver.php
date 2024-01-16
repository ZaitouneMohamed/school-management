<?php

namespace App\Observers;

use App\Models\class_subject;
use Illuminate\Support\Facades\Auth;

class ClasseSubjectObserver
{
    /**
     * Handle the class_subject "created" event.
     */
    public function created(class_subject $class_subject): void
    {
        //
    }

    public function creating(class_subject $class_subject)
    {
        $class_subject->created_by = Auth::user()->id;
    }

    /**
     * Handle the class_subject "updated" event.
     */
    public function updated(class_subject $class_subject): void
    {
        //
    }

    /**
     * Handle the class_subject "deleted" event.
     */
    public function deleted(class_subject $class_subject): void
    {
        //
    }

    /**
     * Handle the class_subject "restored" event.
     */
    public function restored(class_subject $class_subject): void
    {
        //
    }

    /**
     * Handle the class_subject "force deleted" event.
     */
    public function forceDeleted(class_subject $class_subject): void
    {
        //
    }
}
