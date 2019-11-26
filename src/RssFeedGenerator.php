<?php

namespace RssFeedGenerator;

class RssFeedGenerator
{
    /** @var array|FeedItem[] */
    private $links = [];
    /**
     * @var FeedConfiguration
     */
    private $configuration;

    /**
     * RSSFeedGenerator constructor.
     *
     * @param FeedConfiguration $configuration
     */
    public function __construct(FeedConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Create a new instance for the given domain.
     *
     * @param FeedConfiguration $configuration
     *
     * @return RssFeedGenerator
     */
    public static function withConfiguration(FeedConfiguration $configuration): self
    {
        return new static($configuration);
    }

    /**
     * Add a FeedItem to the links list.
     *
     * @param FeedItem $item
     *
     * @return RssFeedGenerator
     */
    public function add(FeedItem $item): self
    {
        $this->links[] = $item;

        return $this;
    }

    /**
     * Generate the atom string.
     *
     * @return string
     */
    public function generate(): string
    {
        $atom_string = $this->generateHeader();

        $atom_string .= $this->generateMetaInformation();

        $atom_string .= $this->generateLinks();

        $atom_string .= $this->generateFooter();

        return $atom_string;
    }

    /**
     * Generate the RSS File Header.
     *
     * @return string
     */
    private function generateHeader(): string
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
                <channel>\n";
    }

    /**
     * Generate the meta information of the RSS feed.
     *
     * @return string
     */
    private function generateMetaInformation(): string
    {
        return "<title>{$this->configuration->title()}</title>
                <link>{$this->configuration->siteUrl()}</link>
                <description>{$this->configuration->description()}</description>
                <pubDate>{$this->configuration->lastModified()->toRfc7231String()}</pubDate>
                <lastBuildDate>{$this->configuration->lastModified()->toRfc7231String()}</lastBuildDate>
                <docs>{$this->configuration->feedUrl()}</docs>
                <atom:link href=\"{$this->configuration->feedUrl()}\" rel=\"self\" type=\"application/rss+xml\" />
                <generator>https://github.com/roelofjan-elsinga/rss-feed-generator</generator>
                <managingEditor>{$this->configuration->author()}</managingEditor>
                <webMaster>{$this->configuration->author()}</webMaster>\n";
    }

    /**
     * Generate the links of the RSS feed.
     *
     * @return string
     */
    private function generateLinks(): string
    {
        $entries = array_map(function (FeedItem $item): string {
            return "<item>
                        <title>{$item->title()}</title>
                        <link>{$this->configuration->siteUrl()}/{$item->url()}</link>
                        <description>{$item->description()}</description>
                        <pubDate>{$item->createdAt()->toRfc7231String()}</pubDate>
                        <guid>{$this->configuration->siteUrl()}/{$item->url()}</guid>
                    </item>\n";
        }, $this->links);

        return implode('', $entries);
    }

    /**
     * Generate the footer of the RSS feed.
     *
     * @return string
     */
    private function generateFooter(): string
    {
        return "\n</channel>
                </rss>";
    }
}
