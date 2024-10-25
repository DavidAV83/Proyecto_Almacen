<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "../inc/head.php"; ?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
    <link rel="stylesheet" href="../css/estilo_salidas.css">

    <style>
        .carro-cuadro {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            gap: 7px;
            /* Espacio entre los elementos */
        }

        .carro-cuadro input[type="text"] {
            width: 40px;
            /* Ancho reducido para los inputs */
            text-align: center;
            padding: 5px;
            font-size: 14px;
            color: black;
            /* Tamaño de fuente reducido */
            background-color: #F86225;
        }

        .carro-cuadro input[type="checkbox"] {
            margin-left: 10px;
        }

        .selec_carro {
            display: flex;
            flex-wrap: wrap;
            /* Ajustar el contenido al tamaño del contenedor */
            gap: 10px;
            /* Espacio entre los cuadros */
        }
    </style>
</head>

<body>
    <div class="barra">
        <h1>REGISTRO DE SALIDAS</h1>
        <h1>ENTREGADO A TRABAJADOR</h1>
    </div>
    <div class="cerrar">
        <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar"
                id="regresar"></button>
    </div>

    <div class="salida_expediente_codigo">
        <label for="codigo">TECLEE EL EXPEDIENTE: </label><input type="number" id="expediente" name="expediente" />
        <button type="button" id="aceptar_expediente" name="aceptar_expediente">
            <h2>ACEPTAR</h2>
        </button>
        <br>
        <br>
        <label for="nombre">NOMBRE: </label><input type="text" name="nombre" id="nombre" disabled>
        <br>
        <br>
        <label for="categoria">CATEGORIA: </label><input type="text" name="categoria" id="categoria" disabled>
    </div>
    <div class="formulario_salida">
        <form action="#">
            <label for="fecha_mov">FECHA: </label><input type="date" id="fecha_mov" name="fecha_mov" required>
            <br>
            <br>
            <div class="insertar_codigo">
                <label for="codigo">CÓDIGO: </label><input type="number" id="codigo" name="codigo" required>
                <button type="button" id="aceptar_codigo" name="aceptar_codigo">
                    <h2>ACEPTAR</h2>
                </button>
            </div>
            <br>
            <label for="existencia">EXISTENCIA ACTUAL: </label><input type="text" name="existencia" id="existencia"
                disabled>
            <br>
            <br>
            <label for="folio">FOLIO: </label><input type="number" id="folio" name="folio" required minlength="1"
                maxlength="9s" size="10" required>
            <br>
            <br>
            <label for="cantidad">CANTIDAD ENTREGADA: </label><input type="number" name="cantidad" id="cantidad"
                required>
            <br>
            <br>

            <div class="seleccion">
                <label for="tren">TREN: </label><select name="tren" id="tren" required>
                    <option value="" disabled selected>SELECCIONA EL TREN</option>
                </select>
                <br>
                <br>
                <label for="area">ÁREA: </label><select name="area" id="area" required>
                    <option value="" disabled selected>SELECCIONA UNA ÁREA</option>
                </select>
            </div>

            <div class="ultimo_folio">
                <br>
                <br>
                <br>
                <br>
                <label for="ultimo_f">ULTIMO FOLIO CAPUTURADO: </label><input type="text" name="ultimo_f" id="ultimo_f"
                    disabled>
            </div>
        
    </div>
    <div class="selec_carro">
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_1" value="M">
            <label for="carro_1">1</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_2" value="R">
            <label for="carro_2">2</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_3" value="N">
            <label for="carro_3">3</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_4" value="N1">
            <label for="carro_4">4</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_5" value="PR">
            <label for="carro_5">5</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_6" value="N2">
            <label for="carro_6">6</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_7" value="N3">
            <label for="carro_7">7</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_8" value="R1">
            <label for="carro_8">8</label>
        </div>
        <div class="carro-cuadro">
            <input type="checkbox" class="carro-checkbox" name="carro_9" value="M1">
            <label for="carro_9">9</label>
        </div>
        <label for="select_todo">TODOS<br>LOS CARROS</label>
        <input type="checkbox" id="select_todo">
    </div>
    </form>
    <div class="guardar_cancelar">
        <button name="guardar">
            <h2>GUARDAR</h2>
        </button>
        <button name="cancelar">
            <h2>CANCELAR</h2>
        </button>
    </div>
    <!-- Incluye el JavaScript al final del body para asegurar que el DOM esté cargado -->
    <script>
        function ajustarAnchoCampo(campo) {
            var tempSpan = document.createElement('span');
            tempSpan.style.visibility = 'hidden';
            tempSpan.style.whiteSpace = 'pre';
            tempSpan.style.font = getComputedStyle(campo).font;
            tempSpan.innerText = campo.value || campo.placeholder;
            document.body.appendChild(tempSpan);

            campo.style.width = tempSpan.offsetWidth + 'px';

            document.body.removeChild(tempSpan);
        }
        // Añadir eventos keydown para manejar la tecla Enter
        document.querySelectorAll('input:not([type="checkbox"]), select').forEach(field => {
            field.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    // Simula el clic en el botón de aceptar correspondiente
                    if (this.id === 'expediente') {
                        document.getElementById('aceptar_expediente').click();
                    } else if (this.id === 'codigo') {
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

        document.getElementById('aceptar_expediente').addEventListener('click', function () {
            var expediente = document.getElementById('expediente').value;

            if (!expediente) {
                alert('Por favor ingrese un expediente.');
                return;
            }

            fetch('../php/verificar_expediente.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'expediente': expediente
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.existe) {
                        var nombreInput = document.getElementById('nombre');
                        var categoriaInput = document.getElementById('categoria');
                        nombreInput.value = data.nombre;
                        categoriaInput.value = data.categoria;

                        ajustarAnchoCampo(nombreInput);
                        ajustarAnchoCampo(categoriaInput);
                        pasarAlSiguienteCampo(document.getElementById('nombre'));
                    } else {
                        alert('Expediente no encontrado.');
                        document.getElementById('nombre').value = '';
                        document.getElementById('categoria').value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        });

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
                body: new URLSearchParams({
                    'codigo': codigo
                })
            })
                .then(response => response.json())
                .then(data => {
                    var existenciaInput = document.getElementById('existencia');
                    if (data.existe) {
                        existenciaInput.value = data.existencia;
                        pasarAlSiguienteCampo(document.getElementById('codigo'));
                    } else {
                        alert('Código no encontrado.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function cargarTrenes() {
            fetch('../php/obtener_trenes.php')
                .then(response => response.json())
                .then(trenes => {
                    const selectTren = document.getElementById('tren');
                    selectTren.innerHTML = '<option value="" disabled selected>SELECCIONA EL TREN</option>';

                    trenes.forEach(tren => {
                        const option = document.createElement('option');
                        option.value = tren.M + '/' + tren.M1;
                        option.textContent = tren.M + '/' + tren.M1;
                        selectTren.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        // Función para cargar los datos de las áreas
        function cargarAreas() {
            fetch('../php/obtener_areas.php')
                .then(response => response.json())
                .then(areas => {
                    const selectArea = document.getElementById('area');
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

        function cargarUltimoFolio() {
            fetch('../php/obtener_ultimo_f.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error('Error al obtener el último folio:', data.error);
                    } else {
                        document.getElementById('ultimo_f').value = data.ultimo_folio || 'No hay folios disponibles';
                    }
                })
                .catch(error => console.error('Error al obtener el último folio:', error));
        }

        function actualizarCuadros(data) {
            console.log('Datos recibidos para actualizar cuadros:', data);

            const checkboxes = document.querySelectorAll('.carro-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = false; // Desmarca todos los checkboxes
            });

            // Asigna valores a los checkboxes basados en los datos del servidor
            const valoresDisponibles = [data.M, data.R, data.N, data.N1, data.PR, data.N2, data.N3, data.R1, data.M1];



            checkboxes.forEach((checkbox, index) => {
                if (valoresDisponibles[index] !== undefined) {
                    checkbox.value = valoresDisponibles[index];
                    checkbox.nextElementSibling.textContent = valoresDisponibles[index] || ''; // Actualiza la etiqueta
                }
            });
        }


        document.getElementById('tren').addEventListener('change', function () {
            const trenSeleccionado = this.value;
            console.log('Tren seleccionado:', trenSeleccionado);
            if (!trenSeleccionado) return;

            fetch('../php/obtener_datos_tren.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ 'tren': trenSeleccionado })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Datos recibidos del servidor:', data);
                    if (data) {
                        actualizarCuadros(data);
                    } else {
                        alert('No se encontraron datos para el tren seleccionado.');
                    }
                })
                .catch(error => console.error('Error al obtener datos del tren:', error));
        });

        document.getElementById('select_todo').addEventListener('change', function () {
            const checked = this.checked;
            document.querySelectorAll('.carro-checkbox').forEach(checkbox => {
                checkbox.checked = checked;
            });
        });
       



        document.addEventListener('DOMContentLoaded', function () {
            cargarAreas();
            cargarTrenes();
            cargarUltimoFolio();
        });

        //
        document.querySelector('button[name="guardar"]').addEventListener('click', function () {
            // Verificar si todos los campos están llenos
            const expediente = document.getElementById('expediente').value;
            const nombre = document.getElementById('nombre').value;
            const categoria = document.getElementById('categoria').value;
            const fecha_mov = document.getElementById('fecha_mov').value;
            const codigo = document.getElementById('codigo').value;
            const folio = document.getElementById('folio').value;
            const cantidad = document.getElementById('cantidad').value;
            const tren = document.getElementById('tren').value;
            const area = document.getElementById('area').value;

            if (!expediente || !nombre || !categoria || !fecha_mov || !codigo || !folio || !cantidad || !tren || !area) {
                alert('Por favor llene todos los campos antes de guardar.');
                return;
            }

            if (confirm('¿Estás seguro(a) de guardar estos datos?')) {
                // Recolectar los datos de los carros seleccionados
                const carros = ['carro_1', 'carro_2', 'carro_3', 'carro_4', 'carro_5', 'carro_6', 'carro_7', 'carro_8', 'carro_9'];
                let formData = new FormData();
                formData.append('expediente', expediente);
                formData.append('nombre', nombre);
                formData.append('categoria', categoria);
                formData.append('fecha_mov', fecha_mov);
                formData.append('codigo', codigo);
                formData.append('folio', folio);
                formData.append('cantidad', cantidad);
                formData.append('tren', tren);
                formData.append('area', area);

                carros.forEach(carro => {
                    const checkbox = document.querySelector(`input[name="${carro}"]`);
                    if (checkbox && checkbox.checked) {
                        formData.append(carro, '1'); // Puedes usar cualquier valor que desees
                    }
                });

                fetch('../php/guardar_datos.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Datos guardados exitosamente.');
                            // Limpiar formulario, excepto el input ultimo_f
                            location.reload();
                        } else {
                            alert('Error al guardar los datos: ' + data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });


        document.querySelector('button[name="cancelar"]').addEventListener('click', function () {
            if (confirm('¿Estás seguro de cancelar la inserción de datos?')) {
                // Limpiar formulario, excepto el input ultimo_f
                document.querySelectorAll('input:not([type="checkbox"]), select').forEach(field => {
                    if (field.id !== 'ultimo_f') {
                        field.value = '';
                    }
                });
                document.querySelectorAll('.carro-checkbox').forEach(checkbox => checkbox.checked = false);
            }
        });


    </script>
</body>

</html>