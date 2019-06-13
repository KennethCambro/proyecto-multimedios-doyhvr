<h2>Registro Usuario</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
<?php echo $this->html->link('+Nuevo Usuario',array('controller'=>'Users','action'=>'add')); ?>
</div>
 
<form class="callout secondary">
        <table class="dashboard-table">
            <colgroup>
                <col width="auto">
                <col width="auto">
                <col width="auto">
                <col width="auto">
                <col width="auto">
                <col width="auto">
                <col width="auto">
            </colgroup>
            <thead class="thead">
                <tr>
                <th><a href="#">ID<i class="fa fa-caret-down"></i></a></th>
                <th><a href="#">Nombre<i class="fa fa-caret-down"></i></a></th>
                <th><a href="#">Cédula<i class="fa fa-caret-down"></i></a></th>
                <th><a href="#">Dirección<i class="fa fa-caret-down"></i></a></th>
                <th><a href="#">Email<i class="fa fa-caret-down"></i></a></th>
                <th><a href="#">Modificar<i class="fa fa-caret-down"></i></a></th>
                <th><a href="#">Eliminar<i class="fa fa-caret-down"></i></a></th>
                </tr>
            </thead>
            
            <tbody class=tbody>
    <?php
    if(!empty($users)):
    //loop to show all retrieved records
    foreach( $users as $user ){
        echo "<tr>";
            echo "<td class='listing-inquiry-status'> <h6 class='dashboard-table-text'>{$user->id}</h6></td>";
            echo "<td class='listing-inquiry-status'> <h6 class='dashboard-table-text'>{$user->nombre}</h6></td>";
            echo "<td class='listing-inquiry-status'> <h6 class='dashboard-table-text'>{$user->cedula}</h6></td>";
            echo "<td class='listing-inquiry-status'> <h6 class='dashboard-table-text'>{$user->direccion}</h6></td>";
            echo "<td class='listing-inquiry-status'> <h6 class='dashboard-table-text'>{$user->email}</h6></td>";
            echo "<td class='listing-inquiry-status'>
                    <h6 class='dashboard-table-text'>
                   {$this->Html->link( 'Edit', array('controller'=>'Users','action' => 'edit', $user->id),array('class'=>'button expanded sucesss') )}</h6>
                </td>";
            echo " <td class='listing-inquiry-status'>
                    <h6 class='dashboard-table-text'>
                    {$this->Html->link( 'Delete', array('controller'=>'Users','action' => 'delete', $user->id),array('class'=>'button expanded alert') )}</h6>   
                 </td>";

            echo "</td>";
        echo "</tr>";
    }else:
        echo "<td>No record found</td>";
    endif;
    ?>
    </tbody>
            
  </table>
</form>