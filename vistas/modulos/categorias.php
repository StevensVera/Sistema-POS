<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Categorias
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Administrar Categorias</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            
            Agregar Categorias

          </button>

        </div>
        

        <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>

                  <th style="width: 10px">#</th>
                  <th>Categoria</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>
                  
                  <?php 

                    $item = null;
                    $valor = null;

                      $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                       foreach ($categoria as $key => $value) {
                         
                          echo '<tr>
                                 <td>'.($key+1).'</td>
                                  <td class="text-uppercase">'.$value["categoria"].'</td>
                                  <td>

                                  <div class="btn-group">

                                      <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                                      <button class="btn btn-danger btnEliminarCategoria" idCategoria ="'.$value["id"].'"><i class="fa fa-times"></i></button>

                                  </div>

                                 </td>
                              </tr>';

                       }
                   ?>     
              </tbody>  
          
          </table>

        </div>

      </div>

    </section>
   
  </div>

 <!--*=============================================
      =            AGREGAR CATEGORIAS          =
      =============================================*/-->


<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      
      <form role="form" method="post">
      <!--*=============================================
      =            CABEZA DEL MODAL           =
      =============================================*/-->

      <div class="modal-header" style="background: #3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Categoria</h4>

      </div>

       <!--*=============================================
          =            CUERPO DEL MODAL          =
      =============================================*/-->
      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          
          <div class="form-group">

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" required>

            </div>
            
          </div>

        </div>
        
      </div>
      <!--*=============================================
      =            PIE DEL MODAL           =
      =============================================*/-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        
        <button type="submin" class="btn btn-primary">Guardar Categoria</button>

      </div>

      <?php 

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

       ?>

      

    </form>
    </div>

  </div>
</div>

<!--*=============================================
      =            MODAL EDITAR CATEGORIAS          =
      =============================================*/-->


<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      
      <form role="form" method="post">
      <!--*=============================================
      =            CABEZA DEL MODAL           =
      =============================================*/-->

      <div class="modal-header" style="background: #3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Categoria</h4>

      </div>

       <!--*=============================================
          =            CUERPO DEL MODAL          =
      =============================================*/-->
      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          
          <div class="form-group">

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

               <input type="hidden" name="idCategoria" id="idCategoria" required>

            </div>
            
          </div>

        </div>
        
      </div>
      <!--*=============================================
      =            PIE DEL MODAL           =
      =============================================*/-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        
        <button type="submin" class="btn btn-primary">Guardar Cambios</button>

      </div>

        
      <?php 
           $editarCategoria = new ControladorCategorias();
            $editarCategoria -> ctrEditarCategoria();  
        ?>
    
    </form>
    </div>

  </div>
</div>

<?php 
    
      $borrarCategoria = new ControladorCategorias();
      $borrarCategoria -> ctrborrarCategorias();

 ?>