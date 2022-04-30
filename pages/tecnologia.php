<?php

include 'template.php';

class classFeed {
        
    private $feed = null;

    public function __construct($feed_url) {
        $this->loadFeed($feed_url); 
    }

    private function loadFeed($feed_url) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $feed_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $this->parseXML($response);
    }

    private function parseXML($response) {
        if(!strlen($response)) return false;      
        $this->feed = simplexml_load_string($response);
        return true;
    }


    public function getTitle() {
        return $this->feed->channel->title;
    }

    public function getDescription() {
        return $this->feed->channel->description;
    }

    public function getLastUpdate() {
        return date('d/m/Y à\s H:i:s',strtotime($this->feed->channel->lastBuildDate));
    }

    public function getLogo() {
        return $this->feed->channel->image->url;
    }

    public function getItens() {
        return $this->feed->channel->item;
    }

} 

$objTecMundo = new classFeed('https://rss.tecmundo.com.br/feed');
$items = '';
$tecnologia = '';

foreach ($objTecMundo->getItens() as $item) {
    $image = $item->enclosure->attributes()->url;
    $data  = date('d/m/Y à\s H:i:s', strtotime($item->pubDate));
    $dc    = $item->children("http://purl.org/dc/elements/1.1/");

    $items .=    '<div class="col mb-5">
                    <div class="card text-dark h-100">
                        <div class="card-body">
                            <span class="badge bg-primary">'. $item->category .'</span>
                            <h5 class="card-title">'. $item->title .'</h5>
                            <img src="'. $image .'" class="card-img-top" alt="'. $item->title .'">
                            <p class="card-text">'. $item->description .'</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Publicado em: '. $data .' por: <b>'. $dc->creator .'</b></small>   
                        </div>
                    </div>
                </div>';
}

$logo = $objTecMundo->getLogo();
$title = $objTecMundo->getTitle();
$update = $objTecMundo->getLastUpdate();
$description = $objTecMundo->getDescription();

$tecnologia =  "<body class='bg-dark text-light'>
                <div class='container p-4 text-light'>
                    <div class='text-center'>
                        <h1 class='m-0'>$title</h1>
                        <p class='m-0'>$update</p>
                        <p class='m-0 mb-5 text-muted'>$description</p>
                    </div>
                    <div class='row row-cols-1 row-cols-md-2 g-4'>
                    $items                    
                    </div>
                    </div>
                </body>";


/**
 * Coleta os dados das tags que serão substituídas e retorna a pagina renderizada
 *
 * @return string
 */
function page_feed () { 
    global $tecnologia;   
    $tags = [
        'header'    => render('pages-html/header.html', $tag = [ "nav" => verificarlogin()]),
        'tecnologia' => $tecnologia,
        'footer'    => render('pages-html/footer.html')
    ];

    return render('pages-html/tecnologia.html', $tags);
}

echo page_feed();