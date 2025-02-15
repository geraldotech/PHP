<?php
  //session_start();

// // // Define cabeçalhos para evitar cache
// header('Content-Type: application/json');
// header('Cache-Control: no-cache, must-revalidate');

// // Retorna o status da SSE
// if (isset($_SESSION['sse_active']) && $_SESSION['sse_active'] === true) {
//     echo json_encode(['status' => 'active', 'message' => 'SSE está ativo']);
// } else {
//     echo json_encode(['status' => 'inactive', 'message' => 'SSE não está ativo']);
// }

//$existe = $_SESSION['sse_active'] ? 'sim' : 'nao';

if (session_id() === '') {
    // No session exists, so start one
    session_start();
}

// Now you can safely work with the session
if (isset($_SESSION['sse_active']) && $_SESSION['sse_active'] === true) {
    echo "SSE is active.";
} else {
    echo "SSE is not active.";
}


?>
