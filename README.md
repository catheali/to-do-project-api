# API Laravel - Projeto To-Do ✨

Bem-vindo à documentação da API Laravel do projeto To-Do List! Aqui você encontrará informações detalhadas sobre os endpoints disponíveis, suas funcionalidades e os parâmetros necessários para fazer solicitações.

- ## Visão Geral ✨

	O projeto Vue To-Do List é uma aplicação web simples para gerenciamento de tarefas. Com essa aplicação, os usuários podem criar, visualizar, atualizar e excluir suas tarefas diárias de maneira fácil e intuitiva. 

	- #### Certifique-se que seu computador tem os softwares:
		- PHP - 8.1 ^
        - Composer
        - MySQL  ou MariaDB
		- Editor de texto ( por exemplo VS code)
		- PostMan ou Insomnia
	
- ## Tecnologias Utilizadas ✨
	- Laravel: é um framework PHP gratuito e de código aberto, utilizado no desenvolvimento de sistemas web.

- ## Instalação e Execução ✨

    1. Clone o repositório para o seu ambiente local.
    2. Na pasta raiz do projeto execute o comando `composer install ` para instalar as dependências.
    3. Configure as credencias do banco de dados da API no arquivo `.env.example`. Retirando '.example'.
    4. Execute o comando `php artisan migrate` para criação do banco de dados da aplicação.
    5. Execute o comando `php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"` para configuração do token JWT.
    6.Após execute `php artisan jwt:secret` para configuração da chave token JWT.
    7. Execute o comando `npm run serve` para iniciar o servidor de desenvolvimento.
    8. Acesse a aplicação no navegador através da URL `http://localhost:8000`.

- ## Autenticação ✨
 
    Algumas rotas da API, exceto a rota de autenticação, listagem de usuario e listagem de projetos, exigem autenticação utilizando um token JWT válido. Certifique-se de incluir o token de autenticação no cabeçalho `Authorization` em nessas solicitações.

    - ### Rota de Autenticação 💫

        **Endpoint:** `/api/login`

        **Método:** POST

        **Parâmetros:**

        | Parâmetro  | Tipo   | Descrição        |
        |------------|--------|------------------|
        | email      | string | O e-mail do usuário. |
        | password   | string | A senha do usuário. |

        **Resposta de Sucesso:**

        ```json
        {
            "access_token": "seu_token_jwt",
            "token_type": "bearer",
            "expires_in": 3600
        }
        ```

        **Resposta de Erro:**

        ```json
        {
            "error": "Não foi possivel fazer o login, cheque seu email e senha."
        }
        ```

