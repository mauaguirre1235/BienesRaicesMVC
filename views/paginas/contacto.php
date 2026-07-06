<main class="contenedor">
        <h1>Contacto</h1>

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
                <input id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]" required>

                 <label for="email">E-mail:</label>
                <input id="email" type="email" placeholder="Tu email" name="contacto[email]" required>

                
                 <label for="telefono">Telefono:</label>
                <input id="telefono" type="tel" placeholder="Telefono" name="contacto[telefono]" >

                
                 <label for="mensaje" name="contacto[mensaje">Mensaje:</label>
                <textarea id="mensaje" required> </textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Sobre la propiedad</legend>
                <label for="opciones">Vente o Compra:</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                 <label for="presupuesto">Precio o Presupuesto:</label>
                <input id="presupuesto" type="number" placeholder="presupuesto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Contactado</legend>
                
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" id="contactar-telefono" type="radio" value="telefono" name="contacto[contacto]" required>

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" id="contactar-email" type="radio" value="email" name="contacto[contacto]" required>
                </div>

                <p>Si eligio telefono, elija la fecha y la hora para ser contactado</p>
                <label for="fecha">Fecha:</label>
                <input id="fecha" type="date" name="contacto[fecha]" >

                <label for="hora">Hora:</label>
                <input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>