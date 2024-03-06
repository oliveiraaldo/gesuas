Symfony Citizen Application
Bem-vindo à aplicação Symfony Citizen! Esta aplicação é um exemplo de um sistema de gerenciamento de cidadãos desenvolvido com Symfony.

Como Rodar o Projeto
Siga as instruções abaixo para clonar, configurar e executar a aplicação em seu ambiente local.

Pré-requisitos
Docker instalado em seu sistema (Instalação do Docker)
Git instalado em seu sistema (Instalação do Git)
Composer instalado em seu sistema (Instalação do Composer)
Clonar o Repositório
Clone este repositório para sua máquina local usando o seguinte comando:

bash
Copy code
git clone https://github.com/username/symfony-citizen-app.git
Instalar Dependências
Navegue até o diretório recém-clonado e instale as dependências do Composer executando o seguinte comando:

bash
Copy code
cd symfony-citizen-app
composer install
Configurar e Executar Docker
Este projeto utiliza Docker para facilitar a configuração do ambiente de desenvolvimento. Certifique-se de que o Docker esteja em execução em seu sistema e execute o seguinte comando para iniciar os contêineres Docker:

bash
Copy code
docker-compose -f compose.yaml up -d
Este comando iniciará os contêineres Docker necessários para a aplicação, como o servidor web e o banco de dados.

Acessar a Aplicação
Após a execução bem-sucedida dos contêineres Docker, você pode acessar a aplicação em seu navegador web. Basta abrir o seguinte URL:

bash
Copy code
http://localhost:8000/citizen/
Isso abrirá a aplicação Symfony Citizen em seu navegador, onde você pode começar a explorar suas funcionalidades.

Parar os Contêineres Docker
Para parar os contêineres Docker quando você terminar de usar a aplicação, execute o seguinte comando:

bash
Copy code
docker-compose -f compose.yaml down
Isso encerrará os contêineres Docker e liberará os recursos do sistema.
