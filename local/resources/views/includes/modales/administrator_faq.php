
<!--Modal Alias-->
 <div  id="modal_faq" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding-top: 0px;"> 
                <div class="col-lg-12">
                           <form id="formulario_preguntas" action="actpregunta" method="post">
                            <input id="id_pregunta" type="hidden" name="id_pregunta">
                            <input name="_token" type="hidden" value="<?php echo csrf_token();?>" >
                              <span class="pf-title" style="margin: 0px;padding: 0px;">Título</span><br> 
                            <div class="pf-field" style="margin: 0px;padding: 0px;">
                                <input id="titulo_form" name="titulo_form" type="text" placeholder="Alias del archivo...">
                            </div>

                              <span class="pf-title" style="margin: 0px;padding: 0px;">Editor</span><br> 
                            <div class="pf-field" style="margin: 0px;padding: 0px;">
                                <input id="editor_form" name="editor_form" type="text" placeholder="Alias del archivo...">
                            </div>

                            <span class="pf-title" style="margin: 0px;padding: 0px;">Descripción</span><br> 
                            <div class="pf-field" style="margin: 0px;padding: 0px;">
                               <textarea name="descripcion_form" id="descripcion_form" style="resize: none;min-height: 75px;padding: 10px;"></textarea>
                            </div> 
                           </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-xs btn-primary" onClick="$('#formulario_preguntas').submit()">Aplicar</button>
                <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Salir</button>
              </div>
            </div>
          </div>
        </div>     
 <!--Fin Modal link usar como-->