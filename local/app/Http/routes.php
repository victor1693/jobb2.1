<?php
//Sistema
Route::get('token', function(){ echo csrf_token();});
 
Route::get('error', function () {return view('errors.500');}); 
//********************************************************//
//*            RUTAS GENERALES DEL SISTEMA               *//
//********************************************************//
Route::get('/', 'con_index@index');
Route::get('inicio', 'con_index@index');
Route::get('nosotros', function () {return view('nosotros');});
Route::get('contacto', function () {return view('contacto');});
Route::get('noticias',  'con_noticias@index');
Route::post('noticias',  'con_noticias@index');
Route::get('noticias/{id}', 'con_noticias@noticia');
Route::get('terminos', function () {return view('terminos');});
Route::get('fag', 'con_administrator_faq@detalle_preguntas'); 

Route::post('ofertas', 'con_ofertas@index');
//Route::get('detalleoferta/{id}', 'con_ofertas@detalle');
Route::get('ofertas', 'con_ofertasv2@index');
Route::post('ws', 'con_ofertasv2@ws');
Route::get('detalleoferta/{id}', 'con_ofertasv2@detalle_oferta');

Route::post('loguear', 'con_login@log');
Route::get('socialmedia', 'con_login@log');
Route::get('descargar/{id}', 'con_candidato_cv@descargar');
Route::get('logout', 'con_login@salir');
Route::get('login', 'con_login@logincandidato');
Route::get('registrar', function () {return view('candidato_register');});
Route::get('recuperarclave', 'con_login@recuperar');
Route::post('recuperarclave', 'con_login@enviar');
Route::get('localidades/{id_provincia}', 'con_gral@getLocalidades');
Route::get('sectores/{id_area}', 'con_gral@getSectores');
Route::post('register', 'con_login@register');
Route::post('existEmail', 'con_login@existEmail');
Route::post('regreferido', 'con_login@regReferido');
Route::get('r/{token}/{tipo}', 'con_login@vregreferidos');
Route::post('subir', 'con_maletin@postUpload');
Route::post('listar_arch', 'con_maletin@listarArch');
Route::get('candidato/{id}', 'con_candidato_perfil_publico@perfilPublico');
Route::post('regcontato', 'con_contacto@create');
Route::get('candidatos', 'con_candidatos@index');
Route::post('candidatos', 'con_candidatos@index');
Route::get('loginsoporte', 'con_soportista@inicio');
Route::post('logsoporte', 'con_soportista@login');
Route::get('redactores',  function () {return view('noticias_login');});  
Route::get('redes_users',  function () {return view('redes_users');});  
Route::post('logredactores', 'con_noticias_dashboard@login');
Route::post('candimensajes_soporte', 'con_soporte@mensajes_cand');
Route::get('descargar/{archivo}', 'con_candidatos_perfil_publico@descargar');
Route::get('redes/{red}', 'con_log_social@redirectToProvider');
Route::get('callback/{red}', 'con_log_social@callback');
Route::post('addcallback', 'con_log_social@add_user');
Route::post('evaluacion', 'con_candidatos@evaluacionJobbers');

/**Publicidad empresas**/
Route::get('company/detalle/{id}',   'con_company_publicidad@index');
Route::post('company/recomendar',   'con_company_publicidad@recomendar');
Route::post('company/valorar',   'con_company_publicidad@valorar');


//********************************************************//
//*                RUTAS NUEVAS EMPRESAS                 *//
//********************************************************//
Route::get('empresas/entrar', function () {return view('empresas.login');});
Route::get('empresas/registro', 'con_company@index_register');
Route::get('empresas/recuperacion', function () {return view('empresas.recuperacion');});
Route::get('empresas/salir', 'con_company_login@logout');
Route::post('empresas/registrar', 'con_company@registrar');
Route::post('empresas/localidades', 'con_company@get_localidades');
Route::post('empresas/login', 'con_company_login@login');
 


