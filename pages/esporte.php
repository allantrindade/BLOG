<?php

include 'template.php';
include 'classFeed.php';

$objEsporte = new classFeed('https://www.rjnewsnoticias.com.br/feed/8/esportes/');
$items = '';
$esporte = '';

foreach ($objEsporte->getItens() as $item) {
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
                            <small class="text-muted">Publicado em: '. $data .'</small>   
                        </div>
                    </div>
                </div>';
}

$title = $objEsporte->getTitle();
$description = $objEsporte->getDescription();

$esporte =  "<body class='bg-dark text-light'>
                <div class='container p-4 text-light'>
                    <div class='text-center'>
                        <h1 class='m-0'>$title</h1>
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
    global $esporte;   
    $tags = [
        'header'    => render('pages-html/header.html', $tag = [ "nav" => verificarlogin()]),
        'esporte' => $esporte,
        'footer'    => render('pages-html/footer.html')
    ];

    return render('pages-html/esporte.html', $tags);
}

echo page_feed();
