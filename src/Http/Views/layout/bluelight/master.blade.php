<!DOCTYPE html>
<html lang="es" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>{{$title}}</title>
      <style media="screen">
         body {
            background: #f0f0f0;
         }
         .bt {
            border: 1px solid transparent;
            border-radius: 3px 3px;
            color: #777;
            display: inline-block;
            font-size: 14px;
            padding: 5px 10px;
            text-decoration: none;
         }
         .bt.bt-light{ background: #f3f3f3; border-color: #e9e9e9;}
         .bt.bt-uva{ background: #8663ba; border-color: #54397d; color: #fff;}
         .bt.bt-primary{background: #3d8bfd; border-color: #0d6efd; color: #fff;}
         .container {
            margin: 5% 15% 0 15%;
         }
         @media(min-width:1280px) {
            .container {margin: 5% 30% 0 30%;}
         }
         @media(max-width:990px) {
            .container {margin: 5% 2% 0 2%;}
         }
         .box {
            background: #fff;
         }
         .box .box-header {
            padding: 20px 15px 5px 15px;
         }
         .box .box-header h4 {
            font-size: 20px;
            margin: 0 0;
            padding: 0 0;
         }
         .box .box-body hr {
            border: none;
            border-top: 1px solid #ddd;
            border-button: 1px solid #f3f3f3;
            margin: 5px 0 5px 0;
         }
         .box .box-body .block {
            padding: 0 15px 15px 15px;
         }
         .box .box-body .block p {
            font-size: 13px;
            margin-left: 0 0 3px 0;
            text-align: justify;
         }
         .box .box-footer {
            border-top: 1px solid #ddd;
            padding: 5px 0 0 0;
         }
         .box .box-footer .block {
            padding: 0 15px 5px 15px;
         }
         .box .box-footer .block.block-brand {
            font-size: 12px;
         }

         .box.box-center,
         .box.box-center .box-body .block p {
            border-radius: 4px 4px;
            text-align: center;
         }

      </style>
   </head>
   <body>
      <main class="container">
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
                  <a href="#" class="bt bt-primary">Requerimintos</a>
                  <a href="#" class="bt bt-uva">Inciar Instalación</a>
               </article>
            </section>
         </article>
      </main>
   </body>
</html>