Route::group(['middleware' => 'log_company'], function () {
//Inicio
Route::get('empresas/panel', 'con_company_home@index');	 

//Mi perfil
Route::get('empresas/perfil', 'con_company_profile@index');
Route::post('empresas/infogeneral', 'con_company_profile@info_general');
Route::post('empresas/infocontacto', 'con_company_profile@info_contacto');
Route::post('empresas/inforedes', 'con_company_profile@info_redes'); 
Route::post('empresas/infoyoutube', 'con_company_profile@info_youtube');
Route::post('empresas/infoimagen', 'con_company_profile@info_imagen');

//Configuracion
 Route::get('empresas/configuracion', 'con_company_configuracion@index');
 Route::post('empresas/cambioclave', 'con_company_configuracion@cambio_clave');
 //Ofertas
 Route::get('empresas/ofertas', 'con_company_ofertas@index');
 Route::post('empresas/publicar', 'con_company_ofertas@publicar');
 Route::post('empresas/ofertas', 'con_company_ofertas@get_ofertas');
 Route::post('empresas/updatestatus', 'con_company_ofertas@update_estatus');
 Route::post('empresas/eliminar', 'con_company_ofertas@eliminar');
 Route::post('empresas/oferta', 'con_company_ofertas@get_oferta');
 //Planes
 Route::get('empresas/planes', 'con_company_planes@index');
 Route::post('empresas/bienvenida', 'con_company_planes@bienvenida');
 Route::post('empresas/modalvenc', 'con_company_planes@modal_venc');

 //Postulados
 Route::post('empresas/postulados', 'con_company_postulados@get_postulados');
 Route::post('empresas/cv', 'con_company_postulados@get_cv');
  Route::post('empresas/marcador', 'con_company_postulados@marcador');
});
//********************************************************//

//********************************************************//
//*                RUTAS PARA LOS REDACTORES             *//
//********************************************************//

Route::get('reporte/{id}', 'con_cv@index');

Route::group(['middleware' => 'log_r'], function () {
Route::get('notipublicaciones', 'con_noticias_dashboard@publicaciones');
Route::post('addpublicacion', 'con_noticias_dashboard@add_publicacion');
Route::post('addcategoria', 'con_noticias_dashboard@add_categoria');
Route::get('noticategorias', 'con_noticias_dashboard@categorias');
Route::get('panelnoticias', 'con_noticias_dashboard@index');
Route::get('categoriadel/{id}', 'con_noticias_dashboard@del_categoria');
Route::get('noticiadel/{id}', 'con_noticias_dashboard@del_publicacion');
Route::get('noticiaestado/{idnoticia}/{estado}', 'con_noticias_dashboard@set_estado');
Route::get('panelnoticias/{id}', 'con_noticias_dashboard@editar_noticia');
Route::post('editpublicacion', 'con_noticias_dashboard@edit_publicacion');
Route::get('redactoressalir', 'con_noticias_dashboard@salir');  
});

//********************************************************//
//*           RUTAS PARA EL PROCESO DE POSTULADOS 		  *//
//********************************************************//
Route::post('postulados/filtrar', 'con_postulados@filtrar');
Route::post('postulados/calificar-marcar', 'con_postulados@calificarMarcar');
Route::post('postulados/info', 'con_postulados@getCalificacionMarcador');

//********************************************************//
//*           RUTAS PARA EL PROCESO DE PAGOS 			  *//
//********************************************************//
Route::post('pagos/requestMP', 'con_pagos@requestMP');
Route::post('pagos/update', 'con_pagos@updatePlan');


