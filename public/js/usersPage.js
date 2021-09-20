//  Essa função serve para pesquisar nomes na table de chamados.

function searchNames() {
    // Criando variaveis para linkar elas com os valores do HTML
    var input, filter, table, tr, td, td2, i, txtValue, txtValue2;

    // Atribuindo valores as variaveis de acordo com o HTML
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop FOR para fazer a pesquisa em todos os campos.
    for (i = 0; i < tr.length; i++) {

        // Variáveis que recebem o valor da td atual que foi selecionado.
        td = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];

        if (td) {
            txtValue = td.textContent || td.innerText;
            txtValue2 = td2.textContent || td2.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
