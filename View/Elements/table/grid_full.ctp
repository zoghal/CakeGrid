<div class="DataGrid box box-child-row box-fluid">
	<div class="box-fluid">
	<table class="headerTable <?php echo $options['class_table'] ?>">
		<thead>
			<?php echo $headers ?>
		</thead>
	
		<tbody>
			<?php echo $results ?>
		</tbody>
	</table>
	</div>
	<div class="Footer">
			<div >	<?= $this->Paginator->counter('صفحه : {:page} از {:pages}'	); 	?>	</div>  
			<div >	<?= $this->Paginator->counter('تعداد سطرها : {:current} از {:count}'	); 	?>	</div>  
			<div >	<?= $this->Paginator->counter('شروع شده از رکورد {:start} تا  {:end} '	); 	?>	</div>  
		
				<?php
				
				if ( $this->Paginator->hasPage(null,2) ){   
				  echo '<div>';
				 echo $this->Paginator->first(' ابتدا' . ' | ' ); 
				 echo $this->Paginator->prev( __('صفحه قبل').' | ' , array(), null, array('class' => 'prev disabled')); 
				 echo $this->Paginator->next( __('صفحه بعد') .' | ' , array(), null, array('class' => 'prev disabled')); 
				 echo $this->Paginator->last('انتها');
				echo '</div><div>';
				 echo $this->Paginator->numbers();
				echo '</div>';
				}
			?>  
	</div> 	
</div>