//********************************************************//
//*                RUTAS PARA LOS SOPORTISTAS            *//
//********************************************************// s
Route::group(['middleware' => 'log_s'], function () { 
Route::post('soportmensaje', 'con_soportista@responder');
Route::get('soportista/{id}', 'con_soportista@index');
Route::get('salirsoportista', 'con_soportista@salir');
});
//********************************************************//
//*                 RUTAS PARA LOS CANDIDATOS            *//
//********************************************************//
Route::group(['middleware' => 'log_c'], function () {
Route::get('candidashboard', 'con_candidato_dashboard@dashboard');
Route::post('localidades', 'con_candidato_perfil_publico@localidades');
Route::get('candifavoritos', 'con_candidato_favoritos@index');
Route::get('candifaveliminar/{id}', 'con_candidato_favoritos@eliminar');
Route::post('candisetfavorite', 'con_candidato_favoritos@setFavorite');
Route::get('candimaletin', 'con_maletin@indexcandidato');
Route::post('actarch', 'con_maletin@alias'); //Actualiza los alias
Route::get('delarchivo/{id}', 'con_maletin@eliminar'); //Elimina los archivos
Route::get('descargar/{archivo}', 'con_perfil_publico@descargar'); // Descarga los archivos
Route::get('candiconfiguracion', 'con_candidatos_configuracion@index');
Route::post('candisetprofilepic', 'con_candidatos_configuracion@setProfilePic');
Route::post('candiactualizardatos', 'con_candidatos_configuracion@actualizardatos');
Route::get('candipostulaciones', 'con_candidato_postulaciones@index');
Route::post('candipostular', 'con_candidato_postulaciones@postular'); 
Route::get('candiperfil', 'con_candidato_perfil_publico@perfil');
Route::get('candicv', 'con_candidato_cv@index');
Route::get('candisoporte', 'con_soporte@candidato');
Route::get('candisoported/{id}', 'con_soporte@detalle'); 
Route::get('candirecomendaciones', 'con_candidato_recomendaciones@index');
Route::post('candirecomendar', 'con_candidato_recomendaciones@recomendar');
Route::get('canditienda', function () {return view('candidato_tienda');});
Route::get('candireferidos', 'con_candidato_referidos@index');
Route::get('candiredes', 'con_candidato_redes@index');
Route::post('candiredescrear', 'con_candidato_redes@crear');

Route::post('candidatosper', 'con_candidato_perfil_publico@datos_personales');
Route::post('candipreflab', 'con_candidato_perfil_publico@datos_preferencias_laborales');
Route::post('candicontac', 'con_candidato_perfil_publico@datos_contacto');
Route::post('candiestudios', 'con_candidato_perfil_publico@estudios');
Route::post('candiexpe', 'con_candidato_perfil_publico@expe_lab');
Route::post('candisethabilidad', 'con_candidato_perfil_publico@set_habilidad');
Route::post('candisetidioma', 'con_candidato_perfil_publico@set_idioma');
Route::get('candidelestudios/{id}', 'con_candidato_perfil_publico@del_education');
Route::get('candidelexpe/{id}', 'con_candidato_perfil_publico@del_expe');

Route::post('agregarcv', 'con_candidato_cv@add_cv');
Route::post('candiselectsv', 'con_candidato_cv@select_cv');
Route::get('candidelcv/{id}', 'con_candidato_cv@del_cv');
Route::post('candisoporte', 'con_soporte@add_suport_candidato'); 
Route::post('candiaddmensaje', 'con_soporte@add_mensajes_cand');
Route::get('candiempseg','con_candidato_seguir@index'); 
Route::get('candiseguir/{id}', 'con_candidato_seguir@seguir');
Route::get('canddelseg/{id}', 'con_candidato_seguir@eliminar'); 
Route::post('testcontrolador', 'con_candidatos@test_controlador');
Route::post('addcv', 'con_candidato_cv@addcv');
Route::post('setprofilepic', 'con_candidato_perfil_publico@imagen_perfil');
Route::get('cvjobbers', 'con_candidato_cv@seleccionar_cv_jobbers');
});
//********************************************************//
//*                RUTAS PARA LAS EMPRESAS               *//
//********************************************************//
Route::get('empresas', 'con_company@ver');

Route::get('empresa', 'con_empresa@login');
Route::get('empresa/registro', 'con_empresa@registroView');
Route::post('empresa/exists', 'con_empresa@existEmpresa'); // Verifica si existe la empresa o no.
Route::post('empresa/registro_success', 'con_empresa@registro'); // Verifica si existe la empresa o no.
Route::get('empresa/detalle/{id}', 'con_company@detalle');
Route::get('detalle_curso/{id}', 'con_empresa@detalle_curso');

