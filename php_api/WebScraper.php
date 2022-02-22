<?php

namespace {
    include("simple_html_dom.php");
    ini_set('memory_limit', '64M');
}

namespace Php_Api {

    use DOMDocument;
    use simple_html_dom;

    class WebScraper
    {
        private simple_html_dom $html;

        function __construct()
        {
            $this->html = new simple_html_dom();
            $get = file_get_contents('https://www.amazon.com/dp/B08BHFGJXF');
            $this->html->load($get);
        }

        public function get_ASIN(): string
        {
            $ASIN = $this->html->find('<td[class="a-size-base prodDetAttrValue"]', 2);
            return trim($ASIN->plaintext);
        }

        public function get_Title(): string
        {
            $Title = $this->html->find('<title>', 0);
            return trim($Title->innertext);
        }

        public function get_Ratings(): string
        {
            $Ratings = $this->html->find('<[class="a-size-base"]', 4);
            return trim($Ratings->innertext);
        }

        public function get_ReviewStars(): string
        {
            $ReviewStars = $this->html->find('<span[id="acrPopover"]', 0);
            return trim($ReviewStars->plaintext);
        }

        public function get_BrandName(): string
        {
            $BrandName = $this->html->find('<[class="a-size-base"]', 10);
            return trim($BrandName->innertext);
        }

        public function get_Price(): string
        {
            $Price = $this->html->find('<span[class="a-offscreen"]', 0);
            return trim($Price->innertext);
        }

        public function get_ImageURL(): array
        {
            $doc = new DOMDocument(1.0);
            $internalErrors = libxml_use_internal_errors(true);
            $doc->loadHTML($this->html);
            libxml_use_internal_errors($internalErrors);

            $anchors = $doc->getElementsByTagName('img');

            $ImagesURL = array();
            for ($i = 4; $i <= 9; $i++)
                $ImagesURL[] = trim($anchors[$i]->getAttribute('src'));
            return $ImagesURL;
        }
    }

}


