<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* GRAMMARIES */
$this->loadGrammary("es_DO");

//$this->app->setLocale( ($locale = "es_DO") );

// if( !empty( ($grammaries = $this->getGrammars(__path("__locale/$locale.php"))) ) ) {
//    $LANG->addLines($grammaries, $locale);
// }

/*
* MIDDLEWARE */
$this->bootMiddleware(\Core\Http\Middleware\Handler::class);

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'core');

/*
* CDN */
$this->publishes([
   __path("__core/System/Storage/Assets") => __path("__cdn")
], "core");

//dd( core()->stableCore("core"));
