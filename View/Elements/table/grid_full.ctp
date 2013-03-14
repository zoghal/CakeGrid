<div class="DataGrid">
	<table class="headerTable <?php echo $options['class_table'] ?>">
		<thead>
			<?php echo $headers ?>
		</thead>
	
		<tbody>
			<?php echo $results ?>
		</tbody>
	</table>

	<div class="Footer">
			<div >
		 	<?php 
			 	echo $this->Paginator->counter('
			    	صفحه : {:page} از {:pages} , تعداد سطرها : {:current} از {:count},  شروع شده از رکورد {:start} تا  {:end} '
			    	); 
				?>
			</div>  
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