# Desafio GESUAS

Bem-vindo à aplicação Symfony Cidadão! Esta aplicação é um exemplo de um sistema de gerenciamento de cidadãos desenvolvido com Symfony.

## Como Rodar o Projeto

Siga as instruções abaixo para clonar, configurar e executar a aplicação em seu ambiente local.

### Pré-requisitos

- Docker instalado em seu sistema ([Instalação do Docker](https://docs.docker.com/get-docker/)) ;
- Git instalado em seu sistema ([Instalação do Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)) ;
- Composer instalado em seu sistema ([Instalação do Composer](https://getcomposer.org/download/)) ;
- **PHP**: Versão 8.2 ou superior;
- **Extensões do PHP**: 
  - PDO SQLite;
  - Outras extensões necessárias (se aplicável);

### Clonar o Repositório

Clone este repositório para sua máquina local usando o seguinte comando:

```bash
git clone https://github.com/oliveiraaldo/gesuas.git
```

### Instalar Dependências

Navegue até o diretório recém-clonado e instale as dependências do Composer executando o seguinte comando:

```bash
cd gesuas
composer install
```

### Configurar e Executar Docker

Este projeto utiliza Docker para facilitar a configuração do ambiente de desenvolvimento. Certifique-se de que o Docker esteja em execução em seu sistema e execute o seguinte comando para iniciar os contêineres Docker:

```bash
docker-compose -f compose.yaml up -d
```

### Executar as Migrations

```bash
php bin/console doctrine:database:create
```

```bash
php bin/console make:migration
```

```bash
php bin/console doctrine:migrations:migrate
```

Este comando iniciará os contêineres Docker necessários para a aplicação, como o servidor web e o banco de dados.

### Acessar a Aplicação

Após a execução bem-sucedida dos contêineres Docker, você pode acessar a aplicação em seu navegador web. Basta abrir o seguinte URL:

```
http://localhost:8000/citizen/
```

Isso abrirá a aplicação Symfony Citizen em seu navegador, onde você pode começar a explorar suas funcionalidades.

### Para rodar testes unitários
Após testar a aplicação, você pode rodar os testes unitários desta maneira:

```bash
composer require --dev phpunit/phpunit
```

```bash
chmod +x vendor/bin/phpunit
```

```bash
vendor/bin/phpunit
```

### Parar os Contêineres Docker

Para parar os contêineres Docker quando você terminar de usar a aplicação, execute o seguinte comando:

```bash
docker-compose -f compose.yaml down
```

Isso encerrará os contêineres Docker e liberará os recursos do sistema.
