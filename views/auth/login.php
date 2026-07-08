
<main class="contenedor seccion contenido-centrado"> 
    <h1>Iniciar sesion</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;  ?>
    <form method="POST" class="formulario" action="/login" >
          <fieldset>
                <legend>Email Y Password</legend>
                 <label for="email">E-mail:</label>
                <input id="email" name="email" type="email" placeholder="Tu email">

                
                 <label for="password">Password:</label>
                <input id="password" name="password" type="password" placeholder="Tu password">
    
            </fieldset>
            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
    </form>
</main>