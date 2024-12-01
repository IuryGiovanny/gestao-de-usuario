# Sistema de Gestão de Usuários

Este é um sistema de gestão de usuários desenvolvido em **PHP** puro utilizando o conceito de **Programação Orientada a Objetos (POO)** e **Bootstrap 5.5** para a interface. O sistema permite a **visualização**, **cadastro**, **edição** e **exclusão** de usuários, além de implementar autenticação básica com um usuário inicial.

## Funcionalidades

- **Cadastro de Usuários**: Permite adicionar novos usuários ao sistema.
- **Listagem de Usuários**: Exibe todos os usuários cadastrados no sistema.
- **Edição de Usuários**: Permite editar as informações dos usuários existentes.
- **Exclusão de Usuários**: Permite excluir usuários do sistema.
- **Autenticação de Usuário**: Implementação de login simples com um usuário inicial.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada para o desenvolvimento do backend.
- **POO (Programação Orientada a Objetos)**: Arquitetura do código utilizando classes e objetos.
- **Bootstrap 5.5**: Framework CSS para estilização da interface.
- **MySQL**: Banco de dados para armazenar as informações dos usuários.

## Usuário Inicial

O sistema já possui um **usuário administrador** inicial para fazer o login:

- **Email**: `admin@gmail.com`
- **Senha**: `12345`

Esse usuário pode acessar todas as funcionalidades do sistema, incluindo a possibilidade de **adicionar**, **editar** e **excluir** outros usuários.

## Estrutura do Projeto

O projeto segue a seguinte estrutura de diretórios:


### Detalhes das Pastas:

- **/controllers**: Contém os arquivos responsáveis pela lógica de controle (ex.: cadastro, edição, etc).
- **/models**: Contém as classes que fazem a comunicação com o banco de dados e a manipulação dos dados.
- **/views**: Contém os arquivos HTML que representam as páginas do sistema.
- **/assets**: Contém os arquivos estáticos, como o Bootstrap, imagens e outros recursos.
- **/config**: Arquivos de configuração, como a configuração do banco de dados.

## Instruções de Uso

1. **Clone o repositório**:
    ```bash
    git clone https://github.com/IuryGiovanny/gestao-de-usuario.git
    ```

2. **Configuração do Banco de Dados**:
    - Crie um banco de dados no MySQL chamado `gestao`.
    - Importe o arquivo de esquema (SQL) para criar a tabela `usuario`.

    Exemplo de comando SQL para criar a tabela:
    ```sql
    CREATE TABLE usuario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL
    );
    ```
    Exemplo de comando SQL para inserir usuario admin:
    ```sql
    INSERT INTO usuario (nome, email, senha) 
    VALUES ('Administrador', 'admin@gmail.com', '12345');
    ```

3. **Configuração do Arquivo de Conexão**:
    - No arquivo `/config/database.php`, insira as credenciais de acesso ao banco de dados:
    ```php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'minha_loja');
    ```

4. **Acessando o Sistema**:
    - Acesse a página principal através de `index.php` no seu navegador.
    - O sistema irá pedir o **login**. Use o **usuário inicial** para acessar.

## Screenshots

Abaixo está um exemplo de como a interface do sistema pode se parecer:

![Tela de Login](assets/image/login.png)
![Tela de Cadastro](assets/image/cadastro.png)
![Tela de Listagem de Usuários](assets/image/listagem.png)

## Contribuição

1. Faça um fork deste repositório.
2. Crie uma nova branch com sua feature ou correção (`git checkout -b feature/nome-da-feature`).
3. Faça commit das suas mudanças (`git commit -am 'Adiciona nova feature'`).
4. Envie para o repositório remoto (`git push origin feature/nome-da-feature`).
5. Abra um Pull Request.

## Licença

Este projeto está licenciado sob a **MIT License** - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
