function mostrar(){
document.getElementById('dashboard').style.display = 'block';
document.getElementById('mensaje').style.display = 'none';
document.getElementById('listarUsuarios').style.display = 'none';
document.getElementById('listarPropiedades').style.display = 'none';
document.getElementById('listarDocumentos').style.display = 'none';
document.getElementById('consultas').style.display = 'none';
}



function mostrarMsj(){
document.getElementById('mensaje').style.display = 'block';
document.getElementById('listarUsuarios').style.display = 'none';
document.getElementById('dashboard').style.display = 'none';
document.getElementById('listarPropiedades').style.display = 'none';
document.getElementById('listarDocumentos').style.display = 'none';
document.getElementById('consultas').style.display = 'none';
}

function mostrarUser(){
document.getElementById('listarUsuarios').style.display = 'block';
document.getElementById('mensaje').style.display = 'none';
document.getElementById('dashboard').style.display = 'none';
document.getElementById('listarPropiedades').style.display = 'none';
document.getElementById('listarDocumentos').style.display = 'none';
document.getElementById('consultas').style.display = 'none';
}

function mostrarPropiedades(){
document.getElementById('listarPropiedades').style.display = 'block';
document.getElementById('listarUsuarios').style.display = 'none';
document.getElementById('mensaje').style.display = 'none';
document.getElementById('dashboard').style.display = 'none';
document.getElementById('listarDocumentos').style.display = 'none';
document.getElementById('consultas').style.display = 'none';
}

function mostrarDocumentos(){
document.getElementById('listarDocumentos').style.display = 'block';
document.getElementById('listarPropiedades').style.display = 'none';
document.getElementById('listarUsuarios').style.display = 'none';
document.getElementById('mensaje').style.display = 'none';
document.getElementById('dashboard').style.display = 'none';
document.getElementById('consultas').style.display = 'none';
}

function mostrarConsultas(){
document.getElementById('consultas').style.display = 'block';
document.getElementById('listarDocumentos').style.display = 'none';
document.getElementById('listarPropiedades').style.display = 'none';
document.getElementById('listarUsuarios').style.display = 'none';
document.getElementById('mensaje').style.display = 'none';
document.getElementById('dashboard').style.display = 'none';
    
    
}
