<div class="row admisiones justify-content-center">
  <div class="col-10 text-center" style="margin-bottom:30px;">
    <h2>ADMISIONES</h2>
    <p>Regístrate en el siguiente formulario para iniciar con tu proceso de admisión</p>
  </div>
  <div class="col-11 col-md-5">
    <form action="admisioncode.php" method="post">
      <div class="row justify-content-center">
        <div class="col-12 form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput nombre" name="nombre" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
          <label for="floatingInput">Nombre</label>
        </div>

        <div class="col-6 form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput apellidopaterno" name="apellidopaterno" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
          <label for="floatingInput">Apellido paterno</label>
        </div>

        <div class="col-6 form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput apellidomaterno" name="apellidomaterno" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
          <label for="floatingInput">Apellido materno</label>
        </div>

        <div class="col-8 form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput email" name="email" required autocomplete="off" placeholder="">
          <label for="floatingInput">Correo</label>
        </div>

        <div class="col-4 form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput telefono" name="telefono" required autocomplete="off" placeholder="">
          <label for="floatingInput">Teléfono</label>
        </div>

        <div class="input-group col-12 form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput username" name="username" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
          <label for="floatingInput">Nombre de usuario</label>
          <span class="input-group-text" id="basic-addon2">@cepap.mx</span>
        </div>

        <div style="margin-bottom:15px" class="col-7 form-floating">
        <select class="form-select" name="detalles" id="floatingSelect detalles" required autocomplete="off">
          <option selected disabled>Seleccione una opción</option>
          <option value="3">Maestría en educación</option>
          <option value="4">Especialidad en docencía</option>
        </select>
        <label for="floatingSelect">Admision para</label>
        </div>

        <div class="col-5 form-floating mb-3">
          <input type="password" class="form-control" id="floatingInput password" name="password" required autocomplete="off" placeholder="Contraseña">
          <label for="floatingInput">Contraseña</label>
        </div>

        <div class="col-2">
          <button type="submit" name="save" class="btn btn-sm btn-dark p-2">Regístrarme</button>
        </div>

      </div>
    </form>
  </div>
</div>
