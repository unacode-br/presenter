# Stackhub - Presenter

**Stackhub** é uma ferramenta de data mining criada para trazer ao usuário informações acerca das tecnologias mais utilizadas no Github e Stackoverflow.

Ela mostrará ao usuário o uso e a curva de aprendizado dessas tecnologias, para que os usuários possam através dessas informações escolherem qual será a próxima tecnologia que vale a pena investir!

### Características principais

- Gráfico de curva de aprendizagem;
- Linguagens de programação mais utilizadas no Github;
- Tecnologias mais questionadas no StackOverflow;
- Índice de contribuição por linguagens no Github.

### Público alvo

- Entusiastas de desenvolvimento de software;
- Profissionais da área de tecnologia;
- Responsáveis por criação de cursos de tecnologia.

### Compatibilidade

Requisitos | Ferramentas
---------- | -----------
Navegadores | Mozilla Firefox, Google Chrome
Sistema Operacional | Linux, Windows, Mac OS

### Tecnologias

Tecnologias | Ferramentas
----------- | -----------
Front-End | HTML, SASS, Javascript
Back-End  | Python
Banco de dados  | MongoDB
Frameworks  | Laravel, Bootstrap
IDEs e editores de textos  | PHPStorm, Atom e Sublime
Design pattern  | MVC, DDD

### Como rodar via Docker

Certifique-se que você tenha o [Docker](https://www.docker.com/) e o [Docker Compose](https://docs.docker.com/compose/) instalados em seu computador.

Vá até a pasta `docker` e execute os comandos:

- `docker-compose up -d nginx php-fpm mongo`
- `docker-compose exec --user=laradock workspace bash`

Dentro do container **workspace**, execute `composer install` para instalar todas as depêndencias do Composer.

Altere o arquivo `.env` e adeque-o com as devidas configurações dos apps das redes socias (vide Slack).

Acesse em seu navegador o IP do Docker.

**Observação:** Recomenda-se criar uma entrada no arquivo `/etc/hosts` apontando o IP do Docker para `docker.app` para que as aplicações das redes sociais a reconheçam.

### Participantes

- Cinthia Silman
- Gustavo Marttos
- Jordana Nogueira
- Leandro Cazarini
- Taynara Sene
