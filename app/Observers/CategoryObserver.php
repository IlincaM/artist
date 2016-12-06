<?php
namespace App\Observers;

use App\Category;

class CategoryObserver
{
    
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function creating(Category $Category)
    {
        //code...
    }

     /**
     * Listen to the Category created event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function created(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category updating event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function updating(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category updated event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function updated(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category saving event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function saving(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category saved event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function saved(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function deleting(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category deleted event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function deleted(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category restoring event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function restoring(Category $Category)
    {
        //code...
    }

    /**
     * Listen to the Category restored event.
     *
     * @param  Category  $Category
     * @return void
     */
    public function restored(Category $Category)
    {
        //code...
    }
}