<?php

include 'template.php';
include 'classFeed.php';

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

$title = $objTecMundo->getTitle();
$update = $objTecMundo->getLastUpdate();
$description = $objTecMundo->getDescription();

$tecnologia =  "<main class='bg-dark text-light'>
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
                </main>";


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
