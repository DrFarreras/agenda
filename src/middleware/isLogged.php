<?php

function isLogged($request, $response, $container, $next){
    if ($request->has("SESSION", "user")) {
        $user = $request->get("SESSION", "user", FILTER_REQUIRE_ARRAY);
        $response->set("user", $user);
        $response = $next($request, $response, $container);
    } else {
        $response->redirect("Location: index.php?r=login");
    }

    return $response;
}
