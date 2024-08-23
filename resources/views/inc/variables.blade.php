<?php
                $redes=[
                    ['twitter.svg',''],
                    ['facebook-f.svg',''],
                    ['youtube.svg',''],
                    ['linkedin-in.svg',''],
                    ['opensea.svg',''],

                ];

                $oficinas=[
                    ['MIA','America/New_York','-5'],
                    ['NY','America/New_York','-5'],
                    ['BOG','America/Bogota','-5'],
                    ['BSAS','America/Argentina/Buenos_Aires','-3'],
                    ['CDMX','America/Mexico_City','-6'],
                    ['SAO','America/Sao_Paulo','-3'],

                ];
                $zonaFija="America/Bogota";
                $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));
                foreach ( $oficinas as &$ofi ){

                    $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
                    $dateTimeUTC = $newDateTime->format("h:i a");
                    $ofi[2]=$dateTimeUTC;

            }

            $servicios=[
                [
                    "name"=>"Estrategia y Research",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Nuestros proyectos comienzan analizando los aspectos que influyen en el mercado, la audiencia y los consumidores de los clientes"
                ],
                [
                    "name"=>"Creatividad",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"La creatividad es el secreto de nuestro éxito. El equipo creativo genera el mayor impacto en los resultados de las campañas. "
                ],
                [
                    "name"=>"Medios",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Contamos con un equipo inhouse que trabaja en la optimización de los costos de nuestras campañas. Analizan los resultados y mejoran la performance en tiempo real, utilizando nuevos anuncios o segmentaciones si es necesario. "
                ],
                [
                    "name"=>"Desarrollo",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Nacimos hace 15 años como una compañía de desarrollos digitales, trabajando en innovación y las mejores prácticas para garantizar la mejor experiencia de usuario."
                ],
                [
                    "name"=>"Redes sociales",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Conforma uno de los servicios clave para alcanzar la audiencia de nuestros clientes. Comprendemos qué tipo de contenido es el más apropiado evaluando la peformance a través de datos recibidos sobre la audiencia. "
                ],
                [
                    "name"=>"Activaciones",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Manejamos todos los aspectos tradicionales de una activación pero introducimos la conversión digital a través de una experiencia expansiva con medición de KPIs."
                ],
                [
                    "name"=>"Influencers",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"En cada mercado buscamos e identificamos talentos con seguidores locales, nacionales e internacionales. Con nuestro scouting, los evaluamos en base a su trabajo con la audiencia, sus valores y aspectos que los hacen únicos."
                ],
                [
                    "name"=>"E-commerce",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Nos enfocamos en una visión 360 de los puntos de contacto de los consumidores, desde la interacción en los puntos de venta hasta la web y aplicaciones mobile. "
                ],
                [
                    "name"=>"Producción Audiovisual",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"PRODUCCIÓN AUDIOVISUAL
                    Poseemos nuestro propio equipo de producción de contenidos audiovisuales, generando desde los guiones y storyboards hasta la producción final. "
                ],
                [
                    "name"=>"Arte",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Nuestros diseñadores trabajan de forma integral con el resto de los departamentos para desarrollar materiales que incluyen Key Visuals. "
                ],
                [
                    "name"=>"Marketing B2B",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Nuestra principal estrategia en el modelo business-to-business es la creación de experiencias de valor, teniendo un impacto positivo en la personas y sus negocios. "
                ],
                [
                    "name"=>"Prensa",
                    "img"=>"/homePublic/imgs/blog.jpg",
                    "info"=>"Poseemos un enfoque diferente a las relaciones públicas convencionales. Buscamos tópicos que sean de interés genuino para el medio, desarrollamos historias para dirigir tráfico a los sitios y redes sociales de nuestros clientes."
                ],
            ]


?>