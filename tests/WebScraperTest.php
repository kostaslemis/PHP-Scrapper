<?php

use PHPUnit\Framework\TestCase;

class WebScraperTest extends TestCase {
    public function testAsin()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_ASIN();
        $this->assertEquals("B08BHFGJXF", $result);
    }

    public function testTitle()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_Title();
        $this->assertEquals("Amazon.com: (Renewed Premium) Apple iPhone 11 Pro Max, 256GB, Midnight Green - Unlocked : Cell Phones &amp; Accessories", $result);
    }

    public function testRatings()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_Ratings();
        $this->assertEquals("3,537 ratings", $result);
    }

    public function testReview_Stars()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_ReviewStars();
        $this->assertEquals("4.4 out of 5 stars", $result);
    }

    public function testBrand_Name()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_BrandName();
        $this->assertEquals("Apple", $result);
    }

    public function testPrice()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_Price();
        $this->assertEquals("$729.00", $result);
    }

    public function testImages_URL()
    {
        $web_scraper = new Php_Api\WebScraper;
        $result = $web_scraper->get_ImageURL();

        $ImagesURL[] = "https://m.media-amazon.com/images/I/31u3jV2KoLS._AC_SR38,50_.jpg";
        $ImagesURL[] = "https://m.media-amazon.com/images/I/212UHKt+BiS._AC_SR38,50_.jpg";
        $ImagesURL[] = "https://m.media-amazon.com/images/I/41iXpamcyGL._AC_SR38,50_.jpg";
        $ImagesURL[] = "https://m.media-amazon.com/images/I/21knT-kBuRS._AC_SR38,50_.jpg";
        $ImagesURL[] = "https://m.media-amazon.com/images/I/21VANDdZbZS._AC_SR38,50_.jpg";
        $ImagesURL[] = "https://m.media-amazon.com/images/I/31nl+4F977S._AC_SR38,50_.jpg";

        $this->assertEquals(sizeof($ImagesURL), sizeof($result));

        foreach ($ImagesURL as $i => $imgURL) {
            $this->assertEquals($imgURL, $result[$i]);
        }
    }
    
}