const links = document.querySelectorAll(".excluir");

console.log(links);

// for of -> percorre um array
for (const link of links) {
    // adicionando um evento de click para cada link
    link.addEventListener("click", event => {
        // previne o comportamento padrão do link (não redireciona)
        event.preventDefault();

        // exibe uma caixa de confirmação, retornando true (Sim/OK) ou false (Cancelar)
        const resposta = confirm("Deseja realmente excluir este registro?");

        // se a resposta for verdadeira, redireciona para o link
        if (resposta) location.href = this.href;
    });
}