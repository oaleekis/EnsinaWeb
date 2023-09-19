function loadContentOnClick(contentUrl) {
    const mainElement = document.getElementById('mainContent');
        // Requisição AJAX para carregar o conteúdo especificado
        const xhr = new XMLHttpRequest();
        xhr.open("GET", contentUrl, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Inserir o conteúdo no elemento especificado
                mainElement.innerHTML = xhr.responseText;
            }
        };
        xhr.send();

}

document.addEventListener("DOMContentLoaded", function () {
    // Exemplo de uso: carregar conteúdo PHP quando o botão "loginButton" for clicado
    loadContentOnClick("mainContent", "loginButton", "resources/views/login.php");
});