<?php

function paginate($recargar, $pagina, $total_paginas, $num_adyacentes) {
	
	$anterior = "&lsaquo;";
	$siguiente = "&rsaquo;";
	$paginacion = '<ul class="pagination">';
	
	// previous label

	if($pagina==1) {
		$paginacion.= "<li class='page-item disabled'><span ><a class='page-link'>$anterior</a></span></li>";
	} 

	else if($pagina==2) {
		
		$paginacion.= "<li class='page-item '><span><a href='javascript:void(0);' onclick='cargar_datos_buscar(1)' class='page-link'>$anterior</a></span></li>";

	}else {
		
		$paginacion.= "<li class='page-item '><span><a href='javascript:void(0);' onclick='cargar_datos_buscar(".($pagina-1).")' class='page-link'>$anterior</a></span></li>";
	}
	
	// first label
	if($pagina>($num_adyacentes+1)) {
		$paginacion.= "<li class='page-item'><a href='javascript:void(0);' onclick='cargar_datos_buscar(1)' class='page-link' > 1 </a></li>";
	}
	// interval
	if($pagina>($num_adyacentes+2)) {
		$paginacion.= "<li class='page-item' ><a class='page-link'>...</a></li>";
	}

	// pages

	$pmin =($pagina>$num_adyacentes) ? ($pagina-$num_adyacentes) : 1;
	$pmax = ($pagina<($total_paginas-$num_adyacentes)) ? ($pagina+$num_adyacentes) : $total_paginas;
	
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$pagina) {
			$paginacion.= "<li class='page-item '><a class='page-link' >$i</a></li>";

		}else if($i==1) {
			$paginacion.= "<li class='page-item '><a class= 'page-link'href='javascript:void(0);' onclick='cargar_datos_buscar(1)'>$i</a></li>";
		}else {
			$paginacion.= "<li class='page-item '><a  class='page-link' href='javascript:void(0);' onclick='cargar_datos_buscar(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($pagina<($total_paginas-$num_adyacentes-1)) {
		$paginacion.= "<li class='page-item'><a class='page-link'>...</a></li>";
	}

	// last

	if($pagina<($total_paginas-$num_adyacentes)) {
		$paginacion.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargar_datos_buscar($total_paginas)'>$total_paginas</a></li>";
	}

	// next

	if($pagina<$total_paginas) {
		$paginacion.= "<li class='page-item'><span ><a class='page-link' href='javascript:void(0);' onclick='cargar_datos_buscar(".($pagina+1).")'>$siguiente</a></span></li>";
	}else {
		$paginacion.= "<li class='page-item disabled'><span><a class='page-link' >$siguiente</a></span></li>";
	}
	
	$paginacion.= "</ul>";
	return $paginacion;
}
?>
