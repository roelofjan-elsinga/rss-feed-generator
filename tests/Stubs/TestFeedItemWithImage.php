<?php

namespace RssFeedGenerator\Tests\Stubs;

use RssFeedGenerator\FeedItem;
use Carbon\Carbon;

class TestFeedItemWithImage implements FeedItem
{
    /**
     * Get the title of the feed item.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Article title';
    }

    /**
     * The description of the RSS item.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Article description';
    }

    /**
     * Get the accessible url of the feed item.
     *
     * @return string
     */
    public function url(): string
    {
        return 'articles/test-article';
    }

    /**
     * Get the date on which the feed item was created.
     *
     * @return Carbon
     */
    public function createdAt(): Carbon
    {
        return Carbon::now()->subDay();
    }

    /**
     * Get the image of the feed item
     *
     * @return string
     */
    public function image(): ?string
    {
        return "https://google.com/image.jpg";
    }
}
