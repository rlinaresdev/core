@extends($skin->path("layout"))

   @section("content")

      <section role="install">
         <article class="box box-light">
            <header class="box-header">
               <h4>Title</h4>
            </header>

            <section class="box-body">
               <article class="block">
                  <p>{{__("end.install")}}</p>
                  <div class="alert alert-warning p-1">
                     {{__("end.custom-back")}}
                     <a href="#">{{__("words.back")}}</a>
                  </div>
               </article>
            </section>
         </article>
      </section>
   @endsection
