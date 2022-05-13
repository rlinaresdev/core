@extends($skin->path())

   @section("body")

   <article class="box box-center">
      <header class="box-header">
         <h4>Core</h4>
      </header>
      <section class="box-body">
         <article class="block">
            <p>Core V-1.0 Developer Applications</p>
            <a href="https://github.com/rlinaresdev/core" target="_blank" class="bt bt-light">
               Información
            </a>
            <a href="{{url('requeriments')}}" class="bt bt-primary">Requerimintos</a>
            <a href="{{__url("env")}}" class="bt bt-uva">Inciar Instalación</a>
         </article>
      </section>
   </article>
   @endsection
