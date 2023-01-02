<?php
namespace ParthShukla\UserManagement;

use Illuminate\Support\ServiceProvider;

/**
 * UserManagementServiceProvider
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class UserManagementServiceProvider extends ServiceProvider
{

    /**
     * Boot method
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'ps-usrmgmt');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ps-usrmgmt');
    }

    //-------------------------------------------------------------------------

    /**
     * Register method
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ps-usrmgmt');
    }
}
// end of class UserManagementServiceProvider
// end of file UserManagementServiceProvider.php
