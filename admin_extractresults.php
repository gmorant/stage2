<?php

App::import('Vendor', 'PHPExcel/PHPExcel', array('file' => 'PHPExcel/PHPExcel.php'));

$phpExcel = new PHPExcel();


// Gestion feuillet n°1

$Titre_Feuille1 ='applis Conception';
$phpExcel->getActiveSheet()->setTitle($Titre_Feuille1);
 


$phpExcel->setActiveSheetIndex(0);


//gestion des titres des colonnes
$styleArray = array(
    'font' => array(
        'bold' => true,
        'color'=>array('argb' => '000000'),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
 );




$phpExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($styleArray);


   


//  dimension des cellules
$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
$phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
$phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
$phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
$phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
$phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);



// création des titres des colonnes
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,1/*ligne*/,'MNEMONIQUE');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,1/*ligne*/,'DESCRIPTION');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(2/*colonne*/,1/*ligne*/,'TYPE');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(3/*colonne*/,1/*ligne*/,'Serveur / Poste client');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(4/*colonne*/,1/*ligne*/,'DGA');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(5/*colonne*/,1/*ligne*/,'EDITEUR');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(6/*colonne*/,1/*ligne*/,'Code GA Editeur');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(7/*colonne*/,1/*ligne*/,'Société');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(8/*colonne*/,1/*ligne*/,'signataire AE');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(9/*colonne*/,1/*ligne*/,'Dénomination');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(10/*colonne*/,1/*ligne*/,'Qualité');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(11/*colonne*/,1/*ligne*/,'Adresse');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(12/*colonne*/,1/*ligne*/,'Cpostal');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(13/*colonne*/,1/*ligne*/,'Ville');








$ligne=2;

//compteur des types (logiciel, outil ...)
$cpt=0;
$cpt2=0;
$cpt3=0;
$cpt4=0;
$cpt5=0;
$cpt6=0;
$cg14=0;

 





foreach ($var as $key => $value) { 
	foreach ($value as $k => $v) {
		foreach ($v as $champs => $val) {
			switch ($k) {
				case 'Application':
					switch ($champs) {
						case 'APP_Mnemonique':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,$ligne/*ligne*/,"$val");
							break;
						case 'APP_LibelleLong':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,$ligne/*ligne*/,"$val");
							break;	
						case 'APP_Type':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(2/*colonne*/,$ligne/*ligne*/,"$val");
							if ('Plate-forme'==$val) {$cpt++;}
							if ('Logiciel'==$val) {$cpt2++;}
							if ('Outil'==$val) {$cpt3++;}
							if ('Materiel'==$val) {$cpt4++;}
							if ('Infrastructure'==$val) {$cpt5++;}
							if ($val!='Plate-forme'&&$val!='Logiciel'&&$val!='Outil'&&$val!='Materiel'&&$val!='Infrastructure') {$cpt6++;}
							break;
						case 'APP_Serveur':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(3/*colonne*/,$ligne/*ligne*/,"$val");
								break;
						case 'APP_NomEditeur':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(5/*colonne*/,$ligne/*ligne*/,"$val");
							if($val=='CG14'){$cg14++;}
							break;
						case 'APP_CodeGA':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(6/*colonne*/,$ligne/*ligne*/,"$val");
							break;
						case 'prestataires_id':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(9/*colonne*/,$ligne/*ligne*/,(isset($montab[$val])?$montab[$val]:''));
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(10/*colonne*/,$ligne/*ligne*/,(isset($montab2[$val])?$montab2[$val]:''));
					
					}
					break;
				case 'Prestataire':
					switch ($champs) {
						case 'PRE_Societe':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(7/*colonne*/,$ligne/*ligne*/,"$val") ;
							break;
						case 'PRE_Nom':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(8/*colonne*/,$ligne/*ligne*/,"$val");
							break;
						case 'PRE_Adresse':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(11/*colonne*/,$ligne/*ligne*/,"$val");
							break;
						case 'PRE_CP':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(12/*colonne*/,$ligne/*ligne*/,"$val");
							break;
						case 'PRE_Ville':
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(13/*colonne*/,$ligne/*ligne*/,"$val");
							break;
						
					}
				case 'Moa':
					if($champs=='MOA_Mnemonique') {
							$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(4/*colonne*/,$ligne/*ligne*/,"$val");
					}
			break;	
				
			}
			
			
		}
		
			
	}
		
		
		$ligne++;
	
			
}


$phpExcel->getActiveSheet()->setAutoFilter("A1:N$ligne");


// gestion des bordures
 $phpExcel->getActiveSheet()->getStyle("A1:N$ligne")->getBorders()->applyFromArray(
     		array(
     			'allborders' => array(
     				'style' => PHPExcel_Style_Border::BORDER_THIN,
     				'color' => array(
    					
     				)
     			)
     		)
     );


 
//passage automatique à la ligne et ajustement des cellules
 $phpExcel->getActiveSheet()->duplicateStyleArray(array(
          'alignment'=>array(
                        'shrinkToFit'=>true,
 						'wrap'=>true,
			
 			'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER))
, "A1:N$ligne");
                    



$phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);


// Gestion du feuillet n°2


$phpExcel->createSheet();
$phpExcel->setActiveSheetIndex(1);
$phpExcel->getActiveSheet()->setTitle('tableau nombre de type');

$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

//gestion des bordures du tableau nombre de type
$phpExcel->getActiveSheet()->getStyle('A1:D7')->getBorders()->applyFromArray(
    	array(
    			'allborders' => array(
    			'style' => PHPExcel_Style_Border::BORDER_THIN,
    			'color' => array(
    					
    		)
    	)
    )
);

//calcul du total de nombre de type
$total=$cpt+$cpt2+$cpt3+$cpt4+$cpt5+$cpt6;

//creation du tableau nombre de type
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,1/*ligne*/,'Plate-Forme');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,1/*ligne*/,$cpt);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,2/*ligne*/,'Logiciel');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,2/*ligne*/,$cpt2);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,3/*ligne*/,'Outil');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,3/*ligne*/,$cpt3);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,4/*ligne*/,'Materiel');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,4/*ligne*/,$cpt4);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,5/*ligne*/,'Infrastructure');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,5/*ligne*/,$cpt5);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,6/*ligne*/,'Autres');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,6/*ligne*/,$cpt6);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(0/*colonne*/,7/*ligne*/,'Total');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(1/*colonne*/,7/*ligne*/,$total);
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(2/*colonne*/,1/*ligne*/,'Editeur CG14');
$phpExcel->getActiveSheet()->setCellValueByColumnAndRow(3/*colonne*/,1/*ligne*/,$cg14);

$phpExcel->setActiveSheetIndex(0);

// bloc de génération du rendu excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"test_ocean.xls\"");
 
$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
$objWriter->save("php://output");
exit;

?>
