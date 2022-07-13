@extends($skin->path("layout"))

   @section("content")

      <section role="install">
         <article class="box box-light">
            <header class="box-header">
               <h4>
                  <i class="mdi mdi-gift"></i> En hora buena!
               </h4>
            </header>

            <section class="box-body">
               <article class="block">
                  {{__("end.install")}}
               </article>

               <article class="block">
                  <a href="{{__url('install/database')}}" class="btn btn-outline-primary btn-sm">
                     <i class="mdi mdi-arrow-left-bold"></i> {{__("words.return")}}
                  </a>
                  <a href="{{__url('install/close')}}" class="btn btn-primary btn-sm">
                     <i class="mdi mdi-logout"></i> {{__("words.out")}}
                  </a>
               </article>
            </section>
         </article>
      </section>
   @endsection
