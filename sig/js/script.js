/*ver0*/
const pass0 = document.getElementById('pass');
const ver_pass = document.getElementById('ver_pass');
const noVer_pass = document.getElementById('noVer_pass');
noVer_pass.style.display = 'none';
ver_pass.style.display = 'block';
ver_pass.addEventListener('click', () => {
    pass0.type = 'text';
    noVer_pass.style.display = 'block';
    ver_pass.style.display = 'none';
});
noVer_pass.addEventListener('click', () => {
    pass0.type = 'password';
    ver_pass.style.display = 'block';
    noVer_pass.style.display = 'none';
});
/*ver2*/
const pass2 = document.getElementById('pass2');
const ver_pass2 = document.getElementById('ver_pass2');
const noVer_pass2 = document.getElementById('noVer_pass2');
noVer_pass2.style.display = 'none';
ver_pass2.style.display = 'block';
ver_pass2.addEventListener('click', () => {
    pass2.type = 'text';
    noVer_pass2.style.display = 'block';
    ver_pass2.style.display = 'none';
});
noVer_pass2.addEventListener('click', () => {
    pass2.type = 'password';
    ver_pass2.style.display = 'block';
    noVer_pass2.style.display = 'none';
});
/*comparacion de contraseña*/
$(document).ready(function() {
	$('.pass').keyup(function() {
		var pass4 = $('.pass').val();
		var pass3 = $('.pass2').val();
		if ( pass3 == pass4 ) {
			$('#error').text("COINCIDEN").css("color","green");
		} else {
			$('#error').text("NO COINCIDEN").css("color","red");
		}
	});
});

function letras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    er = /^[a-z ]/;
    a = er.test(tecla);
    if(!a){
        e.preventDefault();
    }
}

const searchInput = document.getElementById('search-input');
const tableBody = document.getElementById('tabla_body');

searchInput.addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = tableBody.rows;

    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.cells;

        let match = false;

        for (let j = 0; j < cells.length; j++) {
        const cell = cells[j];
        const cellText = cell.textContent.toLowerCase();

            if (cellText.includes(searchTerm)) {
                match = true;
                break;
            }
        }

        if (match) {
            row.style.display = '';
        } 
        else {
            row.style.display = 'none';
        }
    }
});

searchInput.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        this.value = '';
        tableBody.rows.forEach(function(row) {
            row.style.display = '';
        });
    }
});


function llenarCampos(cedula) {
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>controlador/llenar_campos',
        data: {cedula: cedula},
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#nombre').val(data.nombre);
                $('#idEmpleado').val(data.idEmpleado);
                $('#nomUsuario').val(data.cedula);
            } else {
                $('#nombre').val('');
                $('#idEmpleado').val('');
                $('#nomUsuario').val('');
            }
        }
    });
}