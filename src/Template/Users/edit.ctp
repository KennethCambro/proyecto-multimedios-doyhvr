<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- link to add new users page -->
<div class='upper-right-opt'>
<?php  echo $this->html->link('Lista Usuarios',array('controller'=>'Users','action'=>'index'));  ?>
</div>
<body>
<?php 
        echo $this->Form->create('User' ,array('class'=>'callout text-center'));    
        echo "<h1>Editar usuario </h1>";
        echo $this->Form->input('nombre', array('class'=>'input','value'=>$user->nombre, 'id'=>'nombre', 'placeholder'=>'Nombre completo') );
        echo $this->Form->input('cedula', array('class'=>'input','value'=>$user->cedula, 'id'=>'cedula', 'placeholder'=>'Cedula'));
        echo $this->Form->input('direccion', array('class'=>'input','value'=>$user->direccion, 'id'=>'direccion', 'placeholder'=>'Direccion'));
        echo $this->Form->input('telefono', array('class'=>'input','value'=>$user->telefono,  'id'=>'telefono', 'placeholder'=>'Telefono'));
        echo $this->Form->input('email', array('class'=>'input','value'=>$user->email, 'id'=>'email','placeholder'=>'Correo electronico'));
        echo $this->Form->input('password', array('class'=>'input','value'=>$user->password,  'id'=>'password', 'placeholder'=>'Contraseña'));
        
        echo $this->Form->button(__('Edit User'),['class'=>'button primary']);  

        echo $this->Form->end();
        ?>
        </form>
        </div>
    </body>
</html>