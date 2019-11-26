<?php

namespace RssFeedGenerator;

use Carbon\Carbon;

interface FeedItem
{
    /**
     * Get the title of the feed item.
     *
     * @return string
     */
    public function title(): string;

    /**
     * The description of the RSS item.
     *
     * @return string
     */
    public function description(): string;

    /**
     * Get the accessible url of the feed item.
     *
     * @return string
     */
    public function url(): string;

    /**
     * Get the date on which the feed item was created.
     *
     * @return Carbon
     */
    public function createdAt(): Carbon;

    /**
     * Get the image of the feed item
     *
     * @return string
     */
    public function image(): ?string;
}
