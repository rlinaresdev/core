@extends($skin->path("layout"))

   @section("content")
      <section role="install">
         <article class="box box-light">
            <section class="box-body body-panel">
               <article class="block">
                  Actualisar los recursos públicos
                  <a href="{{__url("env/published")}}" class="btn btn-light btn-sm">
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
                        <label>{{__("laravel.environmet")}}</label>
                        <div class="form-group pt-1">
                           <textarea spellcheck="false" name="env" class="form-control txt-editor">{{$env}}</textarea>
                        </div>
                     </div>
                     <div class="form-group pt-2">
                        @csrf
                        <a href="{{__url('/')}}" class="btn btn-secondary btn-sm">
                           {{ __("words.return") }}
                        </a>
                        <button type="submit" name="button" class="btn btn-primary btn-sm">
                           {{ __("words.update") }}
                        </button>
                        <a href="{{__url('/database')}}" class="btn btn-success btn-sm">
                           {{__("words.database")}}
                        </a>
                     </div>
                  </form>
               </article>
            </section>
         </article>
      </section>
   @endsection
