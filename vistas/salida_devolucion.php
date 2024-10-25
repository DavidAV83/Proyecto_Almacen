<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../inc/head.php"; ?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
    <link rel="stylesheet" href="../css/estilo_salidas.css">
</head>

<body>

    <div class="barra">
        <h1>REGISTRO DE SALIDAS</h1>
        <h1>DEVUELTO AL ALMACEN</h1>
    </div>

    <div class="cerrar">
        <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>

    <div class="regresar">
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar"
                id="regresar"></button>
    </div>

    <div class="salida_expediente_codigo">
        <label for="codigo">CÓDIGO: </label><input type="number" id="codigo" name="codigo" required>
        <button type="button" id="aceptar_codigo" name="aceptar_codigo">
            <h2>ACEPTAR</h2>
        </button>
    </div>

    <div class="formulario_salida_dos">
        <form action="">
            <label for="fecha_mov">FECHA: </label><input type="date" id="fecha_mov" name="fecha_mov">
            <br><br>
            <label for="folio">FOLIO: </label><input type="text" id="folio" name="folio" required minlength="1"
                maxlength="7s" size="10">
            <br><br>

            <div class="seleccion">
                <label for="area">ÁREA DE DESTINO: </label>
                <select name="area_p" id="area_p" required>
                    <option value="" disabled selected>SELECCIONA UNA ÁREA</option>
                </select>
            </div>
            <br><br>
            <label for="persona_recibe">NOMBRE DE LA PERSONA QUE RECIBE: </label><input type="text" id="persona_recibe"
                name="persona_recibe">
            <br><br>
            <label for="persona_entrega">NOMRBE DE LA PERSONA QUE ENTREGA: </label><input type="text" id="persona_entrega"
                name="persona_entrega">
            <br><br>
            <label for="motivo_dev">MOTIVO DE LA DEVOLUCIÓN: </label><input type="text" id="observaciones" name="observaciones">
            <br><br>
        </form>
    </div>

    <div class="formulario_salida_cuatro">
        <form action="">
            <label for="descripcion">DESCRIPCIÓN: </label><input type="text" name="descripcion" id="descripcion"
                disabled>
            <br><br>
            <label for="existencia">EXISTENCIA ACTUAL: </label><input type="text" name="existencia" id="existencia"
                disabled>
            <br><br>
            <label for="cantidad_ent">CANTIDAD ENTREGADA: </label><input type="number" id="cantidad_ent"
                name="cantidad_ent">
        </form>
    </div>
    <div class="guardar_cancelar_dos">
        <button name="guardar">
            <h2>GUARDAR</h2>
        </button>
        <button name="cancelar">
            <h2>CANCELAR</h2>
        </button>
    </div>
    <script>
        document.querySelectorAll('input:not([type="checkbox"]), select').forEach(field => {
            field.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (this.id === 'codigo') {
                        document.getElementById('aceptar_codigo').click();
                    } else {
                        pasarAlSiguienteCampo(this);
                    }
                }
            });
        });

        function pasarAlSiguienteCampo(campo) {
            var campos = Array.from(document.querySelectorAll('input:not([type="checkbox"]), select'));
            var index = campos.indexOf(campo);
            if (index !== -1 && index < campos.length - 1) {
                campos[index + 1].focus();
            }
        }

        document.getElementById('aceptar_codigo').addEventListener('click', function () {
            var codigo = document.getElementById('codigo').value;

            if (!codigo) {
                alert('Por favor ingrese un código.');
                return;
            }

            fetch('../php/verificar_codigo.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ 'codigo': codigo })
            })
                .then(response => response.json())
                .then(data => {
                    var existenciaInput = document.getElementById('existencia')
                    if (data.existe) {
                        document.getElementById('existencia').value = data.existencia;
                        document.getElementById('descripcion').value = data.descripcion;
                        
                    } else {
                        alert('Código no encontrado.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        document.querySelector('button[name="guardar"]').addEventListener('click', function () {
            const codigo = document.getElementById('codigo').value;
            const fecha_mov = document.getElementById('fecha_mov').value;
            const folio = document.getElementById('folio').value;
            const area_p = document.getElementById('area_p').value;
            const persona_entrega = document.getElementById('persona_entrega').value;
            const persona_recibe = document.getElementById('persona_recibe').value;
            const observaciones = document.getElementById('observaciones').value;
            const descripcion = document.getElementById('descripcion').value;
            const existencia = document.getElementById('existencia').value;
            const cantidad_ent = document.getElementById('cantidad_ent').value;
            if (!codigo || !fecha_mov || !folio || !area_p || !persona_entrega || !persona_recibe || !descripcion || !existencia || !cantidad_ent) {
                alert('Por favor llene todos los campos antes de guardar.');
                return;
            }
            if (confirm('¿Estás seguro(a) de guardar estos datos?')) {
                let formData = new FormData();
                formData.append('codigo', codigo);
                formData.append('fecha_mov', fecha_mov);
                formData.append('folio', folio);
                formData.append('area_p', area_p);
                formData.append('persona_entrega', persona_entrega);
                formData.append('persona_recibe', persona_recibe);
                formData.append('observaciones', observaciones);
                formData.append('descripcion', descripcion);
                formData.append('existencia', existencia);
                formData.append('cantidad_ent', cantidad_ent);

                fetch('../php/guardar_datos_dev.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Datos guardados exitosamente.');
                            location.reload();
                        } else {
                            alert('Error al guardar los datos: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Ocurrió un error al enviar la solicitud. Revisa la consola para más detalles.');
                    });

            }
        });

        function cargarAreas() {
            fetch('../php/obtener_areas_pres.php')
                .then(response => response.json())
                .then(areas => {
                    const selectArea = document.getElementById('area_p');
                    selectArea.innerHTML = '<option value="" disabled selected>SELECCIONA UNA ÁREA</option>';
                    areas.forEach(area => {
                        const option = document.createElement('option');
                        option.value = area;
                        option.textContent = area;
                        selectArea.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar áreas:', error));
        }
        document.addEventListener('DOMContentLoaded', function () {
            cargarAreas();
        });


    </script>
</body>

</html>