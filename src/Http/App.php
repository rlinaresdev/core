<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


/*
* LOCALES */
$this->app->setLocale( ($locale = "es_DO") );
if( !empty( ($grammaries = $this->getGrammars(__path("__locale/$locale.php"))) ) ) {
   $LANG->addLines($grammaries, $locale);
}

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'core');

/*
* CDN */
$this->publishes([
   __path("__core/System/Storage/Assets") => __path("__cdn")
], "core");