Route::group(['middleware' => 'log_e'], function () {
Route::get('empresa/perfil', 'con_empresa@profile');
Route::get('empresa/new_post', 'con_empresa@newPost');
Route::get('empresa/edit_post/{id_post}', 'con_empresa@editPost');
Route::get('empresa/ofertas', 'con_empresa@ofertas');
Route::get('empresa/planes', 'con_empresa@planes');
Route::get('empresa/candidatos-postulados/{id_publicacion}', 'con_empresa@postulados');
Route::post('empresa/registrar_post', 'con_empresa@registerPost');
Route::post('empresa/actualizar_post', 'con_empresa@updatePost');
Route::post('empresa/actualizar_profile', 'con_empresa@actualizarProfile');
Route::post('empresa/uploadImage', 'con_empresa@uploadImage');
Route::get('empresa/post/{accion}/{id_post}', 'con_empresa@accionPost');
Route::get('empresa/plantillas', 'con_empresa@plantillas');
Route::get('empresa/new_curso', 'con_empresa@crearCursos');
Route::post('empresa/storeCurso', 'con_empresa@storeCurso')->name('test');
Route::get('empresa/cursos', 'con_empresa@cursos');
Route::get('empresa/cursos/edit/{id}', 'con_empresa@editCurso');
Route::post('empresa/editCurso', 'con_empresa@editStoreCurso');
Route::post('empresa/request_info_curso', 'con_empresa@request_info_curso');
});


Route::post('admincandidatosper', 'con_candidato_perfil_publico@datos_personales');
Route::post('admincandidatosper', 'con_candidato_perfil_publico@datos_personales');
Route::post('admincandipreflab', 'con_candidato_perfil_publico@datos_preferencias_laborales');
Route::post('admincandicontac', 'con_candidato_perfil_publico@datos_contacto');
Route::post('admincandiestudios', 'con_candidato_perfil_publico@estudios');
Route::post('admincandiexpe', 'con_candidato_perfil_publico@expe_lab');
Route::post('admincandisethabilidad', 'con_candidato_perfil_publico@set_habilidad');
Route::post('admincandisetidioma', 'con_candidato_perfil_publico@set_idioma');
Route::get('admincandidelestudios/{id}', 'con_candidato_perfil_publico@del_education');
Route::get('admincandidelexpe/{id}', 'con_candidato_perfil_publico@del_expe');
 Route::post('adminsetprofilepic', 'con_candidato_perfil_publico@imagen_perfil');
Route::post('admincandiredescrear', 'con_candidato_redes@crear');

Route::get('administrator', 'con_administrator_login@index');
Route::get('administracion/candidatos/eliminar', 'con_administrator_candidatos@eliminar_candidato');
Route::get('administracion/noticias', 'con_administrator_noticias@index');
Route::get('administracion/noticias/eliminar/{id}', 'con_administrator_noticias@eliminar_noticia');
Route::get('administracion/noticias/publicar', 'con_administrator_noticias@publicar');
Route::get('administracion/noticias/categorias', 'con_administrator_noticias@categorias');
Route::get('administracion/noticias/{id}', 'con_administrator_noticias@editar')->where(['id' => '[0-9]+']);;
Route::get('administracion/noticias/bloquear/{id}', 'con_administrator_noticias@noticias_bloquear')->where(['id' => '[0-9]+']);
Route::get('administracion/noticias/desbloquear/{id}', 'con_administrator_noticias@noticias_desbloquear')->where(['id' => '[0-9]+']);
 
//********************************************************//
//*       RUTAS PARA EL ADMINISYTRADOR DE SISTEMA        *//
//********************************************************//

