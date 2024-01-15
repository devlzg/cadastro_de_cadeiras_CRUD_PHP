const header = document.querySelector("header");

window.addEventListener("scroll", function() {
    header.classList.toggle("sticky", this.window.scrollY > 0);
})

let menu = document.querySelector("#menu-icon");
let navmenu = document.querySelector(".navmenu");

menu.onclick = () => {
    menu.classList.toggle("bx-x");
    navmenu.classList.toggle("open");
}


// Simulando dados de produtos
// Simulando dados de produtos
let produtos = [
    { id: 1, nome: 'Cadeira Gamer Elite', preco: 799.90, modelo: 'EG-1001', fabricante: 'HyperSeat', descricao: 'Conforto e estilo em um só produto.' },
    { id: 2, nome: 'Cadeira Ultimate Pro', preco: 1599.90, modelo: 'UP-2022', fabricante: 'GamingMaster', descricao: 'Design ergonômico e materiais de alta qualidade.' },
    { id: 3, nome: 'Cadeira StealthX', preco: 1299.90, modelo: 'SX-500', fabricante: 'StealthGaming', descricao: 'Perfeita para longas sessões de jogos intensos.' },
    { id: 4, nome: 'Cadeira Vortex X', preco: 849.90, modelo: 'VX-800', fabricante: 'TechPro', descricao: 'Performance e elegância em um só lugar.' },
    { id: 5, nome: 'Cadeira Prodigy Plus', preco: 1699.90, modelo: 'PP-8000', fabricante: 'UltimateGamer', descricao: 'Projetada para gamers exigentes.' },
    { id: 6, nome: 'Cadeira Galaxy Explorer', preco: 1349.90, modelo: 'GE-200', fabricante: 'CosmicTech', descricao: 'Explore o universo do gaming com estilo.' },
    { id: 7, nome: 'Cadeira Thunderbolt', preco: 659.90, modelo: 'TB-1200', fabricante: 'StrikeForce', descricao: 'Potência e conforto para sua experiência gamer.' },
    { id: 8, nome: 'Cadeira Supreme Commander', preco: 799.90, modelo: 'SC-5000', fabricante: 'CommandTech', descricao: 'Comande sua vitória com esta cadeira.' }
    // Adicione mais produtos conforme necessário
];

// Função para renderizar a tabela de produtos
function renderizarTabela() {
    const corpoTabela = document.getElementById('corpoTabela');
    corpoTabela.innerHTML = ''; // Limpa o corpo da tabela antes de renderizar

    // Adiciona os produtos à tabela
    produtos.forEach((produto, indice) => {
        const linha = corpoTabela.insertRow();
        linha.innerHTML = `
            <td>${produto.id}</td>
            <td>${produto.fabricante}</td>
            <td>${produto.modelo}</td>
            <td><a href="alterar.html"><i class='bx bxs-edit-alt'></i></a></td>
            <td><a href="#remover-produto" onclick="removerProduto(${indice})"><i class='bx bxs-trash-alt'></i></a></td>
        `;
    });
}

// Função para adicionar um novo produto
function adicionarProduto() {
    const nome = document.getElementById('nomeProduto').value;
    const preco = parseFloat(document.getElementById('precoProduto').value);
    const modelo = document.getElementById('modeloProduto').value;
    const fabricante = document.getElementById('fabricanteProduto').value;
    const descricao = document.getElementById('descricaoProduto').value;

    // Verifica se todos os campos foram preenchidos
    if (nome && !isNaN(preco) && modelo && fabricante && descricao) {
        // Adiciona o novo produto à lista
        const novoProduto = { nome, preco, modelo, fabricante, descricao };

        // Armazena os dados do novo produto no localStorage
        localStorage.setItem('novoProduto', JSON.stringify(novoProduto));

        alert('Produto adicionado com sucesso!');
        window.location.href = 'produtos.html';
    } else {
        alert('Por favor, preencha todos os campos corretamente.');
    }
}

// Recupera os dados do novo produto do localStorage
const novoProdutoJSON = localStorage.getItem('novoProduto');

if (novoProdutoJSON) {
    // Converte a string JSON de volta para um objeto
    const novoProduto = JSON.parse(novoProdutoJSON);

    // Adiciona o novo produto à lista de produtos
    produtos.push(novoProduto);

    // Limpa os dados do novo produto no localStorage
    localStorage.removeItem('novoProduto');

    // Renderiza a tabela com o produto recém-adicionado
    renderizarTabela();
}

// Função para remover um produto da lista
function removerProduto(indice) {
    produtos.splice(indice, 1);
    renderizarTabela();
}

// Função para ordenar os produtos com base nas opções selecionadas
function ordenarProdutos(ordenacao, ordem) {
    return produtos.sort((a, b) => {
        if (ordenacao === 'preco') {
            return ordem === 'crescente' ? a[ordenacao] - b[ordenacao] : b[ordenacao] - a[ordenacao];
        } else {
            return ordem === 'crescente' ? a[ordenacao].localeCompare(b[ordenacao]) : b[ordenacao].localeCompare(a[ordenacao]);
        }
    });
}

// Função para aplicar a ordenação e renderizar a tabela
function aplicarOrdenacao() {
    const ordenacao = document.getElementById('ordenacao').value;
    const ordem = document.getElementById('ordem').value;

    // Ordena os produtos com base nas opções selecionadas
    produtos = ordenarProdutos(ordenacao, ordem);

    // Renderiza a tabela com os produtos ordenados
    renderizarTabela();
}

// Inicializa a tabela quando a página carrega
document.addEventListener('DOMContentLoaded', function () {
    renderizarTabela();
});