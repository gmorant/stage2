
<!-- <?php App::import('Model', 'Domaine'); ?> -->

<?php 

$Action='action/'.($question['Question']['id']);
echo $this->Form->create('Question', array('action' => $Action)); ?>
<?php echo nl2br('<b>Information</b> : Vous répondez actuellement à l\'enquête "<b>' . $question['Enquete']['name'] .'".</b>');?>
<br>
<br>
<fieldset>	

	<h3><?php echo h('Question n°' . $question['Question']['id'] .''); ?></h3>
	<br>
	<?php $enqueteEnCours = $this->Session->read('Enquete');
			// var_dump ($enqueteEnCours); ?>
	<?php echo nl2br('<div align = "left">'.$question['Question']['name']."</div>"); ?>
	<?php
	if($question['Typesquestion']['name'] == 'QCM'){ ?>
	<div align="left"><i>Pour vous aider à faire votre choix, vous pouvez consulter le catalogue de formation <?php
		 echo $this->Html->link('ici', array('action'=> 'afficherpdf')); ?></i></div>
	<br>
	<table>
		<tr><td><div align="left" style="color:#657CFF"><u><b><li>Choix n°1 :</u></b></div></td></tr> 
		<tr>
<td><?php echo $this->Form->input('domaine1', array(
												'type'=>'select',
												'label'=>'domaine',
												'options'=>$domaines,				));?></td>
			<td><?php echo $this->Form->input('sousDomaine1', array(
												'type'=>'select',
												'label'=>'sous domaine',
												'options'=>$sousdomaines,				));?></td>
			<td><?php echo $this->Form->input('stage1', array(
												'type'=>'select',
												'label'=>'premier stage',
												'options'=>$stages,				));?></td>							
		</tr>
		<tr><td><div align="left" style="color:#657CFF"><u><b><li>Choix n°2 :</u></b></div></td><td><div align="center" style="color:#AEBAFF">______________________________________</div></td></tr>
		<tr>
			<td><?php echo $this->Form->input('domaine2', array(
												'type'=>'select',
												'label'=>'domaine',
												'options'=>$domaines,				));?></td>
			<td><?php echo $this->Form->input('sousDomaine2', array(
												'type'=>'select',
												'label'=>'sous domaine',
												'options'=>$sousdomaines,				));?></td>
			<td><?php echo $this->Form->input('stage2', array(
												'type'=>'select',
												'label'=>'deuxième stage',
												'options'=>$stages,				));?></td>
						
		</tr>
		<tr><td><div align="left" style="color:#657CFF"><u><b><li>Choix n°3 :</b></u></div></td><td><div align="center" style="color:#AEBAFF">______________________________________</div></td></tr>
		<tr>
			<td><?php echo $this->Form->input('domaine3', array(
												'type'=>'select',
												'label'=>'domaine',
												'options'=>$domaines,				));?></td>
			<td><?php echo $this->Form->input('sousDomaine3', array(
												'type'=>'select',
												'label'=>'sous domaine',
												'options'=>$sousdomaines,				));?></td>
			<td><?php echo $this->Form->input('stage3', array(
												'type'=>'select',
												'label'=>'troisème stage',
												'options'=>$stages,				));?></td>
		</tr>
		<tr><td><div align="left" style="color:#657CFF"><u><b><li>Choix libre :</b></u></div></td><td><div align="center" style="color:#AEBAFF">______________________________________</div></td></tr>
		<tr>
			<td></td>
			<td><?php echo $this->Form->input('nouvelle_demande', array('type' => 'textarea','label'=>'Nouvelle demande de stage :')); ?></td>

		</tr>
	</table>
	<?php } else { ?>
	<table>
		<tr>
			<?php echo $this->Form->input('question_id', array('type'=> 'hidden', 'value'=> $question['Question']['id'])); ?>
			<?php echo $this->Form->input('qcm_id', array('type'=> 'hidden', 'value'=> "1")); ?>
			<td>
				<?php	
				$options = array('Oui' => nl2br('Oui'), 'Non' => 'Non');
				$attributes = array('legend' => false, 'class'=>'radio', 'default' => 'Oui', 'separator' => '<td>');
				echo $this->Form->radio('label',$options, $attributes); ?>
			</td>
			<td>
				 <?php //echo $this->Form->input('domaine');  ?>

				<?php //echo $this->Form->input('Listing/client_name', array('size' => '15','id' => 'client_name', 'onclick'=> 'SelectAll("client_name")')) ;?>
			</td>
			<td>
				<?php echo $this->Form->input('qcm_attentes', array('type' => 'textarea','label'=>nl2br('Précisez vos attentes :'))); } ?>
			</td>
			
		</tr>
	</table>
	<br>
	<br><div class='submit'>
	
<?php
		//print($values);
		
	switch ($question['Question']['ordre']) {
		case '1':
		
		echo $this->Form->submit('Suivant', array('div'=>false, 'name'=>'submit')); 
			break;
		case '2':
		case '3':
		case '4':
		case '5':
			echo $this->Form->submit('Retour', array('div'=>false, 'name'=>'submit'));
			echo "&nbsp;&nbsp;";
			echo $this->Form->submit('Suivant', array('div'=>false, 'name'=>'submit')); 
			break;
		case '6':
			echo $this->Form->submit('Retour', array('div'=>false, 'name'=>'submit'));
			echo "&nbsp;&nbsp;";
			echo $this->Form->submit('Suivant', array('div'=>false, 'name'=>'submit')); 
			break;
		default:
			echo $this->redirect(array('controller'=>'enquetes','action'=>'menugestenquetes'));//gérer les problèmes de récupération de l'ordre des questions ici
			break;
	}
	?></div>

</fieldset>

<?php
for ($i=1; $i < 4 ; $i++) { 
	# code...
$this->Js->get('#QuestionDomaine'.$i);
$this->Js->event('change', 
	$this->Js->request(array(
		'controller'=>'sousdomaines',
		'action'=>'getByCategory',
		$i
		), array(
		'update'=>'#QuestionSousDomaine'.$i,
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
$this->Js->get('#QuestionDomaine'.$i);
$this->Js->event('change', 
	$this->Js->request(array(
		'controller'=>'stages',
		'action'=>'getByCategory',
		$i
		), array(
		'update'=>'#QuestionStage'.$i,
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
}

for ($i=1; $i < 4 ; $i++) { 
	# code...
$this->Js->get('#QuestionSousDomaine'.$i);
$this->Js->event('change', 
	$this->Js->request(array(
		'controller'=>'stages',
		'action'=>'getBySubCategory',
		$i
		), array(
		'update'=>'#QuestionStage'.$i,
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
}

?>
