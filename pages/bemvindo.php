<?php

include 'template.php';
include 'classFeed.php';

$objTecMundo = new classFeed('https://rss.tecmundo.com.br/feed');
$objPolitica = new classFeed('https://www.rjnewsnoticias.com.br/feed/3/politica/');
$objEsporte = new classFeed('https://www.rjnewsnoticias.com.br/feed/8/esportes/');


for ($i=1; $i <= 6; $i++) {
    $dataTecMundo  = date('d/m/Y à\s H:i:s', strtotime($objTecMundo->getItens()[$i]->pubDate));
    $dataEsporte  = date('d/m/Y à\s H:i:s', strtotime($objEsporte->getItens()[$i]->pubDate));
    $dataPolitica  = date('d/m/Y à\s H:i:s', strtotime($objPolitica->getItens()[$i]->pubDate));

    // Feed TecMundo
    $items .=   '<div class="col mb-5">
                    <div class="card text-dark h-100">
                        <div class="card-body">
                            <span class="badge bg-info">'. $objTecMundo->getItens()[$i]->category .'</span>
                            <h5 class="card-title">'. $objTecMundo->getItens()[$i]->title .'</h5>

                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_Tecnologia'.$i.'">
                                Leia Mais
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Modal_Tecnologia'.$i.'" tabindex="-1" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">'. $objTecMundo->getItens()[$i]->title .'</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="card-text">'. $objTecMundo->getItens()[$i]->description .'</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Publicado em: '. $dataTecMundo .'</small>   
                        </div>
                    </div>
                </div>';

    // Feed Esportes                  
    $items .=   '<div class="col mb-5">
                    <div class="card text-dark h-100">
                        <div class="card-body">
                            <span class="badge bg-success">'. $objEsporte->getItens()[$i]->category .'</span>
                            <h5 class="card-title">'. $objEsporte->getItens()[$i]->title .'</h5>
                            
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_Esporte'.$i.'">
                                Leia Mais
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Modal_Esporte'.$i.'" tabindex="-1" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">'. $objEsporte->getItens()[$i]->title .'</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="card-text">'. $objEsporte->getItens()[$i]->description .'</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Publicado em: '. $dataEsporte .'</small>   
                        </div>
                    </div>
                </div>';

    // Feed Politica            
    $items .=   '<div class="col mb-5">
                    <div class="card text-dark h-100">
                        <div class="card-body">
                            <span class="badge bg-warning">'. $objPolitica->getItens()[$i]->category .'</span>
                            <h5 class="card-title">'. $objPolitica->getItens()[$i]->title .'</h5>
                            
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_Politica'.$i.'">
                                Leia Mais
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Modal_Politica'.$i.'" tabindex="-1" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">'. $objPolitica->getItens()[$i]->title .'</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="card-text">'. $objPolitica->getItens()[$i]->description .'</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Publicado em: '. $dataPolitica .'</small>   
                        </div>
                    </div>
                </div>';        
}

$feed =    "<body class='bg-dark text-light'>
                <div class='mx-auto text-center my-3'>
                    <img class='rounded-circle' src='img/imagem22.png' width='760' height='200'>
                </div>
                <div class='container p-4 text-light'>
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
function page_bemvindo () {
    global $feed;
    $tags = [
        'header'  =>  render('pages-html/header.html', $tag = [ "nav" => verificarlogin()]),
        'feed'    =>  $feed,
        'footer'  =>  render('pages-html/footer.html')
    ];

    return render('pages-html/bemvindo.html', $tags);
}

echo page_bemvindo();
