#!/bin/bash
echo "Atualizando sistema..."
apt update && apt upgrade -y
echo "Instalando dependências..."
apt install -y nginx php php-cli php-fpm php-curl php-xmlrpc rtorrent git unzip curl ffmpeg mediainfo xmlrpc php-mbstring screen
echo "Criando diretórios necessários..."
mkdir -p /var/www/rutorrent
mkdir -p /home/$(logname)/.session
echo "Baixando ruTorrent..."
git clone https://github.com/Novik/ruTorrent.git /var/www/rutorrent
echo "Configurando NGINX para ruTorrent..."
cat > /etc/nginx/sites-available/rutorrent << EOF
server {
    listen 80;
    server_name localhost;
    root /var/www/rutorrent;
    index index.php index.html;
    location / {
        try_files \$uri \$uri/ =404;
    }
    location ~ \.php\$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php-fpm.sock;
    }
    location ~ /\.ht {
        deny all;
    }
}
EOF
ln -s /etc/nginx/sites-available/rutorrent /etc/nginx/sites-enabled/
sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php/*/fpm/php.ini
systemctl restart php*-fpm
systemctl restart nginx
echo "Configurando rTorrent..."
cat > /home/$(logname)/.rtorrent.rc << EOF
directory = /home/$(logname)/downloads
session = /home/$(logname)/.session
port_range = 50000-50010
port_random = no
check_hash = yes
use_udp_trackers = yes
encryption = allow_incoming,try_outgoing,enable_retry
dht = auto
dht_port = 6881
peer_exchange = yes
scgi_port = 127.0.0.1:5000
EOF
mkdir -p /home/$(logname)/downloads
chown -R $(logname):$(logname) /home/$(logname)/downloads
echo "Tudo pronto!"
echo "Inicie o rTorrent com: screen -S rtorrent rtorrent"
echo "Acesse via navegador: http://IP_DO_SERVIDOR/"
