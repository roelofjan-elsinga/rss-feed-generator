<?php

namespace AtomFeedGenerator\Tests;

use RssFeedGenerator\RssFeedGenerator;
use RssFeedGenerator\Tests\Stubs\TestFeedConfiguration;
use RssFeedGenerator\Tests\Stubs\TestFeedItem;
use PHPUnit\Framework\TestCase;

class RssFeedGeneratorTest extends TestCase
{
    public function testAnEmptyFeedCanBeGenerated()
    {
        $configuration = new TestFeedConfiguration();

        $feed = RssFeedGenerator::withConfiguration($configuration)->generate();

        $this->assertNotFalse(strpos($feed, '<?xml version="1.0" encoding="utf-8"?>'));

        $this->assertNotFalse(strpos($feed, '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">'));

        $this->assertNotFalse(strpos($feed, '<channel>'));

        $this->assertNotFalse(strpos($feed, '<title>Test feed</title>'));

        $this->assertNotFalse(strpos($feed, '<link>https://example.com</link>'));

        $this->assertNotFalse(strpos($feed, '<managingEditor>me@example.com (Feed Author)</managingEditor>'));

        $this->assertNotFalse(strpos($feed, '<webMaster>me@example.com (Feed Author)</webMaster>'));

        $this->assertNotFalse(strpos($feed, '<docs>https://example.com/feed</docs>'));

        $this->assertNotFalse(strpos($feed, '<atom:link href="https://example.com/feed" rel="self" type="application/rss+xml" />'));
    }

    public function testFeedCanContainItems()
    {
        $configuration = new TestFeedConfiguration();

        $feed = RssFeedGenerator::withConfiguration($configuration)

            ->add(new TestFeedItem())

            ->generate();

        $this->assertNotFalse(strpos($feed, '<title>Article title</title>'));

        $this->assertNotFalse(strpos($feed, '<link>https://example.com/articles/test-article</link>'));

        $this->assertNotFalse(strpos($feed, '<guid>https://example.com/articles/test-article</guid>'));

        $this->assertNotFalse(strpos($feed, '<description>Article description</description>'));
    }
}
