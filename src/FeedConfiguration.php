<?php

namespace RssFeedGenerator;

use Carbon\Carbon;

interface FeedConfiguration
{
    /**
     * The title of the RSS Feed.
     *
     * @return string
     */
    public function title(): string;

    /**
     * The description of the RSS Feed.
     *
     * @return string
     */
    public function description(): string;

    /**
     * The URL of the website for which this RSS Feed is generated.
     *
     * @return string
     */
    public function siteUrl(): string;

    /**
     * The URL at which this feed can be accessed.
     *
     * @return string
     */
    public function feedUrl(): string;

    /**
     * The date at which this RSS feed is last modified.
     *
     * @return Carbon
     */
    public function lastModified(): Carbon;

    /**
     * The author of the RSS feed.
     *
     * @return string
     */
    public function author(): string;

    /**
     * The identifier for this RSS feed.
     *
     * @return string
     */
    public function identifier(): string;
}
