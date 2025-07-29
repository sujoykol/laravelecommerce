<?php

namespace App\Observers;

use App\Models\Page;

use Illuminate\Support\Str;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function creating(Page $page)
    {
        $slug = Str::slug($page->name);
        $original = $slug;
        $count = 1;

        while (Page::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        $page->slug = $slug;
    }

    /**
     * Handle the Page "updated" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function updating(Page $page)
    {
        if ($page->isDirty('name')) {
            $page->slug = Str::slug($page->name);
        }
    }

    /**
     * Handle the Page "deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        //
    }

    /**
     * Handle the Page "restored" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        //
    }

    /**
     * Handle the Page "force deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        //
    }
}
