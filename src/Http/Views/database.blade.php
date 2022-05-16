@extends($skin->path("layout"))

   @section("content")

   <article role="install">

      <section class="box box-light">
         <header class="box-header">
            <h4>{{__("words.migrations")}}</h4>

            <a href="{{__url("env/published")}}" class="btn btn-light btn-sm">
               {{__("words.publish")}}
            </a>
         </header>
         <article class="box-body">
            <section class="block">

               <table class="table table-slim">
                  <thead>
                     <tr>
                        <th>{{__("words.database")}}</th>
                        <th>{{__("words.engine")}}</th>
                        <th>{{__("words.host")}}</th>
                        <th>{{__("words.port")}}</th>
                        <th>{{__("words.user")}}</th>
                        <th class="action">{{__('words.actions')}}</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>{{env("DB_DATABASE")}}</td>
                        <td>{{env("DB_CONNECTION")}}</td>
                        <td>{{env("DB_HOST")}}</td>
                        <td>{{env("DB_PORT")}}</td>
                        <td>{{env("DB_USERNAME")}}</td>
                        <td class="action">
                           <a href="{{__url('env')}}" class="btn btn-outline-secondary btn-sm py-0">
                              <i class="mdi mdi-cog"></i>
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>

               </article>
            </section>
         </article>
      </section>

      <section class="box box-light">
         <header class="box-header">
            <h4>Title</h4>
         </header>
         <article class="box-body">
            <section class="block">
               <article class="row">
                  <div class="col-5">
                     <form class="#" action="{{__url("#")}}" method="post">
                        <div class="form-group">
                           <label for="">{{__("words.user")}}</label>
                           <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="">{{__("words.password")}}</label>
                           <input type="password" name="pwd" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="">{{__("words.pconfirm")}}</label>
                           <input type="password" name="rpwd" class="form-control">
                        </div>
                     </form>
                  </div>
                  <div class="col-7">
                     <p>
                        Se procedera crear las entidades basicas requeridas y se registraran
                        los datos basicos necesarios para el correcto funcionamiento del Core.
                     </p>

                     <p>
                        Para iniciar el procso de migraciones y lanzar los seeder, indique la
                        cuenta administrativa en el siguiente formulario.
                     </p>

                     <p>
                        Este usuario tendra el control adsoluto del aplicativos asi como las
                        mayorias de lo recuros criticos de laravel.
                     </p>
                  </div>
               </article>
            </section>
         </article>
      </section>

   </article>

   @endsection
