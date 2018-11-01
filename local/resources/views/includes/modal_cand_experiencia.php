<!-- Modal -->
<div class="modal fade" id="modal_educ_expe" tabindex="-1" role="dialog" aria-labelledby="modal_educ_expeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 70%;height: 95%;margin: 0 auto;margin-top: 5%;">
    <div class="modal-content" style="height: 80%;">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_educ_expeLabel">Experiencia laboral</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <div class="social-edit">
          <form id="form_experiencia" method="POST" action="candiexpe">
            <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
            <input type="hidden" id="expe_tipo" value="1" name="tipo" />
            <input type="hidden" id="expe_identificador" name="identificador" value="" />
            <div class="row" style="margin-top: -20px;">
              <div class="col-lg-6">
                <span class="pf-title">Sector</span>
                <div class="pf-field">
                  <select id="expe_sector"  name="sector" data-placeholder="Sector" class="chosen">
                    <option value="">Seleccionar</option>
                    <?php foreach ($area_sectores as $key) {
                      echo '<option value="'.$key->id.'">'.$key->nombre.'</option>';
                    }?> 
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <span class="pf-title">Periodo</span>
                <div class="pf-field col-sm-6" style="margin: 0px;padding: 0px;">
                  
                   <input name="desde" id="expe_desde" type="date" name="" style="">
                </div>
                <div class="pf-field col-sm-6" style="margin: 0px;padding: 0px;">
                  <input name="hasta" id="expe_hasta" type="date" name="" value="" style=""> 
                </div>
                
              </div> 
              <div class="col-lg-6"></div>
              <div class="col-lg-6">
                  <div class="form-check" style="padding: 0px;"> 
                         <input onclick="" class="form-check-input" type="checkbox" name="exampleRadios" id="trabajando_act" value="">
                             <label onclick="set_trab_act();" style="margin-top: 5px;" class="form-check-label" for="trabajando_act"><span style=" font-size: 13px;color:#ff0000;">Trab. Actualmente</span>
                         </label> 
                  </div>
              </div>
              <div class="col-lg-3">
                <span class="pf-title">Empresa</span>
                <div class="pf-field">
                   <input name="empresa" id="expe_empresa" type="text" name="">
                </div>
              </div>
               <div class="col-lg-3">
                <span class="pf-title">Tipo de puesto</span>
                <div class="pf-field">
                  <select id="tip_de_puesto"  name="tipo_de_puesto" data-placeholder="Sector" class="chosen">
                    <option value="">Seleccionar</option>
                    <option value="Director">Director</option> 
                    <option value="Gerente">Gerente</option>
                    <option value="Ejecutivo">Ejecutivo</option>
                    <option value="Empleado">Empleado</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <span class="pf-title">Cargo</span>
                <div class="pf-field" style="">
                    <input type="text" id="expe_cargo" name="cargo"> 
                </div> 
              </div> 
                
              <div class="col-lg-12" style="margin-top: -15px;">
                <span class="pf-title">¿Qué hizo en esta empresa?</span>
                <div class="pf-field">
                    <textarea  id="expe_descripcion" name="descripcion" maxlength="150"></textarea> 
                </div>
              </div> 
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" onClick="form_experiencia_validar()">Guardar</button>
      </div>
    </div>
  </div>
</div>

