<main class="contenedor">
    <h1>Contacto</h1>


<?php  

if($mensaje) { ?>
    <p class='alerta exito'> <?php echo $mensaje; ?></p>; 
<?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2> LLene el Formulario de Contacto </h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label for="nombre"> Nombre:</label>
            <input id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]" >

           

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" > </textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion Sobre la propiedad</legend>
            <label for="opciones">Vente o Compra:</label>
            <select id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input id="presupuesto" type="number" placeholder="presupuesto" name="contacto[precio]" >
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input  id="contactar-telefono" type="radio" value="telefono" name="contacto[contacto]"
                    >

                <label for="contactar-email">E-mail</label>
                <input  id="contactar-email" type="radio" value="email" name="contacto[contacto]">

                
            </div>

            <div id="contacto"> </div>

            
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>
</main>