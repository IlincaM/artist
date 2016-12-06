<?php
namespace App\Observers;

use App\Subcategory;

class SubcategoryObserver
{
    
    /**
     * Listen to the Subcategory creating event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function creating(Subcategory $Subcategory)
    {
        //code...
    }

     /**
     * Listen to the Subcategory created event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function created(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory updating event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function updating(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory updated event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function updated(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory saving event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function saving(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory saved event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function saved(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory deleting event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function deleting(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory deleted event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function deleted(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory restoring event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function restoring(Subcategory $Subcategory)
    {
        //code...
    }

    /**
     * Listen to the Subcategory restored event.
     *
     * @param  Subcategory  $Subcategory
     * @return void
     */
    public function restored(Subcategory $Subcategory)
    {
        //code...
    }
}