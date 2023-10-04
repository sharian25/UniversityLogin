let dataTable;
let dataTableInicializada = false; //para reflescar la table y poder destruirla


//logica para la edición
function editar(id) {
 //alert("Editar este elemento:" + id);
  window.location.href = `/src/views/views_admin/Clases/ClaseEditar.php?id=${id}`;

  // Abre el modal de editar
  //$('#editarModal').modal('show');
} 
  function eliminar(id) {
    // Lógica para eliminar según el ID
    //alert("Eliminar elemento con ID: "+ id);
 window.location.href = `/src/models/Create_Edit/EliminarClase.php?id=${id}`; 
  } 


// genera los cambios opcionales por parte del usuario
const dataTableOptions = {
  //scrollx:"valor-px", si hay muchas columnas muestra una barra de desplazamiento en x
  //lenghtMenu:[5,10,20...]; coloca cuantos registros quieres ver por paginas 

  columnDefs: [
    //define los valores de la columna
    { className: "centered", targets: [2] }, // los targes comienzan con 0 donde cada numero es una columna
    { orderable: false, targets: [3, 4] }, //quitamos la frechitas de ordenamiento en las columnas que queremos
    //{width:valor targets:[columnas]} define el ancho manual de las columnas
    //searchable:false, targets:[columna a buscar] define el parametro de busqueda a una sola columna
  ],
  pageLength: 6, //muestra un max de 5 registro por pagina
  destroy: true, // perminte que la tabla sea destruible
  language: {
    //cambia el lenguaje de la tabla
    lengthMenu: "mostrar _MENU_ registros por página",
    zeroRecords: "Ningún usuario encontrado",
    info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ resgistros",
    infoEmpy: "Ningún usuario encontrado",
    infoFiltered: "(filtrado desde _MAX_ registros totales)",
    search: "Buscar",
    LoadingRecords: "Cargando...",
    paginate: {
      first: "Primero",
      last: "ultimo",
      next: "Siguiente",
      previus: "Anterior",
    },
  },
};
const initDataTable = async () => {
  if (dataTableInicializada) {
    dataTable.destroy();
  }
  await list();

  dataTable = $("#datatable").dataTable(dataTableOptions);

  dataTableInicializada = true;
};

const list = async () => {
  try {
    const response = await fetch("/src/models/GetClases.php");
    const data = await response.json();
    console.log(data);

    let content = ``;
    //itera el arreglo en forma .json
    data.forEach((data, index) => {
      //se la iteración se crean la filas una por cada arreglo
      content += `
            <tr>
                <td>${data.CLASE} </td>
                <td>${data.MAESTRO} </td>
                <td>${data.INSCRITOS} </td>
                <td><i class="fa-solid fa-check" style="color:green;"></i> </td>
                <td>
                <button class="btn btn-sm btn-primary mr-1" id="openModalBtn" onclick="editar(${data.ID_CLASES})"><i class="fa-solid fa-pencil"></i></button>
                <button class="btn btn-sm btn-danger ml-1" onclick="eliminar(${data.ID_CLASES})"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>`;
    });
    // Agrega el contenido al elemento con el ID "tableBody"
    document.getElementById("tableBody").innerHTML = content;
    
        //pinta en el la tabla del html los datos iterados desde el servidor
        tableBody.innerHTML = content;
      } catch (ex) {
        //muestra una exepción en caso de haber un fallo desde el try
        alert(ex);
      }
    };
    // inicializa la todo el proceso,
    window.addEventListener("load", async () => {
      await initDataTable();
    });
    