Route::get('administrador', 'con_administrator_login@index');
Route::post('admlog', 'con_administrator_login@login');
Route::post('administracion/empresas/plantillas', 'con_administrator_empresas@plantillaStore');
Route::get('administracion/empresas/plantilla_info/{id}', 'con_administrator_empresas@getInfoPlantilla');
 

Route::group(['middleware' => 'log_a'], function () {
/** Publicidad a empresas **/
Route::get('administracion/publicidad', 'con_company_publicidad@indexEmpresa');   
Route::get('administracion/eliminar/publicidad/{id}', 'con_company_publicidad@eliminar');
Route::get('administracion/eliminar/recomendada/{id}', 'con_company_publicidad@eliminar_sugerida'); 
Route::get('administracion/editar/publicidad/{id}', 'con_company_publicidad@editar_index');   
Route::post('administracion/addpublicidad', 'con_company_publicidad@add_empresa');
Route::post('administracion/editpublicidad', 'con_company_publicidad@edit_empresa');
/****/
Route::get('admsalir', 'con_administrator_login@salir'); 
Route::get('administracion/contacto', 'con_administrator_contacto@index');
Route::get('administracion/contacto/{id}', 'con_administrator_contacto@ver')->where(['id' => '[0-9]+']);
Route::get('administracion/candidatos', 'con_administrator_candidatos@index');
Route::get('administracion/candidatos/nuevo', 'con_administrator_candidatos@nuevo');
Route::get('administracion/candidatos/{id}', 'con_administrator_candidatos@editar')->where(['id' => '[0-9]+']);
Route::get('administracion/candidatos/resumen/{id}', 'con_administrator_candidatos@resumen')->where(['id' => '[0-9]+']);
Route::get('administracion/candidatos/{id}', 'con_administrator_candidatos@editar')->where(['id' => '[0-9]+']);
Route::get('administracion/candidatos/postulaciones/{id}', 'con_administrator_candidatos@postulaciones')->where(['id' => '[0-9]+']);
Route::get('administracion/candidatos/recomendaciones/{id}', 'con_administrator_candidatos@recomendaciones')->where(['id' => '[0-9]+']);
Route::post('administracion/candidatos/nuevo', 'con_administrator_candidatos@agregar_nuevo');
Route::post('administracion/candidatos/enviar', 'con_administrator_candidatos@enviar_correo'); 
	Route::get('administracion/noticias', 'con_administrator_noticias@index');
	Route::get('administracion/noticias/eliminar/{id}', 'con_administrator_noticias@eliminar_noticia');
	Route::get('administracion/noticias/publicar', 'con_administrator_noticias@publicar');
	Route::get('administracion/noticias/categorias', 'con_administrator_noticias@categorias');
	Route::get('administracion/noticias/{id}', 'con_administrator_noticias@editar')->where(['id' => '[0-9]+']);;
	Route::get('administracion/noticias/bloquear/{id}', 'con_administrator_noticias@noticias_bloquear')->where(['id' => '[0-9]+']);
	Route::get('administracion/noticias/desbloquear/{id}', 'con_administrator_noticias@noticias_desbloquear')->where(['id' => '[0-9]+']);
   Route::get('administracion/panel', 'con_administrator_dashboard@index');
	Route::get('administracion/configuracion', 'con_administrator_configuracion@index');
	Route::get('administracion/redactores', 'con_administrator_noticias@redactores');
	Route::get('administracion/redactores/{id}', 'con_administrator_noticias@redactores_editar')->where(['id' => '[0-9]+']);
	Route::get('administracion/redactores/bloquear/{id}', 'con_administrator_noticias@redactores_bloquear')->where(['id' => '[0-9]+']);
	Route::get('administracion/redactores/desbloquear/{id}', 'con_administrator_noticias@redactores_desbloquear')->where(['id' => '[0-9]+']);
	Route::get('administracion/redactores/nuevo', 'con_administrator_noticias@redactores_nuevo');
 	Route::get('administracion/soportistas', 'con_administrator_soportistas@soportistas');
	Route::get('administracion/soportistas/{id}', 'con_administrator_soportistas@soportistas_editar')->where(['id' => '[0-9]+']);
	Route::get('administracion/soportistas/bloquear/{id}', 'con_administrator_soportistas@soportistas_bloquear')->where(['id' => '[0-9]+']);
	Route::get('administracion/soportistas/desbloquear/{id}', 'con_administrator_soportistas@soportistas_desbloquear')->where(['id' => '[0-9]+']);
	Route::get('administracion/soportistas/nuevo', 'con_administrator_soportistas@soportistas_nuevo');
 	Route::get('administracion/contacto', 'con_administrator_contacto@index');
	Route::get('administracion/contacto/{id}', 'con_administrator_contacto@ver')->where(['id' => '[0-9]+']);
	Route::get('administracion/candidatos', 'con_administrator_candidatos@index');
	Route::get('administracion/candidatos/nuevo', 'con_administrator_candidatos@nuevo');
	Route::get('administracion/candidatos/{id}', 'con_administrator_candidatos@editar')->where(['id' => '[0-9]+']);
	Route::get('administracion/candidatos/resumen/{id}', 'con_administrator_candidatos@resumen')->where(['id' => '[0-9]+']);
	Route::get('administracion/candidatos/{id}', 'con_administrator_candidatos@editar')->where(['id' => '[0-9]+']);
	Route::get('administracion/candidatos/postulaciones/{id}', 'con_administrator_candidatos@postulaciones')->where(['id' => '[0-9]+']);
	Route::get('administracion/candidatos/recomendaciones/{id}', 'con_administrator_candidatos@recomendaciones')->where(['id' => '[0-9]+']);

	#################### ADM DE EMPRESAS ################################

	Route::get('administracion/empresas', 'con_administrator_empresas@index');
	Route::get('administracion/empresas/create', 'con_administrator_empresas@create');
	Route::post('administracion/empresas/store', 'con_administrator_empresas@register');
	Route::post('administracion/empresas/editstore', 'con_administrator_empresas@editStore');
	Route::get('administracion/empresas/suspender-habilitar/{accion}/{id}', 'con_administrator_empresas@suspender_habilitar')->where(['accion' => '[0-1]', 'id' => '[0-9]+']);
	Route::get('administracion/empresas/edit/{id}', 'con_administrator_empresas@edit')->where(['id' => '[0-9]+']);
	Route::get('administracion/empresas/delete/{id}', 'con_administrator_empresas@delete')->where(['id' => '[0-9]+']);
	Route::get('administracion/empresas/plantillas', 'con_administrator_empresas@plantillas');
	Route::get('administracion/empresas/ofertas-renovar', 'con_administrator_empresas@ofertasForRenew');
	Route::get('administracion/empresas/renewOferta/{id_pub}/{id_empresa}', 'con_administrator_empresas@renewOferta')->where(['id_pub' => '[0-9]+', 'id_empresa' => '[0-9]+']);
	Route::get('administracion/empresas/cursos-aprobar', 'con_administrator_empresas@cursosForApprove');
	Route::get('administracion/empresas/aprobarCurso/{id}', 'con_administrator_empresas@approveCurso');


	#########################################################################



	Route::post('administracion/buscarnoticia', 'con_administrator_noticias@index');
	Route::post('administracion/actualizarconfiguracion', 'con_administrator_configuracion@actualizar');
	Route::post('administracion/actualizarconfiguracionempresa', 'con_administrator_configuracion@actualizarempresa');
	Route::post('administracion/actualizarredactor', 'con_administrator_noticias@actualizar_redactores');
	Route::post('administracion/nuevoredactor', 'con_administrator_noticias@nuevo_redactor');
	Route::post('administracion/nuevosoportista', 'con_administrator_soportistas@nuevo_soportista');
	Route::post('administracion/actualizarsoportista', 'con_administrator_soportistas@actualizar_soportista');
	Route::post('administracion/actualizarnoticias', 'con_administrator_noticias@actualizar_noticia');
	Route::post('administracion/publicarnoticias', 'con_administrator_noticias@nueva_noticia');

});
 