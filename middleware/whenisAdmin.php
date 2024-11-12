<?php

function whenisAdmin($request, $response, $container, $next) {
    // Verifica si el usuario está en sesión
    if ($request->has("SESSION", "user")) {
        $user = $request->get("SESSION", "user", FILTER_REQUIRE_ARRAY);
        $role = $user['role'] ?? null;

        // Verifica el rol del usuario
        if ($role !== "administrator") {
            // Si no es administrador, redirige a la página de inicio
            $response->redirect("Location: index.php");
            return $response;
        }

        // Si es administrador, permite la ejecución del controlador y establece la sesión
        $response->set("user", $user);
        return $next($request, $response, $container);
    } else {
        // Si no hay sesión activa, redirige al login
        $response->redirect("Location: index.php?r=login");
        return $response;
    }
}