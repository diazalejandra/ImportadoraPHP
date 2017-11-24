<?php

interface genericDAO {

    function agregar($registro);

    function eliminar($idRegistro);

    function actualizar($registro);

    function listarTodos();
}
