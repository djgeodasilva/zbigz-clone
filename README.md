# ZbigZ Clone (zbigz-clone)

Clone simplificado do ZbigZ usando ruTorrent como backend.

## Funcionalidades
- Envio de magnet links ou arquivos `.torrent`
- Interface web simples
- Integração com ruTorrent

## Instalação
```bash
chmod +x install.sh
sudo ./install.sh
```

## Acesso
Após instalar, acesse:
```
http://<SEU-IP>/zbigz-clone/
```
Descrição do Repositório:
zbigz-clone é uma implementação simplificada do serviço ZbigZ, utilizando o ruTorrent como backend para download de torrents. Ele oferece uma interface web onde os usuários podem inserir magnet links ou arquivos .torrent para baixar arquivos diretamente através do servidor, sem precisar de um cliente torrent local.

Funcionalidades:
Interface web simples para envio de magnet links e arquivos .torrent.

Integração com ruTorrent: todos os downloads são gerenciados através do backend ruTorrent.

Acesso remoto via navegador para monitorar o status e gerenciar os downloads.

Tecnologias Usadas:
PHP para a interface de upload.

ruTorrent como cliente de torrent.

Nginx para servir a aplicação web.

Instruções de Instalação:
Clone o repositório:

bash
Copiar
Editar
git clone https://github.com/seu-usuario/zbigz-clone.git
cd zbigz-clone
Instale as dependências e configure o ambiente:

bash
Copiar
Editar
chmod +x install.sh
sudo ./install.sh
Acesse via navegador:

perl
Copiar
Editar
http://<SEU-IP>/zbigz-clone/
