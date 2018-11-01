<!-- Modal -->
<div class="modal fade" id="modal_educ_cand" tabindex="-1" role="dialog" aria-labelledby="modal_educ_candLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 70%;height: 95%;margin: 0 auto;margin-top: 5%;">
    <div class="modal-content" style="height: 80%;">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_educ_candLabel">Educación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <div class="social-edit">
          <form id="form_estudios" method="POST" action="candiestudios">
            <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
            <input type="hidden" id="tipo" value="1" name="tipo" />
                                            <input type="hidden" id="identificador" name="identificador" value="" />
            <div class="row" style="margin-top: -20px;">
              <div class="col-lg-6">
                <span class="pf-title">Nivel</span>
                <div class="pf-field">
                  <select id="nivel"  name="nivel" data-placeholder="Nivel" class="chosen">
                    <option value="">Seleccionar</option>
                    <?php foreach ($nivel_estudio as $key) {
                      echo '<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                    }?> 
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <span class="pf-title">Estado</span>
                <div class="pf-field col-sm-12" style="margin: 0px;padding: 0px;">
                  <select id="desde_estudio" name="desde" data-placeholder="Ingreso" class="chosen">
                    <option value="">Seleccionar</option>
                    <option value="En curso">En curso</option>
                    <option value="Abandonado">Abandonado</option>
                    <option value="Graduado">Graduado</option> 
                  </select>
                </div>
                <div class="pf-field col-sm-6" style="margin: 0px;padding: 0px;">
                   <input type="hidden" id="hasta_estudio" name="hasta" value="0">
                </div>
              </div> 

              <div class="col-lg-6">
                <span class="pf-title">Nombre institución</span>
                <div class="pf-field">
                   <input name="universidad" id="universidad" type="text" name="">
                </div>
              </div>
              <div class="col-lg-6">
                <span class="pf-title">Área de estudio</span>
                <div class="pf-field" style="">
                  <select id="area_estudio" name="area_estudio" data-placeholder="Ingreso" class="chosen">
                    <option value="">Seleccionar</option>
                    <?php foreach ($area_estudio as $key) {
                      echo '<option value="'.$key->id.'">'.$key->nombre.'</option>';
                    }?>  
                  </select>
                </div> 
              </div> 
                
              <div class="col-lg-6" style="margin-top: -15px;">
                <span class="pf-title">Título</span>
                <div class="pf-field">
                   <input id="titulo_obtener" type="text" name="titulo_obtener">
                </div>
              </div>
              <div class="col-lg-6" style="margin-top: -15px;">
                <span class="pf-title">País</span>
                <div class="pf-field" style="">
                  <select id="uni_pais" name="uni_pais" data-placeholder="Ingreso" class="chosen">
                    <option value="">Seleccionar</option>
                    <?php foreach ($paises as $key) {
                      echo '<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                    }?> 
                  </select>
                </div> 
              </div>  
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" onClick="form_estudios_validar()">Guardar</button>
      </div>
    </div>
  </div>
</div>

