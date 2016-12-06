<?php
namespace App\Observers;

use App\Posts;

class PostsObserver
{
    
    /**
     * Listen to the Posts creating event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function creating(Posts $Posts)
    {
        //code...
    }

     /**
     * Listen to the Posts created event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function created(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts updating event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function updating(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts updated event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function updated(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts saving event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function saving(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts saved event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function saved(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts deleting event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function deleting(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts deleted event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function deleted(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts restoring event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function restoring(Posts $Posts)
    {
        //code...
    }

    /**
     * Listen to the Posts restored event.
     *
     * @param  Posts  $Posts
     * @return void
     */
    public function restored(Posts $Posts)
    {
        //code...
    }
}