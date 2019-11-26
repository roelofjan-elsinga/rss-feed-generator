# RSS Feed Generator

[![Build status](https://travis-ci.com/roelofjan-elsinga/rss-feed-generator.svg)](https://travis-ci.com/roelofjan-elsinga/rss-feed-generator)
[![StyleCI Status](https://github.styleci.io/repos/224125188/shield)](https://github.styleci.io/repos/224125188)
[![Code coverage](https://codecov.io/gh/roelofjan-elsinga/rss-feed-generator/branch/master/graph/badge.svg)](https://codecov.io/gh/roelofjan-elsinga/rss-feed-generator)
[![Total Downloads](https://poser.pugx.org/roelofjan-elsinga/rss-feed-generator/downloads)](https://packagist.org/packages/roelofjan-elsinga/rss-feed-generator)
[![Latest Stable Version](https://poser.pugx.org/roelofjan-elsinga/rss-feed-generator/v/stable)](https://packagist.org/packages/roelofjan-elsinga/rss-feed-generator)
[![License](https://poser.pugx.org/roelofjan-elsinga/rss-feed-generator/license)](https://packagist.org/packages/roelofjan-elsinga/rss-feed-generator)

This package helps you to very easily generate an Atom Feed for your website.

## Installation

You can include this package through Composer using:

```bash
composer require roelofjan-elsinga/rss-feed-generator
```

## Usage

```php
use RssFeedGenerator\RssFeedGenerator;

/**@var \RssFeedGenerator\FeedConfiguration $configuration*/

$generator = RssFeedGenerator::withConfiguration($configuration);

// or

$generator = new RssFeedGenerator($configuration);

/**@var \RssFeedGenerator\FeedItem $feed_item*/

$generator->add($feed_item);

$rss_string = $generator->generate();

print $rss_string;

```

This will result in:

```xml
<?xml version="1.0" encoding="utf-8"?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Feed title</title>
        <link href="https://example.com"/>
        <description>RSS 2.0 Description</description>
        <language>en-us</language>
        <pubDate>Tue, 10 Jun 2003 04:00:00 GMT</pubDate>
        <lastBuildDate>Tue, 10 Jun 2003 09:41:01 GMT</lastBuildDate>
        <docs>https://example.com/rss</docs>
        <atom:link href="https://example.com/rss" rel="self" type="application/rss+xml" />
        <generator>https://github.com/roelofjan-elsinga/rss-feed-generator</generator>
        <managingEditor>me@example.com (FirstName LastName)</managingEditor>
        <webMaster>me@example.com (FirstName LastName)</webMaster>
        <item>
            <title>Blog post title</title>
            <link>https://example.com/link/to/page</link>
            <description>Description of the page</description>
            <pubDate>Tue, 03 Jun 2003 09:39:21 GMT</pubDate>
            <guid>https://example.com/link/to/page</guid>
            <author>me@example.com (FirstName LastName)</author>
        </item>
    </channel>
</rss>
```

## Testing

You can run the included tests by running ``./vendor/bin/phpunit`` in your terminal.
