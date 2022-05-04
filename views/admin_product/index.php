<?php include ROOT.'/views/include/admin_header.php'; ?>
    <!-- END Header -->

    <!-- Content -->
    <div id="content" class="flex">
        
        <h1>Выберите товары для изменения</h1>
        
  <div id="content-main">
    
        <ul class="object-tools">
          
  
  <li>
    
    <a href="/admin/products/create/" class="addlink">
      Добавить товар
    </a>
  </li>

        </ul>
  


<!-- <a href="/admin/products/create/" class="addlink">
      Добавить товар
    </a> -->



    
    <div class="module" id="changelist">
      

      <form id="changelist-form" method="post" novalidate><input type="hidden">

      
          
<div class="actions">
  
    
    <label>Действие: <select name="action" required>
  <option value="" selected>---------</option>

  <option value="delete_selected">Удалить выбранные товары</option>

</select></label><input type="hidden" name="select_across" value="0" class="select-across">
    
    
    <button type="submit" class="button" title="Выполнить выбранное действие">Выполнить</a></button>
    
    
    
        <span class="action-counter" data-actions-icnt="8">Выбрано 0 объектов из 8 </span>
        
    
    
  
</div>

          

<input type="button" value="Выделить все" onclick="check();">
<input type="button" value="Снять выделение" onclick="uncheck();">

<table id="result_list">
<thead>
<tr>

<th scope="col"  class="action-checkbox-column">
   

</th>
<th scope="col"  class="column-__str__">
   
   <div class="text"><span>Товары</span></div>
   <div class="clear"></div>
</th>

</tr>
</thead>



<tbody>


<?php foreach ($productsList as $product): ?>
	<tr class="row1">
    <td class="action-checkbox">
    	<input type="checkbox" name="_selected_action[]" value="<?php echo $product['id'];?>" class="action-select">
    </td>
    	<th class="field-__str__">
     		 <a href="/admin/products/update/<?php echo $product['id'];?>">
     		 	 ID <?php echo  $product['id']; ?> | Книга - <?php echo  $product['name']; ?>. Автор - <?php echo  $product['author']; ?>
     		 </a>
 		</th>
	</tr>
<?php endforeach;?>

</tbody>
</table>
</form>
          
      
      

<p class="paginator">



</body>
</html>


<?php include ROOT.'/views/include/admin_footer.php'; ?>