# zbigz-clone

**zbigz-clone** é uma implementação simplificada do serviço **ZbigZ**, utilizando o **ruTorrent** como backend para download de torrents. Ele oferece uma interface web onde os usuários podem inserir **magnet links** ou **arquivos .torrent** para baixar arquivos diretamente através do servidor, sem precisar de um cliente torrent local.

## Funcionalidades
- **Interface web simples** para envio de magnet links e arquivos .torrent.
- **Integração com ruTorrent**: todos os downloads são gerenciados através do backend ruTorrent.
- **Acesso remoto via navegador** para monitorar o status e gerenciar os downloads.

## Tecnologias Usadas
- **PHP** para a interface de upload.
- **ruTorrent** como cliente de torrent.
- **Nginx** para servir a aplicação web.

## Instruções de Instalação

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/seu-usuario/zbigz-clone.git
    cd zbigz-clone
    ```

2. **Instale as dependências e configure o ambiente:**
    ```bash
    chmod +x install.sh
    sudo ./install.sh
    ```

3. **Acesse via navegador:**
    ```
    http://<SEU-IP>/zbigz-clone/
    ```

---

Este formato pode ser copiado diretamente para o arquivo **README.md** do seu repositório no GitHub. Se precisar de mais ajustes ou alterações, estou aqui para ajudar!
