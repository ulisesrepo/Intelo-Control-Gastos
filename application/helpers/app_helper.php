<?php
/**
 * @author Raúl Zavaleta <raul.zavaletazea@gmail.com>
 * @version 1.0
 * @copyright Impactos Digitales, 2014. Todos los Derechos reservados
*/

/**
 * @return boolean
 */
if(!function_exists("is_online")){
	function is_online(){
		$CI = &get_instance();

		return (($CI->session->userdata("isLogged")==TRUE) && ($CI->session->userdata("idUsuario")!=NULL)) ? TRUE : FALSE;

	} # en if
} # en if

/**
* @return boolean
*/

if(!function_exists("execMobile")){
	function execMobile()
	{
		$CI =& get_instance();
		$CI->load->library('mobile_detect_lib');

		$deviceView = new Mobile_detect_lib();

		return ($deviceView->isMobile()) ? TRUE : FALSE;
	}
}
# end if

/**
 * @return String
 */
if(!function_exists("userRoute")){
	function userRoute($tipoUsuario){
		
		switch ($tipoUsuario) {

			case '0':
			case '1':
				$redirect = "admin/dashboard";
				break;

			

			default:
				$redirect = "login";
				break;
		} # end switch

		return $redirect;

	} # end userRoute()

} # en if

/**
 * @param tipoUsuario 
 * @param idPermiso
 * @return boolean
 */
if(!function_exists("can_access")){
	function can_access($tipoUsuario, $idPermiso){

		$CI = &get_instance();

		$CI->load->model('auth_model');

		return ($CI->auth_model->can_access($tipoUsuario, $idPermiso)) ? TRUE : FALSE;

	} # en can_access()

} # en if

/**
 * @param idUser (Cliente)
 * @param idUser (Gestor)
 * @return boolean
 */
if(!function_exists("is_allowed")){

	function is_allowed($id_cliente, $id_consultor)
	{

		$CI =& get_instance();

		$CI->load->model("user_model");

		return ($CI->user_model->have_permission($id_cliente, $id_consultor)) ? TRUE : FALSE;
		
	} # end is_allowed()

} # ends if

/**
 * Traemos todos los movimientos de la cuentra seleccionada
 */

if (!function_exists('get_movimientos_engorda')) 
{
	function get_movimientos_engorda($idCuentaEngorda)
	{

		$CI =& get_instance();
		$CI->load->model('estadoscengorda_model');

		return $CI->estadoscengorda_model->get_movimientos_engorda($idCuentaEngorda);

	} # end get_movimiento

} # en function exists

if (!function_exists('fancy_date')) {
	function fancy_date($sql_date, $request_type = null)
	{
		$arrMonth = array(				
			'01' => 'Enero', 
			'02' => 'Febrero', 
			'03' => 'Marzo', 
			'04' => 'Abril', 
			'05' => 'Mayo', 
			'06' => 'Junio', 
			'07' => 'Julio', 
			'08' => 'Agosto', 
			'09' => 'Septiembre', 
			'10' => 'Octubre', 
			'11' => 'Noviembre', 
			'12' => 'Diciembre'
		);

		$arrWeek = array(				
			'Mon'  => 'Lunes', 
			'Tue'  => 'Martes', 
			'Wed'  => 'Miercoles', 
			'Thu'  => 'Jueves', 
			'Fri'  => 'Viernes', 
			'Sat'  => 'Sabado', 
			'Sun'  => 'Domingo'
		);
		
		$year = substr($sql_date, 0, 4); 
		$month = substr($sql_date, 5, 2);
		$day = substr($sql_date, 8, 2);
		
		if(checkdate($month, $day, $year)){
			$timestamp = strtotime($sql_date);
			$str_day = date('D', $timestamp);
			$day = (int) $day; 

			switch ($request_type) {
				case 'm-y': //SOLO REGRESAREMOS EL MES Y EL AÑO
					return $arrMonth[$month] . ' de ' . $year;
					break;

				case 'd-m-y': //REGRESAREMOS EL DIA, MES Y EL AÑO
					return $day . ' de ' . $arrMonth[$month] . ' de ' . $year;
					break;

				case 'd-m': //REGRESAREMOS EL DIA Y EL MES
					return $day . ' de ' . $arrMonth[$month];
					break;

				case 'w-d-m-y': //REGRESA EL DIA DE LA SEMANA, DIA DEL MES, MES Y AÑO
					return $arrWeek[$str_day] . ' ' . $day . ' de ' . $arrMonth[$month] . ' de  ' . $year;
					break;
				
				default:
					return $day . ' de ' . $arrMonth[$month] . ' de ' . $year;
					break;

			} # ends switch

		} #ends if 

		else{
			return "El formato de la fecha no corresponde a 'aaaa-mm-dd'";
		} # ends else

	} # ends function

} # ends if

if (!function_exists('getTasksByUser')) {
	function getTasksByUser($scrumMaster, $user){

		$CI =& get_instance();
		$CI->load->model('task_model');

		return $CI->task_model->getTasksByUser($scrumMaster, $user);


	} # ends getTaskByUser

} # end if

/* End of file app_helper.php */