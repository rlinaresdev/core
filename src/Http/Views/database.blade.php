@extends($skin->path("layout"))

   @section("content")

   <article role="install">
      <section class="box box-light">

         <header class="box-header pb-0">
            <h4>
               <i class="mdi mdi-database"></i>
               {{__("words.database")}}
            </h4>
         </header>

         <article class="box-body pt-4">

            <div class="block bg-light mb-3 pt-3">
               <ul class="list-group">
                  @foreach( $engine as $label => $value )
                  <li class="list-group-item px-3 py-1">
                     <strong>{{ $label }}</strong> : {{$value}}
                  </li>
                  @endforeach
               </ul>
            </div>

            <div class="block">

               <h4>{{__("user.admin")}}</h4>

               <form action="{{__url('database')}}" method="post">
                  <div class="form-group pb-2">
                     <label for="">{{__("words.user")}}</label>
                     {!! $errors->first("user", '<p class="error m-0 mb-1 text-danger"> :message </p>') !!}
                     <input type="text" name="user" class="form-control">
                  </div>
                  <div class="form-group pb-2">
                     <label for="">{{__("words.password")}}</label>
                     {!! $errors->first("pwd", '<p class="error m-0 mb-1 text-danger"> :message </p>') !!}
                     <input type="password" name="pwd" class="form-control">
                  </div>
                  <div class="form-group pb-2">
                     <label for="">{{__("words.pconfirm")}}</label>
                     {!! $errors->first("rpwd", '<p class="error m-0 mb-1 text-danger"> :message </p>') !!}
                     <input type="password" name="rpwd" class="form-control">
                  </div>
                  <div class="form-group pt-2">
                     @csrf
                     <a href="{{__url('env')}}" class="btn btn-outline-primary btn-sm">
                        {{__("words.return")}}
                     </a>
                     <button type="submit" name="button" class="btn btn-danger btn-sm btn-block">
                        <i class="mdi mdi-cog"></i>
                        {{__("words.forge")}} {{__("init.construct")}}
                     </button>
                  </div>
               </form>
            </div>

         </article>
      </section>
   </article>
   @endsection
