@extends($skin->path("layout"))

   @section("content")
      <section role="install">
         <article class="box box-light">
            <section class="box-body">
               <article class="block">
                  Actualisar los recursos públicos
                  <a href="{{__url("env/published")}}" class="btn btn-light">
                     {{__("words.publish")}}
                  </a>
               </article>
            </section>
         </article>

         <article class="box box-light">
            <section class="box-body">
               <article class="block">
                  <form action="{{__url("env")}}" method="POST">
                     <div class="form-group pt-1">
                        <label>{{__("server.environmet")}}</label>
                        <div class="form-group pt-1">
                           <textarea name="env" class="form-control">{{$env}}</textarea>
                        </div>
                     </div>
                     <div class="form-group pt-2">
                        @csrf
                        <a href="{{__url('/')}}" class="btn btn-secondary btn-sm">
                           {{__("words.back")}}
                        </a>

                        <button type="button" name="button" class="btn btn-primary btn-sm">
                           {{__("words.update")}}
                        </button>
                     </div>
                  </form>
               </article>
            </section>
         </article>
      </section>
   @endsection
