<?php

namespace App\Observers;

use App\Models\UserSettings;

class UserSettingsObserver
{
    /**
     * Handle the UserSettings "created" event.
     *
     * @param UserSettings $userSettings
     * @return void
     */
    public function creating(UserSettings $userSettings)
    {
        $userSettings->background_color = '#b9b0a1';
        $userSettings->name_color = '#ffffff';
        $userSettings->name_font = 'FuturaDemiCTT';
        $userSettings->name_font_size = 1.4;
        $userSettings->navigation_color = '#ffffff';
        $userSettings->show_logo = true;
        $userSettings->avatar_vs_logotype = 'avatar';
    }

    /**
     * Handle the UserSettings "updated" event.
     *
     * @param UserSettings $userSettings
     * @return void
     */
    public function updated(UserSettings $userSettings)
    {
        //
    }

    /**
     * Handle the UserSettings "deleted" event.
     *
     * @param UserSettings $userSettings
     * @return void
     */
    public function deleted(UserSettings $userSettings)
    {
        //
    }

    /**
     * Handle the UserSettings "restored" event.
     *
     * @param UserSettings $userSettings
     * @return void
     */
    public function restored(UserSettings $userSettings)
    {
        //
    }

    /**
     * Handle the UserSettings "force deleted" event.
     *
     * @param UserSettings $userSettings
     * @return void
     */
    public function forceDeleted(UserSettings $userSettings)
    {
        //
    }
}
