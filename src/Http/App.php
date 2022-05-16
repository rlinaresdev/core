<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/




/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'core');

/*
* CDN */
$this->publishes([
   __path("__core/System/Storage/Assets") => __path("__cdn")
], "core");
