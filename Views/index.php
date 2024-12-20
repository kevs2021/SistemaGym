<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url; ?>img/gymLogo1.png" />
    <title>Gym Body Fit</title>
    <style>
        .custom-button {
            background-color: #6a0dad; /* Morado */
            border: none;
            width: 80px;
            border-radius: 10px;
            color: white; 
            padding: 5px 10px; 
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #5a0088;
        }

        .custom-link {
            color: white;
            text-decoration: none; 
            font-size: 15px;
        }
        .custom-link:hover {
            text-decoration: none; 
        }
        .btn-agregar-carrito {
            display: inline-flex;
            align-items: center;
            background-color: #6a1b9a; /* Morado oscuro */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-agregar-carrito i {
            margin-right: 8px;
        }

        .btn-agregar-carrito:hover {
            background-color: #4a148c; /* Morado más oscuro */
        }

    </style>
</head>
<body>
    <!-- MENU -->
    <div class="contenedor-header">
        <header>
            <div class="logo-title">
                <img src="img/gymLogo1.png" alt="Logo de The Gym" class="logo">
                <h1>BODY <span class="txtRojo">FIT</span></h1>
            </div>
            <nav id="nav">
                <a href="#inicio" onclick="seleccionar()">Inicio</a>
                <a href="#nosotros" onclick="seleccionar()">Nosotros</a>
                <a href="#servicios" onclick="seleccionar()">Servicios</a>    
                <a href="#galeria" onclick="seleccionar()">Galería</a>
                <a href="#contacto" onclick="seleccionar()">Contacto</a>
				<button class="custom-button">
                  <a class="custom-link" href="<?php echo base_url . 'home/login'; ?>">Ingresar</a>
                </button>
            </nav>
            <div class="redes">
                <a href="https://www.facebook.com/profile.php?id=100052847358824&mibextid=ZbWKwL"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://api.whatsapp.com/send?phone=%2B59170622721&context=ARCfEBNaoEeY9sqgzVw4x98r0VKeClH9Yc5q5CqlbEqZJ4gbJBW9KlOZOM6kjg2keQhfDRZhbLtN0rpA62YhNaaj3mdXU97stdFxXZb-VmORY1NNJUztL8wQVyIRwDx3IApEwPyJEdm-DMdut9X_Eq-xEA&source=FB_Page&app=facebook&entry_point=page_cta&sfnsn=wa"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            </div>
            
            <!-- Icono del menu responsive -->
            <div id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>                
        </header>
    </div>

    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
        <div class="contenido-seccion">
            <div class="info" >
                <h2>ALCANZA TU MEJOR VERSION EN<span class="txtRojo"> BODY FIT</span></h2>
                <p>tu momento es ahora</p>
                <a href="#nosotros" class="btn-mas">
                    <i class="fa-solid fa-circle-chevron-down"></i>
                </a>
            </div>
            
    </section>

    <!-- SECCION NOSOTROS -->
    <section id="nosotros" class="nosotros">
        <div class="fila">
            <div class="col" data-aos="fade-up">
                <img src="img/f3.jpg" alt="" style="border-radius: 7%;">
            </div>
            <div class="col" data-aos="fade-up">
                <div class="contenedor-titulo" data-aos="fade-up">
                    <div class="info" style="margin-left: -5px;">
                        <span class="frase">ACERCA DE</span>
                        <h2>NOSOTROS</h2>
                    </div>
                </div>
                <p data-aos="fade-up">Somos un gimnasio comprometido con mejorar la salud y el bienestar de nuestra comunidad. hemos crecido para ofrecer instalaciones modernas, equipos de última generación al igual que nuestro equipo de entrenadores dedicados está aquí para apoyar a cada miembro</p>
            </div>
        </div>
        <div class="fila-nosotros">
            <div class="col1">
                <span class="frase">
                    <span class="txtRojo">ENTRENA</span> DIFERENTE
                </span>
                <h2>ENTRENA <span class="txtRojo">GRATIS</span> HOY!</h2>
            </div>
            <div class="col2">
                <button>REGISTRARSE</button>
            </div>
        </div>
    </section>
    
    <!-- SECCION NOSOTROS -->
    <section id="nosotros" class="nosotros" >
        <div class="fila">
            <div class="col" data-aos="fade-up">
                <div class="contenedor-titulo" style="margin-left: -30px;">
                    <div class="numero">
                        <img src="img/mision.png" alt="" width="160px" height="120px" >
                    </div>
                    <div class="info">
                        <span class="frase">ACERCA DE</span>
                        <h2>NUESTRA MISION</h2>
                    </div>
                </div>
                <p>Fomentar un estilo de vida activo y saludable al proporcionar un espacio donde cada persona se sienta motivada y apoyada en su camino hacia el bienestar físico y mental.</p>
            </div>
            <div class="col" data-aos="fade-up">
                <div class="contenedor-titulo" style="margin-left: -25px;">
                    <div class="numero">
                        <img src="img/vision.png" alt=""  width="130px" height="100px" >
                    </div>
                    <div class="info">
                        <span class="frase">ACERCA DE</span>
                        <h2>NUESTRA VISION</h2>
                    </div>
                </div>
                <p>Convertirnos en el gimnasio de referencia, promoviendo una cultura de salud y superación personal para todos nuestros miembros. Aspiramos a crear una comunidad unida que se apoye mutuamente en el logro de sus objetivos.</p>
            </div>
        </div>
    </section>

     <!-- SECCION SERVICIOS -->
    <section class="servicios" id="servicios">
        <div class="contenido-seccion">
            <div class="fila">
                <div class="col" data-aos="fade-up">
                    <div class="contenedor-titulo">
                        <div class="numero"></div>
                        <div class="info">
                            <span class="frase">NUESTROS</span>
                            <h2>SERVICIOS</h2>
                        </div>
                    </div>
                    <p>En nuestro gimnasio, contamos con diversos planes de membresía pensados para adaptarse a tus necesidades y estilo de vida. Ofrecemos opciones flexibles que incluyen desde acceso básico a nuestras instalaciones hasta planes completos con entrenadores personalizados, clases grupales y asesoramiento nutricional.</p>
                </div>
                <div class="col">
                    <img src="img/servicios.png" alt="">
                </div>
            </div>
        </div>
        <div class="info-servicios" data-aos="fade-up">
            <table id="tablaServicios">
                <tr>
                    <td>
                        <i class="fa-solid fa-calendar"></i>
                        <h3><span class="txtRojo">Membresía </span> Anual</h3>
                        <p>Acceso ilimitado durante un año a todas nuestras instalaciones y clases.</p>
                        <p><strong>Precio:</strong> 799 Bs</p>
                        <button class="btn-agregar-carrito" onclick="redirigirFormulario('Membresía Anual', '799 Bs')">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </td>
                    <td>
                        <i class="fa-solid fa-calendar-days"></i>
                        <h3><span class="txtRojo">Membresía </span> Mensual</h3>
                        <p>Perfecta para quienes desean probar nuestros servicios por un mes.</p>
                        <p><strong>Precio:</strong> 150 Bs</p>
                        <button class="btn-agregar-carrito" onclick="redirigirFormulario('Membresía Mensual', '150 Bs')">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </td>
                    <td>
                        <i class="fa-solid fa-calendar-alt"></i>
                        <h3><span class="txtRojo">Membresía </span> Semestral</h3>
                        <p>Acceso durante seis meses para un compromiso a mediano plazo.</p>
                        <p><strong>Precio:</strong> 500 Bs</p>
                        <button class="btn-agregar-carrito" onclick="redirigirFormulario('Membresía Semestral', '500 Bs')">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa-solid fa-ghost"></i>
                        <h3><span class="txtRojo">Oferta </span> Halloween</h3>
                        <p>Promoción especial para celebrar Halloween. ¡No te la pierdas!</p>
                        <p><strong>MAS INFORMACION</strong></p>
                        <button class="btn-agregar-carrito" onclick="redirigirFormulario('Oferta Halloween', 'XX Bs')">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </td>
                    <td>
                        <i class="fa-solid fa-handshake"></i>
                        <h3><span class="txtRojo">Promo </span> 2 por 1</h3>
                        <p>Trae a un amigo y ambos disfruten de nuestra membresía al precio de uno.</p>
                        <p><strong>MAS INFORMACION</strong></p>
                        <button class="btn-agregar-carrito" onclick="redirigirFormulario('Promo 2 por 1', 'XX Bs')">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </td>
                    <td>
                        <i class="fa-solid fa-snowflake"></i>
                        <h3><span class="txtRojo">Oferta </span> Navideña</h3>
                        <p>Promoción especial de fin de año para que empieces el próximo con energía.</p>
                        <p><strong>MAS INFORMACION</strong></p>
                        <button class="btn-agregar-carrito" onclick="redirigirFormulario('Oferta Navideña', 'XX Bs')">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <!-- SECCION GALERIA -->
    <section class="galeria" id="galeria">
        <div class="contenido-seccion" data-aos="fade-right">
            <div class="contenedor-titulo">
                <div class="numero">
                    04
                </div>
                <div class="info">
                    <span class="frase">NUESTRA</span>
                    <h2>GALERIA</h2>
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <img src="img/Multimedia (1).jpg" alt="">
                </div>
                <div class="col">
                    <img src="img/Multimedia (2).jpg" alt="">
                </div>
                <div class="col">
                    <img src="img/Multimedia (3).jpg" alt="">
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <img src="img/Multimedia (4).jpg" alt="">
                </div>
                <div class="col">
                    <img src="img/f5.jpg" alt="">
                </div>
                <div class="col">
                    <img src="img/Multimedia (5).jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    
    <!-- SECCION MAPA -->
    <section id="mapa" class="mapa">
        <div class="contenedor-titulo">
            <div class="info">
                <h2>Dónde nos puedes encontrar</h2>
                <span class="frase">Visitanos en</span>
            </div>
        </div>
        <!-- Mapa Embebido de Google Maps -->
        <div class="mapa-ubicacion">
            <iframe src="https://maps.google.com/maps?q=Av.%20Del%20Maestro%20400%20·%20La%20Paz&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>


    <!-- SECCION CONTACTO -->
    <section class="contacto" id="contacto">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    
                </div>
                <div class="info">
                    <span class="frase">CONSULTANOS TU DUDA</span>
                    <h2>CONTACTO</h2>
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <input type="text" placeholder="Ingresa tu Email">
                </div>
                <div class="col">
                    <input type="text" placeholder="Ingresa tu Nombre">
                </div>
            </div>
            <div class="mensaje">
                <textarea name="" id="" cols="30" rows="10" placeholder="Ingresa el Mensaje (opcional)"></textarea>
                <button>Enviar Mensaje</button>
            </div>
            <div class="fila-datos">
                <div class="col">
                    <i class="fa-solid fa-location-dot"></i>
                    Avenida Costanera No. 400
                </div>
                <div class="col">
                    <i class="fa-solid fa-phone"></i>
                    70622721
                </div>
                <div class="col">
                    <i class="fa-regular fa-clock"></i>
                    Lunes a Sábado, 8:00 am - 22:00 pm
                </div>
            </div>
        </div>

    </section>

    <footer>
        <div class="info">
            <p>2024 - <span class="txtRojo">GYM BODY FIT</span> Todos los derechos reservados</p>
            <div class="redes">
                <a href="https://www.facebook.com/profile.php?id=100052847358824&mibextid=ZbWKwL"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://api.whatsapp.com/send?phone=%2B59170622721&context=ARCfEBNaoEeY9sqgzVw4x98r0VKeClH9Yc5q5CqlbEqZJ4gbJBW9KlOZOM6kjg2keQhfDRZhbLtN0rpA62YhNaaj3mdXU97stdFxXZb-VmORY1NNJUztL8wQVyIRwDx3IApEwPyJEdm-DMdut9X_Eq-xEA&source=FB_Page&app=facebook&entry_point=page_cta&sfnsn=wa"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>
    <script src="app.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        function redirigirFormulario(producto, precio) {
            // Redirigir al formulario de cliente con los datos como parámetros en la URL
            window.location.href = 'formulario_cliente.php?producto=' + encodeURIComponent(producto) + '&precio=' + encodeURIComponent(precio);
        }

        AOS.init();
    </script>
</body>
</html>