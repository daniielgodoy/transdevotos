<nav class="navbar">
    <div class="navbar-container">
        <div class="menu-icon" id="menu-icon">
            &#9776; <!-- Ícone de menu -->
        </div>
    </div>
</nav>

<!-- Menu lateral -->
<div class="sidebar" id="sidebar">
    <ul class="menu">
        <li><a href="cadastro.php">Cadastro</a></li>
        <li><a href="javascript:void(0);" onclick="abrirModalDisponiveis()">Ver Disponíveis</a></li>
        <li><a href="includes/logout.php">Logout</a></li>
    </ul>
</div>

<!-- Modal para exibir usuários disponíveis -->
<!-- Overlay para escurecer o fundo -->
<div id="modalOverlay" class="modal-overlay"></div>

<!-- Modal para exibir usuários disponíveis -->
<div id="modalDisponiveis" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal()">&times;</span>
        <h2>Usuários Disponíveis</h2>
        <div id="usuariosDisponiveis"></div>
    </div>
</div>

<script>
function abrirModalDisponiveis() {
    // Abrir o modal
    const modal = document.getElementById("modalDisponiveis");
    const overlay = document.getElementById("modalOverlay");
    modal.style.display = "block";
    overlay.style.display = "block"; // Exibe a sobreposição

    // Carregar os usuários disponíveis do banco de dados via AJAX
    carregarUsuariosDisponiveis();
}

function fecharModal() {
    const modal = document.getElementById("modalDisponiveis");
    const overlay = document.getElementById("modalOverlay");
    modal.style.display = "none";
    overlay.style.display = "none"; // Esconde a sobreposição
}


    function carregarUsuariosDisponiveis() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/usuariosDisponiveis.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Enviar a requisição para obter os usuários disponíveis
    xhr.send();

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("usuariosDisponiveis").innerHTML = xhr.responseText;
        } else {
            console.error("Erro ao carregar usuários disponíveis.");
        }
    };
}

</script>