- ## Endpoints Disponíveis ✨

    Aqui estão os endpoints disponíveis para gerenciamento de projetos e usuários.

    - ### Projetos (Projects) 💫

        - #### Listar todas os Projetos

            **Não necessita Token**

            **Endpoint:** `/api/projects`

            **Método:** GET

            **Resposta de Sucesso:**

            ```json
            {
                [
                    {
                        "id": 1,
                        "user_id": 3,
                        "title": "Olá Mundo",
                        "content": "Olá mundo olá mundo 
                        olá mundo olá mundo olá mundo
                        olá mundo",
                        "status": "complete",
                        "due_time": "2023-05-23",
                        "name": "Maria Doe"
                    },
                    {
                        "id": 2,
                        "user_id": 1,
                        "title": "Hello Word",
                        "content": "Hello world hello world
                         hello world hello world hello world",
                        "status": "ongoing",
                        "due_time": "2023-05-24",
                        "name": "John Doe"
                    }
                ]
            }
            ```

        - #### Criar um novo Projeto

            **Endpoint:** `/api/projects`

            **Método:** POST

            **Parâmetros:**

            | Parâmetro     | Tipo    | Descrição                |
            |---------------|---------|--------------------------|
            | id            | integer | O ID do projeto a ser atualizado. |
            | title         | string  | O novo título do projeto. |
            | description| string  | A nova descrição do projeto. |
            | status     | string | Indica se o projeto está Complete, On Going ou Overdue. |

            **Resposta de Sucesso:**

            ```json
                {
                    "message": "Project successfully created"
                
                 }
            ```

        - #### Atualizar uma Projeto existente

            **Endpoint:** `/api/project/{id}`

            **Método:** PUT

            **Parâmetros:**

            | Parâmetro     | Tipo    | Descrição                |
            |---------------|---------|--------------------------|
            | id            | integer | O ID do projeto a ser atualizado. |
            | title         | string  | O novo título do projeto. |
            | description| string  | A nova descrição do projeto. |
            | status     | string | Indica se o projeto está Complete, On Going ou Overdue. |

            **Resposta de Sucesso:**

            ```json
                {
                    "message": "The project id: 1 was successfully updated."
                }
            ```

        - #### Excluir um Projeto

            **Endpoint:** `/api/project/{id}`

            **Método:** DELETE

            **Parâmetros:**

            | Parâmetro     | Tipo    | Descrição                |
            |---------------|---------|--------------------------|
            | id            | integer | O ID da tarefa a ser excluída. |

            **Resposta de Sucesso:**

            ```json
            {
                "message": "Project  id: 1 successfully deleted."
            }
            ```

    - ### Usuários (Users) 💫

        - #### Listagem de Usuários

            **Não necessita Token**

            **Endpoint:** `/api/users`

            **Método:** POST

            **Parâmetros:**

            | Parâmetro  | Tipo   | Descrição                |
            |------------|--------|--------------------------|
            | name       | string | O nome do usuário.       |
            | email      | string | O e-mail do usuário.     |
            | password   | string | A senha do usuário.      |

            **Resposta de Sucesso:**

            ```json
            {
                {
                    "id": 1,
                    "name": "João Doe",
                    "role": "Soldier",
                    "image": "users/QRKvlkas6W4wxFfRUM7A5gXW7oUHITwpGcSQeQOF.jpg",
                    "email": "johndoe@example.com"
                },
                {
                    "id": 2,
                    "name": "Maria Doe",
                    "role": "Poet",
                    "image": "users/QRKvlkas6W4wxFfRUM7A5gXW7oUHITwpGcSQeQOF.jpg",
                    "email": "maria@example.com"
                },
                {
                    "id": 2,
                    "name": "José Doe",
                    "role": "King",
                    "image": "users/QRKvlkas6W4wxFfRUM7A5gXW7oUHITwpGcSQeQOF.jpg",
                    "email": "zedoe@example.com"
                }
            }
            ```

        - #### Criar um novo Usuário

            **Não necessita Token**

            **Endpoint:** `/api/users`

            **Método:** POST

            **Parâmetros:**

            | Parâmetro  | Tipo    | Descrição            |
            |------------|---------|----------------------|
            | id         | integer | O ID do usuário      |
            | name       | string  | O nome do usuário.   |
            | role       | string  | O cargo do usuário   |
            | image      |  file   | O avatar do usuário. |
            | email      | string  | O e-mail do usuário. |
            | password   | string  | A senha do usuário.  |

            **Resposta de Sucesso:**

            ```json
                {
                    "message": "User criado com sucesso"
                }
            
            ```

        - #### Atualizar um Usuário existente

            **Endpoint:** `/api/users/{id}`

            **Método:** PUT

            **Parâmetros:**

            | Parâmetro  | Tipo    | Descrição                |
            |------------|---------|--------------------------|
            | id         | integer | O ID do usuário a ser atualizado. |
            | name       | string  | O novo nome do usuário.   |
            | role       | string  | O novo cargo do usuário   |
            | image      |  file   | O novo avatar do usuário. |
            | email      | string  | O novo e-mail do usuário. |
            | password   | string  | A senha do usuário para autorização  |

            **Resposta de Sucesso:**

            ```json
            {
                "message":"User atualizado com sucesso"
            }
            ```
        - #### Atualizar a senha de um Usuário

            **Endpoint:** `/api/user/resetpassword/{id}`

            **Método:** PUT

            **Parâmetros:**

            | Parâmetro  | Tipo    | Descrição                |
            |------------|---------|--------------------------|
            | id         | integer | O ID do usuário a ser excluído. |
            | password       | varchar | O ID do usuário a ser excluído. |

            **Resposta de Sucesso:**

            ```json
            {
                "message": "Senha alterada com sucesso."
            }
            ```


        - #### Excluir um Usuário

            **Endpoint:** `/api/user/delete/{id}`

            **Método:** DELETE

            **Parâmetros:**

            | Parâmetro  | Tipo    | Descrição                |
            |------------|---------|--------------------------|
            | id         | integer | O ID do usuário a ser excluído. |

            **Resposta de Sucesso:**

            ```json
            {
                "message": "Usuário excluído com sucesso."
            }
            ```

## Considerações Finais ✨

Esta foi uma visão geral dos endpoints disponíveis na API Laravel do projeto To-Do List. Sinta-se à vontade para explorar e testar cada um deles para aproveitar ao máximo a aplicação. 
Se tiver alguma dúvida, sugestão ou precisar de mais informações, não hesite em entrar em contato. Agradeço seu interesse no projeto To-Do List e espero que essa documentação seja útil para o seu desenvolvimento. Pretendo atualizar e melhorar constantemente. 
 Se você gostou do projeto, não esqueça de deixar uma estrela ⭐.
