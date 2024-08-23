<?php
    $soluciones=[
        [
            "imagen"=>"homePublic/imgs/soluciones/intrasites.jpg",
            "info"=>"Comunicación, productividad
            y colaboración.",
            "url"=>"",
        ],
        [
            "imagen"=>"homePublic/imgs/soluciones/flexy.jpg",
            "info"=>"Soluciones de comercio electrónico que favorece la integración online-offline impulsando las ventas.",
            "url"=>"",
        ],
        [
            "imagen"=>"homePublic/imgs/soluciones/wiperlabs.jpg",
            "info"=>"Conoce nuestra área de innovación y descubre nuestros desarrollos tecnológicos y acciones con las últimas tendencias del mercado.",
            "url"=>"",
        ],
    ];
?>
<section class="soluciones">

    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <h2>{{__("Tech solutions")}}</h2>

                <?php foreach ( $soluciones as $sol ) : ?>
                <div class="row solucion-data">
                    <div class="col-4 img-solucion">
                        <a href="<?=$sol["url"]?>"><img src="<?=$sol["imagen"]?>"></a>
                    </div>
                    <div class="col-8 info-solucion">
                        <p><?=$sol["info"]?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 data-entry">
                <h2>{{__("Blog")}}</h2>
                <div class="row">
                    <h3>
                        Conoce nuestras sección
                        de noticias y novedades
                    </h3>
                    <h4>
                        El futuro del gaming
                    </h4>
                    <img src="homePublic/imgs/blog.jpg" class="img-fluid">
                    <div class="opciones">
                        <a><img src="homePublic/imgs/right-arrow-dark.png"></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 data-entry">
                <h2>Research and data</h2>
                <div class="row">
                    <h3>
                        Sección exclusiva con e-book
                        sobre las últimas tendencias
                    </h3>
                    <h4>
                        NFTS y MARCAS:<br>
                        Oportunidades o puro humo?
                    </h4>
                    <img src="homePublic/imgs/nft.jpg" class="img-fluid">
                    <div class="opciones">
                        <a>Descargar<img src="homePublic/imgs/right-arrow-dark.png"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>