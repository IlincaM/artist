<?php
namespace App\Observers;

use App\Pages;

class PagesObserver
{
    
    /**
     * Listen to the Pages creating event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function creating(Pages $Pages)
    {
        //code...
    }

     /**
     * Listen to the Pages created event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function created(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages updating event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function updating(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages updated event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function updated(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages saving event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function saving(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages saved event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function saved(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages deleting event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function deleting(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages deleted event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function deleted(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages restoring event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function restoring(Pages $Pages)
    {
        //code...
    }

    /**
     * Listen to the Pages restored event.
     *
     * @param  Pages  $Pages
     * @return void
     */
    public function restored(Pages $Pages)
    {
        //code...
    }
}