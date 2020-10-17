<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class='col-lg-4 col-lg-offset-4'>
        <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
        <hr>
    
        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
    
        <div class="form-group">
            {{ Form::label('name', 'Role Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
    
        <h5><b>Assign Permissions</b></h5>
        @foreach ($permissions as $permission)
    
            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
    
        @endforeach
        <br>
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
    
        {{ Form::close() }}    
    </div>
</body>
</html>