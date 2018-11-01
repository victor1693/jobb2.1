
<!--Modal Alias-->
 <div  id="modal_alias" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Alias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding-top: 0px;"> 
                <div class="col-lg-12">
                           <form id="formulario_alias" action="actarch" method="post">
                            <input id="id_alias" type="hidden" name="id_alias">
                            <input name="_token" type="hidden" value="<?php echo csrf_token();?>" >
                              <span class="pf-title">Alias del archivo</span><br> 
                            <div class="pf-field">
                                <input name="alias" id="alias" type="text" placeholder="Alias del archivo...">
                            </div>
                            <span class="pf-title" style="font-size: 10px;padding: 0px; margin: 0px;margin-top: -10px;color: #848484;width: 100%;text-align: right;">* El alias le permitirá identificar el archivo.</span>
                           </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-xs btn-primary" onclick="maletin_validar()">Aplicar</button>
                <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Salir</button>
              </div>
            </div>
          </div>
        </div>    
<!--Fin Modal Alias-->

 <!--Modal link usar como--> 
 <div  id="modal_usar_como" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Usar cómo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <table>
                    <tbody>
                        <tr class="modal_usar_como">
                            <td style="padding-top: 10px;padding-bottom: 10px;">
                                <div class="emply-resume-thumb"><img src="local/resources/views/images/files/xls.png" style="border-radius:50%;width:50px;"></div>
                            </td>
                            <td style="vertical-align: middle;width: 100%;">
                                <div class="table-list-title">
                                    <h3><a href="#" title="">Foto de perfil</a></h3></div>
                            </td> 
                        </tr>
                         <tr class="modal_usar_como">
                            <td style="padding-top: 10px;padding-bottom: 10px;">
                                <div class="emply-resume-thumb"><img src="local/resources/views/images/files/xls.png" style="border-radius:50%;width:50px;" ></div>
                            </td>
                            <td style="vertical-align: middle;width: 100%;">
                                <div class="table-list-title">
                                    <h3><a href="#" title="">Foto del CV</a></h3></div>
                            </td> 
                        </tr>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-xs btn-primary">Aplicar</button>
                <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Salir</button>
              </div>
            </div>
          </div>
        </div>    
 <!--Fin Modal link usar como-->