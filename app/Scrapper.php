<?php
namespace App;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;


class Scrapper {
    public function __construct()
    {
        $this->client = new Client(HttpClient::create(['timeout' => 60]));
        $this->download_url = "blank";
    }

    public function get_search_table($title, $author, $publication_year){
        
        $download_url = "blank";
        $title = str_replace(" ","+",$title); //replace space with + for url encoding 
        $author = str_replace(" ","+",$author); //replace space with + for url encoding 
        $url = "http://libgen.rs/search.php?req=".$title."+".$author;
        // dd($url);
        $crawler = $this->client->request('GET', $url);
        $crawler->filter('tr')->each(function ($node) {
            if (strpos($node->text(), '[1]') !== false) { // Go stright to search table
                $table_row = $node->filter('td');
                // dd($table_row->eq(9)->text()); // Get first mirror
                //dd($table_row->eq(9)->filter('a')->link()); //First mirror link
                $mirror_link = $table_row->eq(9)->filter('a')->link();
                $mirror_crawl = $this->client->click($mirror_link);
                //dd($mirror_crawl->filter('h2')->eq(0)->filter('a')->attr('href')); // Get Download url
                if ($this->download_url == "blank"){
                    $this->download_url = $mirror_crawl->filter('h2')->eq(0)->filter('a')->attr('href');
                }
                return("asd");
                //print $node->text()."\n";
            }
        });
    }
}