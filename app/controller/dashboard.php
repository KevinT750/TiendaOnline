<?php
session_start();

if (isset($_SESSION['sol_id'])) {
    echo "ID de solicitud registrado: " . $_SESSION['sol_id'];
} else {
    echo "No hay sesión activa o no se ha registrado una solicitud.";
}
